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
            'postal_code' => 'required',
            'phone' => 'required',
        ]);
        $address = new Address();
        $address->user_id = Auth::id();
        $address->country = 'Bangladesh';
        $address->address = $request->address;
        $address->city = $request->city;
        $address->area = $request->area;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->type = $request->type;
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
        $addresses = Address::where('user_id',Auth::id())->get();
        foreach ($addresses as $key => $address) {
            $address->set_default = 0;
            $address->save();
        }
        $address = Address::findOrFail($id);
        $address->set_default = 1;
        $address->save();
        Toastr::success('Default Address Added Successfully');
        return redirect()->back();
    }
}
