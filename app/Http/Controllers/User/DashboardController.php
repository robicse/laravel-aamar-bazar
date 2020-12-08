<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.user.home');
    }
    public function invoices()
    {
        return view('backend.user.invoices');
    }
    public function notification()
    {
        return view('backend.user.notification');
    }
    public function address()
    {
        return view('backend.user.address');
    }
    public function wishlist()
    {
        return view('backend.user.wishlist');
    }
    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone'=> 'required',
        ]);
        $user = User::findOrFail(Auth::id());
//        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back();

    }
}
