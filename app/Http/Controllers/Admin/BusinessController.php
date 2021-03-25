<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $sellerCommission = BusinessSetting::where('type','seller_commission')->first();
        $refferalValue = BusinessSetting::where('type','refferal_value')->first();
        return view('backend.admin.business.index',compact('sellerCommission','refferalValue'));
    }
    public function commissionUpdate(Request $request){
        //dd($request->all());
        $sellerCommission = BusinessSetting::find($request->id);
        $sellerCommission->value = $request->value;
        $sellerCommission->save();
    }
    public function refferalValueUpdate(Request $request){
        $refferalValue = BusinessSetting::find($request->id);
        $refferalValue->value = $request->value;
        $refferalValue->save();
    }
}
