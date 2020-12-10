<?php

namespace App\Http\Controllers\User;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
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
    public function orderHistory()
    {
        return view('backend.user.order_history');
    }
    public function wishlist()
    {
        return view('backend.user.wishlist');
    }
    public function update(Request $request) {
//        dd('saf');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone'=> 'required',
        ]);
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->update();
        Toastr::success('Profile Updated Successfully');
        return redirect()->back();

    }
}
