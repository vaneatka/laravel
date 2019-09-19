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
            $request->session()->put('cart_id', \Auth::id());
        }
        // dd(\Auth::id());

        if (!\Schema::hasTable('carts') || Cart::all()->isEmpty() ) {
            if(!\Auth::id()){
                Session::forget('cart_id');
            }
        }
        
        if($request->session()->get('cart_id')) {
                // dd(\Auth::id());    
                if (\Auth::check()) {
                    if(!Cart::where('user_id', \Auth::id())->get()->isEmpty()){                        
                        $user = User::with('cart')->find(\Auth::id());
                        $request->session()->put('cart_id', $user->cart->id);
                    } else {
                        $user = User::find(\Auth::id());
                        $cart = Cart::create();
                        $user->cart()->save($cart);                        
                    }     
                }

                $cart = Cart::with(['totalPrice', 'items', 'items.product', 'items.itemPrice'])->find( $request->session()->get('cart_id') );  
                \View::share(compact('cart'));
        }

            return $next($request);
    }
}
