<?php

namespace App\Providers;

use App\{Cart, CartItem};
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
         if(\Schema::hasTable('carts')){            
             if( empty(Cart::all()) ){
                 $cart = ['price'=> 0,
                 'count'=> '0'];                 
                }
                else {
                    $cart = ['count'=> count(CartItem::all()),
                    'price'=> Cart::first()->totalPrice->value];
                }
                View::share('cart', $cart);
            }

    }
}
