<?php

namespace App\Providers;

use App\{Cart, CartItem, Product};
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
                 $cart = [  'price'=> 0,
                            'count'=> '0'];                 
                }
                else {
                    $extractedCart = Cart::with('totalPrice')->get()->first();
                    $cartItems = CartItem::all();
                    $products = [];
                    foreach ($cartItems as $item) {
                        $products[]=Product::with('prices.value')->find($item->product_id);
                    }
                    // dd($products);
                    $cart = ['count'=> count(CartItem::all()),
                             'price'=> $extractedCart->totalPrice,
                             'items' => $cartItems,
                             'products'=> $products
                ];
                }               
                View::share('cart', $cart);
            }

    }
}
