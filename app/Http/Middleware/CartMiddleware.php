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
                $extractedCart = Cart::with('totalPrice')->find( $request->session()->get('cart_id') );               
                $cartItems = CartItem::with('product')->get();   
                $products = [];
                foreach ($cartItems as $item) {                                                      
                    $products[]=$item->product;
                } 
                $cart = ['count'=> count(CartItem::all()),
                'price'=> $extractedCart->totalPrice,
                'items' => $cartItems,                
            ];
            
            \View::share('cart' , $cart);
        }
            return $next($request);
    }
}
