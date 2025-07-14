<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';
    public function redirectTo()
    {
        try {
            if (Auth::user()->is_active == -1){
                Auth::logout();
                return $this->redirectTo = '/notActive';
            }
            switch (Auth::user()->role) {
                case 0:
                    return $this->redirectTo = '/superAdmin';
                    break;

                case 1:
                    return $this->redirectTo = '/trainer';
                    break;

                case 2:
                    return $this->redirectTo;
                    break;

                default:
                    return $this->redirectTo = '/login';
                    break;
            }
        } catch (\Throwable $error) {
            return view('error.error');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
