<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('frontend.pages.index');
    }
    public function register(Request $request) {

        $this->validate($request, [
            'name' =>  'required',
            'email' =>  'required|email|unique:users,email',
            'phone' => 'required|unique:users,mobile_number',
            'password' =>  'required|confirmed|min:6',
        ]);
        $userReg = new User();
        $userReg->name = $request->name;
        $userReg->email = $request->email;
        $userReg->mobile_number = $request->mobile_number;
        $userReg->password = Hash::make($request->password);
        $userReg->role_id = 3;
        $userReg->save();
//        Toastr::success('Your registration successfully done!');
        $credential = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credential)) {
            return redirect()->route('users.dashboard');
        }

    }
}
