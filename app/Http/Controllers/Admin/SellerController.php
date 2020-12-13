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

}
