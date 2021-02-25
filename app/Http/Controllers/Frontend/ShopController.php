<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function nearestshop(Request $request) {
        //dd($request->all());
        $lat=$request->lat;
        $lng=$request->lng;
        $shops=Shop::whereBetween('latitude',[$lat-0.02,$lat+0.02])->whereBetween('longitude',[$lng-0.02,$lng+0.02])->get();
        return response()->json(['success'=> true, 'response'=>$shops]);
    }
    public function bestSellerShopList() {
        $shops = DB::table('shops')
            ->join('sellers','shops.user_id','=','sellers.user_id')
            ->where('sellers.verification_status','=',1)
            ->select('shops.*')
            ->get();
        return view('frontend.pages.shop.best_seller_shop_list',compact('shops'));
    }

}
