<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{

    public function currency(){
        return $this->belongsTo(App\Currency::class);
    }
    //
    protected $fillable = ['rate'];
}
