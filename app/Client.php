<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function contacts(){
        return $this->hasMany(\App\ContactData::class);
    }

    protected $fillable = ['fullname'];
}
