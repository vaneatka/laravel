<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //

    // configuram modelul
    protected $fillable = ['name', 'code', 'rate'];
}