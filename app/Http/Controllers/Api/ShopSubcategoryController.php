<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Shop;
use App\Model\ShopCategory;
use App\Model\ShopSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopSubcategoryController extends Controller
{
    public  function getShopSubcategories(Request $request) {
        $shopSubcategories = DB::table('shop_subcategories')
            ->Join('subcategories','shop_subcategories.subcategory_id','=','subcategories.id')
            ->where('shop_subcategories.shop_id',$request->shop_id)
            ->where('shop_subcategories.category_id',$request->category_id)
            ->select('shop_subcategories.subcategory_id as subcategory_id','shop_subcategories.shop_id','shop_subcategories.category_id as category_id','subcategories.name as subcategory_name')
            ->get();
//        $shopSubcategories = ShopSubcategory::where('shop_id',$request->shop_id)->where('category_id',$request->category_id)->latest()->get();
        if (!empty($shopSubcategories))
        {
            return response()->json(['success'=>true,'response'=> $shopSubcategories], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
