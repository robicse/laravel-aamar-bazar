<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaCollection;
use App\Http\Resources\ShippingAddressCollection;
use App\Model\Address;
use App\Model\Area;
use App\Model\District;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function getDistrict(){
        $districts = District::all();
        if (!empty($districts))
        {
            return response()->json(['success'=>true,'response'=> $districts], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong'], 404);
        }
    }
    public function getArea($id){
       $areas = Area::where('district_id',$id)->get();
       return new AreaCollection($areas);
    }
    public function index(){
        $address = Address::where('user_id',Auth::id())->get();
        return new ShippingAddressCollection($address);
//        if (!empty($address))
//        {
//            return response()->json(['success'=>true,'response'=> $address], 200);
//        }
//        else{
//            return response()->json(['success'=>false,'response'=> 'No Address Added yet!'], 404);
//        }
    }
    public function store(Request $request)
    {
        $check = Address::where('user_id',Auth::id())->first();
        $address = new Address();
        $address->user_id = Auth::id();
        $address->district_id = $request->district_id;
        $address->area_id = $request->area_id;
        $address->country = 'Bangladesh';
        $address->address = $request->address;
        $address->phone = $request->phone;
        $address->type = $request->type;
        if (empty($check)){
            $address->set_default = 1;
        }else{
            $address->set_default = 0;
        }
        $address->save();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> $address], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }

    public function addressUpdate(Request $request){
        $address = Address::find($request->id);
        $address->address = $request->address;
        $address->district_id = $request->district_id;
        $address->area_id = $request->area_id;
        $address->phone = $request->phone;
        $address->type = $request->type;
        $address->save();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> 'Address Updated Successfully'], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }

    }


    public function setDefault($id){
        $addresses = Address::where('user_id',Auth::id())->get();
        foreach ($addresses as $key => $address) {
            $address->set_default = 0;
            $address->save();
        }
        $setDefault = Address::find($id);
        $setDefault->set_default = 1;
        $setDefault->save();
        if (!empty($setDefault))
        {
            return response()->json(['success'=>true,'response'=> $setDefault], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function destroy($id) {
        $address = Address::find($id);
        $address->delete();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> 'Address Deleted Successfully'], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
