<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Phone, ContactData, Country, City, Client, Social, Email};

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
        // $c1 = Currency::find(2);
        // dump($c1->rates());
        
        // $c1->rates()->save($cr1);

        $client = Client::create([
            'fullname'=> 'Jo Jordan'
        ]);

        $contact = ContactData::create();

        $country = Country::create([
            'name' => 'Moldova mea',
            'code'=> 'MD'
        ]);

        $city = City::create([
            'name'=> 'Chisinau'            
        ]);

        $phone1 = Phone::create([
            'number' => '666000665'
        ]);
        $phone2 = Phone::create([
            'number' => '35236236'
        ]);
        
        $email = Email::create([
            'email' => 'posta@electronica'
        ]);
        
        $social = Social::create([
            'name' => 'social@nume',
            'social_id' => 'idididi'
        ]);


            ///////////// cream relatiile

        $contact->phones()->save($phone1);
        $contact->phones()->save($phone2);
        $contact->country()->associate($country);
        $city->country()->associate($country);
        
        $contact->city()->associate($city);
        $contact->client()->associate($client);
        
        
        $contact->email()->associate($email);

        $contact->social()->save($email);
        $contact->save();


}


}
