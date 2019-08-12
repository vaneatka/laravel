<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    protected $table = 'contact_datas';
    //cream relatiile
    public function phones(){
        return $this->hasMany(\App\Phone::class);
    }

    public function city(){
        return $this->belongsTo(\App\City::class);
    }

    public function country(){
        return $this->belongsTo(\App\Country::class);
    }

    public function client(){
        return $this->belongsTo(\App\Client::class);
    }


}
