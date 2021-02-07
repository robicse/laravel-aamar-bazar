<?php

namespace App\Http\Controllers\User;

use App\Model\Address;
use App\Model\Order;
use App\Model\OrderDetails;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
//    public function address()
//    {
//        $addresses = Address::where('user_id',Auth::id())->get();
//        return view('frontend.user.address',compact('addresses'));
//    }
    public function updateAddress(Request $request){
        $this->validate($request, [
           'address' =>'required',
            'city' =>'required',
            'postal_code' => 'required',
            'phone' => 'required',
        ]);
        $address = new Address();
        $address->user_id = Auth::id();
        $address->address = $request->address;
        $address->country = 'Bangladesh';
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->save();
        Toastr::success('Address Created Successfully');
        return redirect()->back();

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
        if($request->hasFile('avatar_original')){
            $user->avatar_original = $request->avatar_original->store('uploads/profile');
        }
        $user->update();
        Toastr::success('Profile Updated Successfully');
        return redirect()->back();

    }
    public function editPassword() {
        return view('frontend.user.edit_password');
    }
    public function updatePassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = \App\User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Updated Successfully','Success');
                Auth::logout();
                return redirect()->route('login');
            } else {
                Toastr::error('New password cannot be the same as old password.', 'Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Current password not match.', 'Error');
            return redirect()->back();
        }
    }
}
