<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function cities(){
        return $this->hasMany(\App\City::class);
    }

    public function contacts(){
        return $this->hasMany(\App\ContactData::class);
    }

    protected $fillable = ['name', 'code'];
    
}
