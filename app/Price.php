<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    public function currency(){
        return $this->hasOne(\App\Currency::class);
    }

    public function product(){
        return $this->belongsTo(\App\Product::class);
    }

}
