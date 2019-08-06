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

    public function test(){
        $faker = Faker::create();
        $products = collect([]);
        for ($i=0; $i < 5  ; $i++) { 
            $products->push(new Product($faker->company ,$faker->imageUrl(240),new Price(rand(100,5000), new Currency('Lei Moldovenesti', $faker->currencyCode))) );
        }
        return view('products.test', ['products'=>$products]);
    }
}
