<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\District;
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
            'phone' => 'required',
        ]);
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
        Toastr::success('Address Created Successfully');
        return redirect()->back();
    }





    public function show($id)
    {
        //
    }

    public function edit($id)
    {


    }
    public function editModal(Request $request){
        $address = Address::find($request->id);
//        $district = District::where('name',$address)
        return view('frontend.user.edit_address_modal',compact('address'));
    }

    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        $address->address = $request->address;
        $address->district_id = $request->district_id;
        $address->area_id = $request->area_id;
        $address->phone = $request->phone;
        $address->type = $request->type;
        $address->save();
        Toastr::success('Address Updated Successfully');
        return redirect()->back();
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
