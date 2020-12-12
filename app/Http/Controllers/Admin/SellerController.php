<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
   public function index()
   {
       $sellerUserInfos = User::where('user_type','seller')->get();
       return view('backend.admin.seller.index', compact('sellerUserInfos'));
   }

}
