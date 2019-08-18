<?php

namespace App\Http\Controllers\Admin;

use App\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{    
    public function subscribers(Request $request){
        $subscribers = Email::paginate(15);
        return view('admin.subscribers',['subscribers'=> $subscribers]);
    }

    public function subscribeManyForm(Request $request){
               return view('admin.subscribeMany');
    }

    public function subscribeMany(Request $request)
    {
        $faker = \Faker\Factory::create();
        $multiple_data = [];
        for ($i = 0; $i < 150; $i++) {
            $multiple_data[] = ['email' => $faker->email,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')];
        }       
        Email::insert($multiple_data);
    }
}