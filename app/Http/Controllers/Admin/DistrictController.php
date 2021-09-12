<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Area;
use App\Model\District;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function index()
    {
        $districts = District::latest()->get();
        return view('backend.admin.district.index',compact('districts'));

    }

    public function create()
    {
        return view('backend.admin.district.create');
    }

    public function store(Request $request)
    {
        $district = new District();
        $district->name = $request->name;
        $district->save();
        Toastr::success('District created successfully');
        return redirect()->route('admin.districts.index');

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
        //
    }
}
