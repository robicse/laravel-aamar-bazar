<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customerInfos = User::where('user_type','customer')->get();
//        dd($customerInfos);
        return view('backend.admin.customer.index',compact('customerInfos'));
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
    public function profileShow($id)
    {
        $userInfo = User::find($id);
//        $sellerInfo = Seller::where('user_id',$id)->first();
//        $shopInfo = Shop::where('user_id',$id)->first();
        return view('backend.admin.customer.profile', compact('userInfo'));
    }
}
