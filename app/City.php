<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function country(){
        return $this->belongsTo(\App\Country::class);
    }

    public function contacts(){
        return $this->hasMany(\App\ContactData::class);
    }

    protected $fillable = ['name'];
}
