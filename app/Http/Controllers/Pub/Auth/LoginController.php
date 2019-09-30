<?php

namespace App\Http\Controllers\Pub\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Cart;
use Illuminate\Http\Request;

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

    public function redirectPath( )
    {   
        $request = request();
        
        if (\Auth::id()) {    
            $cart = Cart::where('user_id', \Auth::id())->with('items')->where('status', 'open')->get()->first();
                        
            if(\Auth::user()->role == "administrator"){                
                return '/admin/dashboard';
            }
        if ($cart) {
                if (!$cart->items->isEmpty()) {   
                    return '/cart/payment';
                } else {                
                    return '/client/profile';
                } 
            }
        }
            
    }
    
}
