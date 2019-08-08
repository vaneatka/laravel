<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fadion\Fixerio\Exchange;
use Fadion\Fixerio\Currency;
use function GuzzleHttp\json_decode;

class CurrencyController extends Controller
{
    //
    private $url = 'https://api.exchangeratesapi.io/latest?symbols=USD,GBP';    

    public function import(){
        $rates = file_get_contents($this->url, true);        
        dump(json_decode($rates));
    }
}
