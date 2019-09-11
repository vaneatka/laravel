<?php

namespace App\Http\Middleware;

use Closure;
use App\{Cart, CartItem, Product, Price,Currency};
use Illuminate\Support\Facades\Session;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        // if()
        // dd($request->session()->get('cart_id'));
        if (!\Schema::hasTable('carts') || Cart::all()->isEmpty() ) {
            Session::forget('cart_id');
        }

        if($request->session()->get('cart_id') != null ) {
                $cart = Cart::with(['totalPrice', 'items', 'items.product', 'items.itemPrice'])->find( $request->session()->get('cart_id') );               
                $cartItems = $cart->items();        
                // $cartItems = CartItem::with(['product', 'cart'])->where('deleted_at', null)->where('cart.id', $cart->id)->get();        
                         
            
            \View::share(compact('cart', 'cartItems'));
        }
            return $next($request);
    }
}
