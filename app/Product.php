<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function prices(){
        return $this->morphMany(\App\Price::class, 'priceable');
    }

    public function cartItems()
    {
        return $this->belongsTo(\App\CartItem::class);
    }
    
    protected $fillable = ['name', 'description', 'image'];
}
