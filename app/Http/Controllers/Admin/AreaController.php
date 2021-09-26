<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Area;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function index()
    {
        $areas = Area::orderBy('name','ASC')->get();
        return view('backend.admin.area.index',compact('areas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $area = Area::find($id);
        return view('backend.admin.area.edit',compact('area'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|unique:areas,name',$id,
        ]);
        $area = Area::find($id);
        $area->name = $request->name;
        $area->save();

        Toastr::success('Area Updated successfully');
        return redirect()->route('admin.areas.index');
    }

    public function destroy($id)
    {
        //
    }
}
