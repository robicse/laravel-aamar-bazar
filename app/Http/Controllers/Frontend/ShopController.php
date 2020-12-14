<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop() {
        return view('frontend.pages.shop.shop');
    }
    public function nearestshop(Request $request) {
        //dd($request->all());
        $lat=$request->lat;
        $lng=$request->lng;
        $shops=Shop::whereBetween('latitude',[$lat-0.1,$lat+0.1])->whereBetween('longitude',[$lng-0.1,$lng+0.1])->get();
        return response()->json(['success'=> true, 'response'=>$shops]);
    }
}
