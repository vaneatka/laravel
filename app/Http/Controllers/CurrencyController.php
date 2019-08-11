<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fadion\Fixerio\Exchange;

use function GuzzleHttp\json_decode;
use App\Currency;

class CurrencyController extends Controller
{
    //
    private $url = 'https://api.exchangeratesapi.io/latest';    

    public function import(){
        $rates = collect(json_decode(file_get_contents($this->url, true)))->all()['rates'];        
        dump($rates);

        // $key = collect(json_decode(file_get_contents("https://restcountries.eu/rest/v2/currency/mdl", true)))->first()->currencies[0]->name;
        // dump($key);

        foreach($rates as $key=>$rate){
            $name = collect(json_decode(file_get_contents("https://restcountries.eu/rest/v2/currency/{$key}", true)))->first()->currencies[0]->name;
            Currency::create([
                'name' => $name,
                'code'=> $key,
                'rate'=> $rate,
            ]);
            
        }
    }
}
