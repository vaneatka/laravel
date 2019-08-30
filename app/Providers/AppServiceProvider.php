<?php

namespace App\Providers;

use App\Cart;
use App\CartItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {      
         
        if( \Schema::hasTable('carts') ){
            if (!empty(Cart::all())) {                             
                $cart = [
                'price' => Cart::first()->totalPrice->value,
                'count' => count(CartItem::all())
                ];                    
                View::share('cart', $cart);
            }
        }
    }
}
