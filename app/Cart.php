<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{    
    use SoftDeletes;

    public function items(){
        return $this->hasMany(\App\CartItem::class);
    }

    public function totalPrice()
    {
        return $this->morphOne(\App\Price::class, 'priceable');
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    protected $fillable = ['status'];
}
