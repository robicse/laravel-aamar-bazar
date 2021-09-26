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
        $district = District::find($id);
        return view('backend.admin.district.edit',compact('district'));
    }


    public function update(Request $request, $id)
    {
        $district = District::find($id);
        $district->name = $request->name;
        $district->save();

        Toastr::success('Area Updated successfully');
        return redirect()->route('admin.districts.index');
    }

    public function destroy($id)
    {
        //
    }
    public function createArea($id){
        $district = District::find($id);
        return view('backend.admin.district.create_area',compact('district'));
    }
    public function storeArea(Request $request, $id){
        $this->validate($request, [
            'name'=> 'required|unique:areas,name',
        ]);
        foreach ($request->name as $name){
            $area = new Area();
            $area->name = $name;
            $area->district_id = $id;
            $area->save();
        }
        Toastr::success('Area created successfully');
        return redirect()->route('admin.areas.index');

    }
}
