<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Seller;
use App\Model\Product;
use App\Model\Shop;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
   public function index()
   {
       $sellerUserInfos = User::where('user_type','seller')->get();
       return view('backend.admin.seller.index', compact('sellerUserInfos'));
   }

   public function verification(Request $request)
   {
       //return $request->id;
       $seller = Seller::find($request->id);
       $seller->verification_status = $request->status;
       if($seller->save()){
           return 1;
       }
       return 0;
   }
   public function commissionForm()
   {
       return view('backend.admin.seller.commission');
   }

   public function commissionStore(Request $request)
   {

   }

   public function paymentHistory()
   {
    return view('backend.admin.seller.payment_history');
   }
   public function withdrawRequest()
   {
       return view('backend.admin.seller.withdraw_request');
   }

   public function profileShow($id)
   {
       $userInfo = User::find($id);
       $sellerInfo = Seller::where('user_id',$id)->first();
       $shopInfo = Shop::where('user_id',$id)->first();
       return view('backend.admin.seller.profile', compact('userInfo','sellerInfo','shopInfo'));
   }
   public function updateProfile(Request $request, $id)
   {
       $this->validate($request, [
           'name' =>  'required',
           'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone,'.$id,
           'email' =>  'required|email|unique:users,email,'.$id,
       ]);

       $user =  User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->save();
       Toastr::success('Seller Profile Updated Successfully','Success');
       return redirect()->back();
   }
    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' =>  'required|confirmed|min:6',
        ]);

        $user =  User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('Seller Password Updated Successfully','Success');
        return redirect()->back();
    }
    public function bankInfoUpdate(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'bank_name' =>  'required',
            'bank_acc_name' =>  'required',
            'bank_acc_no' =>  'required',
            'bank_routing_no' =>  'required',
        ]);

        $serller =   Seller::find($id);
        $serller->bank_name =  $request->bank_name;
        $serller->bank_acc_name =  $request->bank_acc_name;
        $serller->bank_acc_no =  $request->bank_acc_no;
        $serller->bank_routing_no =  $request->bank_routing_no;
        $serller->save();
        Toastr::success('Seller Bank Info Updated Successfully','Success');
        return redirect()->back();
    }
    public function payment_modal(Request $request)
    {
        $seller = Seller::find($request->id);
        return view('backend.admin.seller.payment_modal', compact('seller'));
    }
    public function pay_to_seller_commission(Request $request)
    {

    }


}
