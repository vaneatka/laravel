<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Cart, CartItem, Product, Price};

class CartController extends Controller
{
    public function add($id)
    {
        $cart = Cart::first();        
        $product = Product::find($id);
        $cartitem = CartItem::create([
            'amount' => 1,
            'product_id' => $id,
            'cart_id' => $cart->id
        ]);        
        $cartitem->itemPrice()->save($product->prices->first());         
        $cart->items()->save($cartitem);
        $cart_cost = $cartitem->itemPrice->value + $cart->totalPrice->value;

        $cart->totalPrice->update(['value' => $cart_cost]);     
        
        
    }
}
