<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Cart, CartItem, Product, Price};
use Illuminate\View\View;

class CartController extends Controller
{
    public function add(Request $request)
    {       
        $id = $request->product_id;

        if($request->session()->get('cart_id') == null) { 
                $cart = Cart::create();
                $request->session()->put('cart_id',$cart->id);    
            }

        $cart = Cart::with(['items','totalPrice'])->find($request->session()->get('cart_id'));        
        $product = Product::with('prices')->find($id);
            // dd($cart->items);
                
        if ($cart->items->where('product_id', $id)->count()>0) {            
            return redirect(route('home').'/products');
        }
        
        $cartitem = CartItem::create([
            'amount' => 1,
            'product_id' => $id,
            'cart_id' => $cart->id
            ]);        

        $cartItemPrice = $product->prices->first()->replicate();       
        $cartitem->itemPrice()->save($cartItemPrice);         
        
        $cart->items()->save($cartitem);
        $cart_cost = $this->totalPrice($cart->id);
        $cart->totalPrice->update(['value' => $cart_cost]);             
        return back();
    }

    public function remove(Request $request){
        $id = $request->cart_item_id;
        $cart = Cart::with(['totalPrice', 'items', 'items.itemPrice'])->find($request->session()->get('cart_id'));
        $itemToRemove = $cart->items->find($id);        
        $itemToRemove->itemPrice->delete();
        $itemToRemove->delete();

        $cart->totalPrice->update([
            'value' => $this->totalPrice($cart->id)
        ]);        
        return back();        
    }

    public function totalPrice($cart_id){ 
        $priceToReturn = 0;
        $cart = Cart::with(['totalPrice', 'items', 'items.itemPrice'])->find($cart_id);
        foreach ($cart->items as $item) {
            $priceToReturn += $item->itemPrice->value;
        }
        return $priceToReturn;
        
    }

    public function view(Request $request){
        $id = $request->cart_item_id;
        $cart = Cart::with(['totalPrice', 'items', 'items.itemPrice'])->find($request->session()->get('cart_id'));
        $cartItems = CartItem::with('product')->where('deleted_at', null)->get();          
        return View('public.cart_view', compact('cart', 'cartItems'));
    }

    public function checkout(){
        return View('carts.checkout');
    }
}


