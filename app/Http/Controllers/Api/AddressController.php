<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index(){
        $address = Address::where('user_id',Auth::id())->get();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> $address], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'No Address Added yet!'], 404);
        }
    }
    public function store(Request $request)
    {
        $check = Address::where('user_id',Auth::id())->first();
        if (empty($check)){
            $new_address = new Address();
            $new_address->user_id = Auth::id();
            $new_address->address = $request->address;
            $new_address->country = 'Bangladesh';
            $new_address->city = $request->city;
            $new_address->postal_code = $request->postal_code;
            $new_address->phone = $request->phone;
            $new_address->type = $request->type;
            $new_address->set_default = 1;
            $new_address->save();
            if (!empty($new_address))
            {
                return response()->json(['success'=>true,'response'=> $new_address], 200);
            }
            else{
                return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
            }
        }
        $address = new Address();
        $address->user_id = Auth::id();
        $address->address = $request->address;
        $address->country = 'Bangladesh';
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->type = $request->type;
        $address->set_default = 0;
        $address->save();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> $address], 200);
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
