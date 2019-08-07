<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Price,Currency, Product};
use Faker\Factory as Faker;

class ProductController extends Controller
{

    public function index(){
        return view('product');
    }

    public function old_test(){
        $faker = Faker::create();
        $products = collect([]);
        for ($i=0; $i < 5  ; $i++) { 
            $products->push(new Product($faker->company ,$faker->imageUrl(240),new Price(rand(100,5000), new Currency('Lei Moldovenesti', $faker->currencyCode))) );
        }
        foreach($products as $product){
            for ($i=1; $i < 10; $i++) { 
                $product->addImage($faker->imageUrl());
            }
        }
        return view('products.test', ['products'=>$products]);
    }

    public function test(){
        $faker = Faker::create();
        // $c1 = new Currency();// in memorie
        // $c1->code = $faker->currencyCode;
        // $c1->name = 'HZ';
        // $c1->save();

        // Currency::create([
        //     "name" => "US DOllar",
        //     'code' => "USD"
        // ]);
        $currencies = Currency::all()->sortByDesc('code')->pluck('code');
        dump($currencies);
        return 'ok';
    }
}
