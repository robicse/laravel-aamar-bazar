<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Address;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::where('user_id',Auth::id())->get();
        return view('frontend.user.address',compact('addresses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
        Toastr::success('Address Deleted Successfully');
        return redirect()->back();

    }
    public function updateStatus($id) {
//        dd('sknk');
        $addresses = Address::where('set_default',1)->first();
        if (!empty($addresses)) {
            $addresses->set_default = 0;
            $addresses->save();
        }
        $setDefault = Address::find($id);
        $setDefault->set_default = 1;
        $setDefault->save();
        Toastr::success('Default Address Added Successfully');
        return redirect()->back();
    }
}
