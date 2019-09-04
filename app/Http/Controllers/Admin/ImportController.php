<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;
use App\{Cart, Product, Currency, Price, CartItem};

class ImportController extends Controller
{
    //
    public function add()
    {
        $productCount = 25;
        \Artisan::call('migrate:refresh');
        $currency = Currency::create([
            'code' => 'EUR',
            'name' => 'Euro'
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < $productCount; $i++) {
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
        Cart::truncate();
        CartItem::truncate();
        \Session::forget('cart_id');
        
        return back();
    }
}
