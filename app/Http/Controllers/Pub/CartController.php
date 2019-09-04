<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Cart, CartItem, Product, Price};

class CartController extends Controller
{
    public function add(Request $request)
    {       
        $id = $request->product_id;

        if($request->session()->get('cart_id') == null) { 
                $cart = Cart::create();
                $request->session()->put('cart_id',$cart->id);    
            }
           

        $cart = Cart::first();        
        $product = Product::find($id);
        // dd($cart->items->contains($id));
        if ($cart->items->contains($id)) {            
            return redirect(route('home').'/products');
        }
        
        $cartitem = CartItem::create([
            'amount' => 1,
            'product_id' => $id,
            'cart_id' => $cart->id
            ]);        
           
        $cartitem->itemPrice()->save($product->prices->first());         
        $cart->items()->save($cartitem);
        $cart_cost = $cartitem->itemPrice->value + $cart->totalPrice->value;
        $cart->totalPrice->update(['value' => $cart_cost]);             
        return back();
    }

    public function remove($id){
        
        $cart = Cart::with('totalPrice')->first();
       
        $itemToRemove = $cart->items->where('product_id', $id)->where('deleted_at', null)->first();
        $itemToRemove = $itemToRemove->with('itemPrice.value')->first();
        $cart->totalPrice->update([
            'value' => $cart->totalPrice->value - $itemToRemove->itemPrice->value
        ]);
        $cart->items->find($itemToRemove)->delete();        
        return back();
        
    }
}
