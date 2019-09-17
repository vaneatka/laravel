<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Authenticate extends Middleware
{
    use AuthenticatesUsers;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath($request));
    }


    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {            
            return route('login');
        }
    }
}
