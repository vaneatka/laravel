<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{    
    use SoftDeletes;

    public function total_price(){
        return $this->morphMany(\App\Price::class, 'priceable');
    }
}
