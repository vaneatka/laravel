<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Cart, CartItem, Product};
use Illuminate\View\View;

class CartController extends Controller
{
    public function add(Request $request)
    {       
        $id = $request->product_id;        
        $sessionCart = $this->getSession();  
        $cart = $this->getCart();        
        $product = Product::with('prices')->find($id);        
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
        $cart = Cart::with(['totalPrice', 'items', 'items.itemPrice'])->where('status', 'open')->find($request->session()->get('cart_id'));        
        return View('public.cart_view', compact('cart'));
    }

    public function checkout(){
        return View('carts.checkout');
    }

    public function payment(Request $request){ 
        $cart = Cart::with(['totalPrice', 'items', 'items.itemPrice'])->where('status', 'open')->find($request->session()->get('cart_id'));
        return View('carts.payment', compact('cart'));
    }

    public function charge(Request $request){
        $cart = Cart::with(['totalPrice', 'items', 'items.itemPrice'])->where('status', 'open')->find($request->session()->get('cart_id'));   
        $amount = $cart->totalPrice->value*100; // stripe gets a full price with centimes
        $currency = $cart->totalPrice->currency->code;  
        $token = $request->stripeToken;
        \Stripe\Stripe::setApiKey('sk_test_fzGjXD0GZ545Bjqancp1pmef004915MP0V');
        $charge = \Stripe\Charge::create(['amount' => $amount, 'currency' => $currency , 'source' => $token]);
        $message = $charge->status;
        $cart->update(['status' => 'sold']);
        // $cart = Cart::with(['totalPrice', 'items', 'items.itemPrice'])->where('status', 'open')->find($request->session()->get('cart_id'));   
        return View('carts.payment', compact('cart', 'message')); 
    }

    private function getCart() : Cart{
        $cartId = $this->getSession();

        if($cartId){
            $cart = Cart::with(['items', 'totalPrice'])->where('status', 'open')->find($cartId);             
            if($cart == null){
                $cart = Cart::create();
                session(['cart_id' => $cart->id]);  
            }            
        }else{
            $cart = Cart::create();
            session(['cart_id' => $cart->id]);
        }
            return $cart;
    }

    private function getSession(){
        return session('cart_id');
    }
}


