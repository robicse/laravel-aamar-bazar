<?php

namespace App\Http\Controllers\User;

use App\Model\Order;
use App\Model\OrderDetails;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('frontend.user.home');
    }
    public function invoices()
    {
        return view('frontend.user.invoices');
    }
    public function notification()
    {
        return view('frontend.user.notification');
    }
    public function address()
    {
        return view('frontend.user.address');
    }
    public function orderHistory()
    {
        $orders = Order::where('user_id',Auth::id())->latest()->get();
        return view('frontend.user.order_history',compact('orders'));
    }
    public function wishlist()
    {
        return view('frontend.user.wishlist');
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
