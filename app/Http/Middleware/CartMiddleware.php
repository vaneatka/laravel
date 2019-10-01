<?php

namespace App\Http\Middleware;

use Closure;
use App\{Cart, User};
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
        if(\Auth::id()){
            $user = User::with(['cart', 'cart.totalPrice', 'cart.items', 'cart.items.product', 'cart.items.itemPrice','cart.totalPrice.currency'])->find(\Auth::id());            
            if ($user) {
                $usersCart = $user->cart->where('status','open')->first();                 
                if (isset($usersCart)) {
                    $request->session()->put('cart_id', $usersCart->id);
                    $cart = $user->cart->first();                     
                    \View::share(compact('cart'));
                }                
            }
        } else {
            $cart = Cart::find($request->session()->get('cart_id'));
            \View::share(compact('cart'));         
        }   

        if (!\Schema::hasTable('carts') || Cart::all()->isEmpty() ) {
            if(!\Auth::id()){
                Session::forget('cart_id');
            }
        }   
            return $next($request);
    }
}
