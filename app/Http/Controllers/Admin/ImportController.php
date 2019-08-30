<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;
use App\{Cart, Product, Currency, Price};

class ImportController extends Controller
{
    //
    public function add()
    {
        \Artisan::call('migrate:refresh');
        $currency = Currency::create([
            'code' => 'EUR',
            'name' => 'Euro'
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < 45; $i++) {
            $price = Price::create([
                'value'=> $faker->randomNumber(3)
            ]);
                $price->currency()->associate($currency)->save();

            $product = Product::create([
                'name' => $faker->word,
                'description' => $faker->text(50),
                'image' => $faker->imageUrl(480, 320)
            ]);
            $product->prices()->save($price);
        }
        
        Cart::create();
        $cart = Cart::first();
        $cart->totalPrice()->save(Price::create([
            'value' => 0           
        ]));

        Cart::first()->totalPrice->currency()->associate($currency)->save();
        

        
        return 'done';
    }
}
