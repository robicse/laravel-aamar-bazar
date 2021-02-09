<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Shop;
use App\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index() {
       //echo "Hello";
        return view('backend.admin.vendor.index');
    }

    public function indexTest(){
        return view('backend.admin.vendor.index2');
    }

    public function sellerReport() {
        $sellers = User::where('user_type','seller')->get();
        $orders = null;
        return view('backend.admin.vendor.seller_report',compact('sellers','orders'));
    }
    public function sellerOrderDetails(Request $request) {
//        dd('dhs');
        $sellers = User::where('user_type','seller')->get();
        if (!empty($request->seller_id && $request->delivery_status)){
//            dd($request->all());
            $sellerId = $request->seller_id;
            $deliveryStatus = $request->delivery_status;
            $orders = Order::where('user_id',$sellerId)->where('delivery_status',$deliveryStatus)->get();
            return view('backend.admin.vendor.seller_report',compact('sellers','orders'));
        }

    }

    public function nearestShp(Request $request)
    {
        $vendors = Shop::all();
        return response()->json(['success'=> true, 'response'=>$vendors]);
    }



}
