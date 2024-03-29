<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Subcategory;
use App\Model\SubSubcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubcategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:subsubcategories-list|subsubcategories-create|subsubcategories-edit', ['only' => ['index','store']]);
        $this->middleware('permission:subsubcategories-create', ['only' => ['create','store']]);
        $this->middleware('permission:subsubcategories-edit', ['only' => ['edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsubcategories = SubSubcategory::all();
        return view('backend.admin.subsubcategories.index', compact('subsubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('backend.admin.subsubcategories.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|unique:sub_subcategories,name',
        ]);

        $subSubCategory = new SubSubcategory();
        $subSubCategory->name = $request->name;
        $subSubCategory->sub_category_id = $request->sub_category_id;
        $subSubCategory->slug = Str::slug($request->name);
        $subSubCategory->status = 1;
        $subSubCategory->meta_title = $request->meta_title;
        $subSubCategory->meta_description = $request->meta_description;
        $subSubCategory->save();
        Toastr::success('Sub SubCategories Created Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategories = Subcategory::all();
        $subsubcategory = SubSubcategory::find($id);
        return view('backend.admin.subsubcategories.edit',compact('subcategories','subsubcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|unique:sub_subcategories,name,'.$id,
        ]);

        $subSubCategory = SubSubcategory::find($id);
        $subSubCategory->name = $request->name;
        $subSubCategory->sub_category_id = $request->sub_category_id;
        $subSubCategory->slug = Str::slug($request->name);
        $subSubCategory->meta_title = $request->meta_title;
        $subSubCategory->meta_description = $request->meta_description;
        $subSubCategory->save();
        Toastr::success('Sub SubCategories Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubSubcategory::find($id)->delete();
        Toastr::success('Sub SubCategories Deleted Successfully');
        return back();
    }
    public function updateStatus(Request $request){
        $subsubcategory = SubSubcategory::findOrFail($request->id);
        $subsubcategory->status = $request->status;
        if($subsubcategory->save()){
            return 1;
        }
        return 0;
    }
}
