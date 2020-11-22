<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowLoginForm()
    {
        //dd('admin login');
        return view('auth.admin.login');
    }
    public function LoginCheck(Request $request)
    {
       // dd($request->all());
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => 'admin',
        ];
        if (Auth::attempt($credential)) {
            Toastr::success('Successfully Logged In!');
            return redirect()->route('admin.dashboard');
        }else {
            //dd('sdfsadf');
            Toastr::Error('Credential Does not matched!!','Error');
            return redirect()->route('admin.login');
        }
    }
}
