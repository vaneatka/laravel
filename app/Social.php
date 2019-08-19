<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['social_id','name'];
    //
    public function contact()
    {
        return $this->belongsTo(\App\ContactData::class);
    }
    
}
