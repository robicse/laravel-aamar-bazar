<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $shop_set = Shop::where('seller_id',Auth::id())->latest()->first();
//        dd($shop_set);
        return view('backend.seller.settings.shop.create',compact('shop_set'));
    }

    public function store(Request $request)
    {
        $new_shop = \App\Model\Shop::where('seller_id',Auth::id())->where('name',$request->name)->latest()->get();
        if(empty($new_shop)){
            $shop = new Shop;
            $shop->name = $request->name;
            $shop->address = $request->address;
            $shop->user_id = Auth::id();
            $shop->seller_id = Auth::id();
//        $sliders = array();

            if($request->has('previous_sliders')){
                $sliders = $request->previous_sliders;
            }
            else{
                $sliders = array();
            }

            if($request->hasFile('sliders')){
                foreach ($request->sliders as $key => $slider) {
                    array_push($sliders, $slider->store('uploads/shop/sliders'));
                }
            }

            $shop->sliders = json_encode($sliders);

            if($request->hasFile('logo')){
                $shop->logo = $request->logo->store('uploads/shop/logo');
                //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
            }
            $shop->save();

            Toastr::success("Shop Inserted Successfully","Success");
            return redirect()->route('seller.shop.create');
        }else {
            $new_shop->name = $request->name;
            $new_shop->address = $request->address;
            $new_shop->user_id = Auth::id();
            $new_shop->seller_id = Auth::id();
//        $sliders = array();

            if($request->has('previous_sliders')){
                $sliders = $request->previous_sliders;
            }
            else{
                $sliders = array();
            }

            if($request->hasFile('sliders')){
                foreach ($request->sliders as $key => $slider) {
                    array_push($sliders, $slider->store('uploads/shop/sliders'));
                }
            }

            $new_shop->sliders = json_encode($sliders);

            if($request->hasFile('logo')){
                $new_shop->logo = $request->logo->store('uploads/shop/logo');
                //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
            }
            $new_shop->update();

            Toastr::success("Shop Inserted Successfully","Success");
            return redirect()->route('seller.shop.create');
        }

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
