<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\UserInfo;
use App\Http\Controllers\Controller;
use App\Model\PasswordResetCode;
use App\Model\VerificationCode;
use App\Providers\RouteServiceProvider;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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



//    protected function credentials(Request $request)
//    {
//        if(is_numeric($request->get('email'))){
//            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
//        }
//        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
//            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
//        }
//        return ['username' => $request->get('email'), 'password'=>$request->get('password')];
//    }

    protected function credentials(Request $request)
    {
        return ['phone' => $request->get('phone'), 'password'=>$request->get('password'),'banned'=>0];
    }

    public function username()
    {
        return 'phone';
    }



    public function reset_pass_check_mobile(Request $request) {
        $user= User::where('phone',$request->phone)->first();
        if(!empty($user)){

            $verification = VerificationCode::where('phone',$user->phone)->first();
            if (!empty($verification)){
                $verification->delete();
            }
            $verCode = new VerificationCode();
            $verCode->phone = $user->phone;
            $verCode->code = mt_rand(1111,9999);
            $verCode->status = 0;
            $verCode->save();
            $text = "Dear ".$user->name.", Your Password Reset Verification Code is ".$verCode->code;
            UserInfo::smsAPI("88".$verCode->phone,$text);
            Toastr::success('Thank you for your registration. We send a verification code in your mobile number. please verify your phone number.' ,'Success');
            return view('frontend.pages.verification',compact('verCode'));
        }else{
            Toastr::danger('oops!! No User Found With This Phone Number.Please Sign Up First.','Success');
            return redirect()->back();
        }
    }

    public function reset_pass(Request $request) {
        $this->validate($request, [
            'newPassword' =>  'required|min:6',
        ]);
        $verification = VerificationCode::where('phone',$request->phone)->where('code',$request->code)->first();
        if (!empty($verification)){
            $user=\App\User::where('phone',$request->phone)->first();
//                $rand_pass= mt_rand(111111,999999);
            $new_pass=Hash::make($request->newPassword);
            $user->password=$new_pass;
            $user->update();
            $verification->status = 1;
            $verification->update();
//                $text = "Dear ".$user->name.", Your New Password is ".$rand_pass.".Please Change Password from Profile Edit";
//                UserInfo::smsAPI("0".$user->phone,$text);

            Toastr::success('Password Changed' ,'Success');
            return redirect()->route('login');
        }else{
            Toastr::success('Wrong Code' ,'error');
            $phone=$request->phone;
            return view('Frontend.Pages.reset_pass',compact('phone'));
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
