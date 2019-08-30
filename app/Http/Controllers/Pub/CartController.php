<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Cart, CartItem, Product, Price};

class CartController extends Controller
{
    public function add($id)
    {
        
        CartItem::truncate();

        $cart = Cart::first();
        $product = Product::find($id);
        $cartitem = CartItem::create([
            'amount' => 1,
            'product_id' => $product->id,
            'cart_id' => $cart->id
        ]);        
        // dd($product->prices->first());
        $cartitem->itemPrice()->save($product->prices->first());
        $cart->items()->save($cartitem);
        return $id;
    }
}
