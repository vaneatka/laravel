<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function index(){
        $products = Product::join('prices', 'products.id', '=', 'prices.priceable_id')->paginate(12);
        // dd($products);
        return view('public.products', compact('products'));
    }

    public function indexPriceSort($sort){   
        
        if ($sort == 'cheap') {
            $products = Product::join('prices', 'products.id', '=' , 'prices.priceable_id')->orderBy('value', 'ASC')->paginate(12);             
        }
        if ($sort == 'expensive') {
            $products = Product::join('prices', 'products.id', '=' , 'prices.priceable_id')->orderBy('value', 'DESC')->paginate(12);             
        }

        return view('public.products', compact('products'));
    }
    public function indexDateSort($sort){

        if ($sort == 'newest') {
            $products = Product::orderBy('created_at', 'ASC')->paginate(12);
        }
        if ($sort == 'oldest') {
            $products = Product::orderBy('created_at', 'DESC')->paginate(12);        

        return view('public.products', compact('products'));
        }
    }
}
