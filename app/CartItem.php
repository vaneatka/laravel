<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use SoftDeletes;

    public function itemPrice()
    {
        return $this->morphOne(\App\Price::class, 'priceable');
    }

    public function product()
    {
        return $this->hasOne(\App\Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(\App\Cart::class);
    }
    //
    protected $fillable = ['amount', 'product_id', 'cart_id'];
}
