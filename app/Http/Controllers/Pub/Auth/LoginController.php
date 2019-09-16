<?php

namespace App\Http\Controllers\Pub\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Cart;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('carts.checkout');
    }

    public function redirectPath(Request $request = null)
    {   

        if($request == null){            
            return '/client/profile'; 
        }   else  {            
            if (Cart::find($request->session()->get('cart_id'))->isEmpty() && $request->session()->get('cart_id') == null) {
                return '/client/profile';
            } else  if(!Cart::find($request->session()->get('cart_id'))->isEmpty()){
             return '/cart/payment';
            } else {
                return '/client/profile';
            }     
        } 
    }
    
}
