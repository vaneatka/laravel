<?php

namespace App\Http\Controllers\Pub;

use Artisan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Phone, ContactData, Country, City, Client, Social, Email, Category, Price, Currency, Product,Cart, User};

class TestController extends Controller
{
    //
    public function run(){
        // \Auth::logout();

        // Artisan::call('migrate:refresh');
        //     $c1=Currency::create([
        //         'code'=> 'EUR',
        //         'name'=> 'Euro'
        //     ]);

        // $cr1 = CurrencyRate::create([
        //     'rate' => '8,95'
        // ]);
        // $c1 = Currency::find(2);
        // dump($c1->rates());

        // $c1->rates()->save($cr1);

        // $client = Client::create([
        //     'fullname'=> 'Jo Jordan'
        // ]);

        // $contact = ContactData::create();

        // $country = Country::create([
        //     'name' => 'Moldova mea',
        //     'code'=> 'MD'
        // ]);

        // $city = City::create([
        //     'name'=> 'Chisinau'            
        // ]);

        // $phone1 = Phone::create([
        //     'number' => '666000665'
        // ]);
        // $phone2 = Phone::create([
        //     'number' => '35236236'
        // ]);

        // $email = Email::create([
        //     'email' => 'posta@electronica'
        // ]);

        // $social = Social::create([
        //     'name' => 'social@nume',
        //     'social_id' => 'idididi'
        // ]);


        //     ///////////// cream relatiile

        // $contact->phones()->save($phone1);
        // $contact->phones()->save($phone2);
        // $contact->country()->associate($country);
        // $city->country()->associate($country);

        // $contact->city()->associate($city);
        // $contact->client()->associate($client);


        // $contact->email()->associate($email);

        // $contact->social()->save($email);
        // $contact->save();
        // Category::truncate();

        // $cat1 = Category::create([
        //     'name' => 'Porumb'            
        // ]);

        // $cat2 = Category::create([
        //     'name' => 'Pop Corn'            
        // ]);
        // $cat3 = Category::create([
        //     'name' => 'Pop Corn Sarat'            
        // ]);

        // $cat1->children()->save($cat2);
        // $cat3->parent()->associate($cat2)->save();
        //    $result = Category::where('name','Porumb')->get();
        //    dd($result->first()->children);

        // $currency = Currency::create([
        //     'code' => 'EUR',
        //     'name' => 'Euro'
        // ]);

        // $price = Price::create([
        //     'value' => 10.5
        // ]);
        // $price2 = Price::create([
        //     'value' => 1481.5
        // ]);


        // $price->currency()->associate($currency)->save();
        // $price2->currency()->associate($currency)->save();

        // // $product= Product::create([
        // //     'name' => 'ARGH'
        // // ]);

        // // $product->prices()->save($price);

        // $cart = Cart::create()->totalPrice()->save($price2);
        // $cart2 = Cart::create();
        // $cart2->totalPrice()->save($price);


        // $cart2->delete();

        dd(\Auth::user());

    }

}