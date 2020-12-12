<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo;

    protected function redirectTo() {
        if (Auth::check() && Auth::user()->user_type == 'customer') {
            //dd('okk');
            //Toastr::success('Successfully Logged In',"Success");
            return $this->redirectTo = route('user.dashboard');
        }
        elseif (Auth::check() && Auth::user()->user_type == 'seller') {
            Toastr::success('Successfully Logged In',"Success");
            return $this->redirectTo = route('seller.dashboard');
        }
        else {
            //return('/login');
            return('/');
        }
    }

    public function username()
    {
        return 'phone';
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
