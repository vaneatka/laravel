<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    public function rates(){
        return $this->hasMany(\App\CurrencyRate::class);
    }
    // configuram modelul
    protected $fillable = ['name', 'code'];
}