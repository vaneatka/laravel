<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    // facem relatiile
    public function contact(){
        return $this->belongsTo(\App\ContactData::class);
    }
    protected $fillable = ['number'];
}
