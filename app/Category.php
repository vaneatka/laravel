<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];

    public function parent(){
        return $this->belongsTo(\App\Category::class, 'category_id');
    }
    public function children(){
        return $this->hasMany(\App\Category::class);
    }
}
