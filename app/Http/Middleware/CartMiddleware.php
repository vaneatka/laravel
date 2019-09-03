<?php

namespace App\Http\Middleware;

use Closure;
use App\{Cart, CartItem, Product, Price,Currency};

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
       

        // if($request->session()->get('cart_id') == null) { 
        //         $cart = Cart::create();
        //         $request->session()->put('cart_id',$cart->id);    
        //     } else {
               
            // }
            
        $cart = Cart::find( $request->session()->get('cart_id'));                    

        $extractedCart = Cart::with('totalPrice')->get()->first();
                        $cartItems = CartItem::all();
                        $products = [];
                        foreach ($cartItems as $item) {                                                      
                            $products[]=Product::with('prices.value')->find($item->product_id);
                        }
                        
                        $cart = ['count'=> count(CartItem::all()),
                                 'price'=> $extractedCart->totalPrice,
                                 'items' => $cartItems,
                                 'products'=> $products
                            ];
        \View::share('cart' , $cart);
        return $next($request);
    }
}
