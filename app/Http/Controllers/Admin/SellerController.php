<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Seller;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;

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
       return view('backend.admin.seller.profile', compact('userInfo','sellerInfo'));
   }

}
