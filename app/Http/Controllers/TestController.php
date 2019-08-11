<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{CurrencyRate, Currency};

class TestController extends Controller
{
    //
    public function run(){
    //     $c1=Currency::create([
    //         'code'=> 'EUR',
    //         'name'=> 'Euro'
    //     ]);
  
        // $cr1 = CurrencyRate::create([
        //     'rate' => '8,95'
        // ]);
        $c1 = Currency::find(2);
        dump($c1->rates());
        
        // $c1->rates()->save($cr1);
}
}
