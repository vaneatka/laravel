<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function prices(){
        return $this->morphMany(\App\Price::class, 'priceable');
    }

    protected $fillable = ['name', 'description', 'image'];
}
