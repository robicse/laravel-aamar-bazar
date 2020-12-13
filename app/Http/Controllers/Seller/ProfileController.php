<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Seller;
use App\Model\Shop;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile() {
        $shops = Shop::where('user_id',Auth::id())->first();
        return view('backend.seller.profile.edit_profile',compact('shops'));
    }
    public function profile_update(Request $request) {

        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->update();

//        $seller = Seller::where('user_id',Auth::id())->first();
//        $seller->user_id = Auth::id();
//        $seller->update();

            $shop = Shop::where('user_id',Auth::id())->first();
//            dd($shop->user_id);
            $shop->address = $request->address;
            $shop->city = $request->city;
            $shop->area = $request->area;
            $shop->latitude = $request->latitude;
            $shop->longitude = $request->longitude;
            if($request->hasFile('logo')){
                $shop->logo = $request->logo->store('uploads/shop/logo');
            }
            $shop->update();
        Toastr::success('Successfully Updated!');
        return redirect()->back();
    }
    public function password() {

        return view('backend.seller.profile.edit_password');
    }
    public function password_update(Request $request) {
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
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
    public function payment() {
        $pay = Seller::where('user_id',Auth::id())->first();
        return view('backend.seller.profile.payment', compact('pay'));
    }
    public function payment_update(Request $request) {
        $payment= Seller::where('user_id',Auth::id())->first();
        if(empty($payment)) {
            $new_pay = new Seller();
            $new_pay->bank_name = $request->bank_name;
            $new_pay->bank_acc_name = $request->bank_acc_name;
            $new_pay->bank_acc_no = $request->bank_acc_no;
            $new_pay->cash_on_delivery_status = 0;
            $new_pay->bank_payment_status = 0;
            $new_pay->save();
            Toastr::success("Seller Inserted Successfully","Success");
            return redirect()->route('seller.payment.settings');
        }else {
            $payment->bank_name = $request->bank_name;
            $payment->bank_acc_name = $request->bank_acc_name;
            $payment->bank_acc_no = $request->bank_acc_no;
            $payment->update();
            Toastr::success("Seller Updated Successfully","Success");
            return redirect()->route('seller.payment.settings');

        }
    }
    public function cashOnDelivery(Request $request)
    {
        //return 'ok';
        $payment = Seller::find($request->id);
        $payment->cash_on_delivery_status = $request->status;
        if($payment->save()){
            return 1;
        }
        return 0;
    }
    public function bankPayment(Request $request)
    {
        //return 'ok';
        $payment = Seller::find($request->id);
        $payment->bank_payment_status = $request->status;
        if($payment->save()){
            return 1;
        }
        return 0;
    }
}
