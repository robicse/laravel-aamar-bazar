<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UserInfo;
use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function getVerificationCode($id) {
//        $user = User::find($id);
//        dd($user->name);
//
////        $verification = User::where('phone',$user->phone)->first();
////        if (!empty($verification)){
////            $verification->delete();
////        }
//        $verCode = new User();
//        $verCode->verification_code = mt_rand(1111,9999);
//        $verCode->update();
//        $text = "Dear ".$user->name.", Your Aamar Bazar OTP is ".$verCode->verification_code;
////        echo $text;exit();
//        UserInfo::smsAPI("88".$user->phone,$text);
//        Toastr::success('Thank you for your registration. We send a verification code in your mobile number. please verify your phone number.' ,'Success');
//        //$verCode = $verCode->phone;
//        //dd($text);
        return view('frontend.pages.verification');
    }
}
