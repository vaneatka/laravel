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
        
        $cart = Cart::create();
        $total_price=0;
        $products= Product::all();
        foreach ($products->pluck('prices') as $product) {
            $total_price+= $product->first()['value'];
        }
        $price = Price::create([
            'value'=> $total_price
        ]);
        $price->currency()->associate($currency)->save();
        $cart->total_price()->save($price);
       
        
        return 'done';
    }
}
