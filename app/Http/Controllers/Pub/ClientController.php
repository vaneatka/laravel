<?php

namespace App\Http\Controllers\Pub;

use App\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ClientController extends Controller
{
    public function subscribeForm(){
        return view('public.subscribe');
    }
    
    public function subscribe(Request $request){
        Email::create([
            'email'=> $request->email,
            'subscribed'=> true
        ]);
        return redirect()->route('client.subscribe');
    }
}
