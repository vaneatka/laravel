<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function index(){
        $products = DB::table('products')
                    ->join('prices', 'products.id', 'priceable_id')
                    ->get(); 
        return view('public.products', compact('products'));
    }

    public function indexPriceSort($sort){

        $products = DB::table('products')
            ->join('prices', 'products.id', 'priceable_id')                    
            ->get(); 
        if ($sort == 'cheap') {
            $products = collect($products)->sortBy('value')->toArray();
        }
        if ($sort == 'expensive') {
            $products = collect($products)->sortBy('value')->reverse()->toArray();
        }

        return view('public.products', compact('products'));
    }
    public function indexDateSort($sort){

        $products = DB::table('products')
            ->join('prices', 'products.id', 'priceable_id')                    
            ->get(); 
        if ($sort == 'cheap') {
            $products = collect($products)->sortBy('created_at')->toArray();
        }
        if ($sort == 'expensive') {
            $products = collect($products)->sortBy('created_at')->reverse()->toArray();
        }

        return view('public.products', compact('products'));
    }
    
}
