<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    public function currency(){
        return $this->belongsTo(\App\Currency::class);
    }

    public function priceable(){
        return $this->morphTo();
    }
    protected $fillable=['value'];

}
