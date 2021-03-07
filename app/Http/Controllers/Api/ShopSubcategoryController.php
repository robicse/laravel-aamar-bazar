<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Shop;
use App\Model\ShopCategory;
use App\Model\ShopSubcategory;
use Illuminate\Http\Request;

class ShopSubcategoryController extends Controller
{
    public  function getShopSubcategories(Request $request) {

        $shopSubcategories = ShopSubcategory::where('shop_id',$request->shop_id)->where('category_id',$request->category_id)->latest()->get();
        if (!empty($shopSubcategories))
        {
            return response()->json(['success'=>true,'response'=> $shopSubcategories], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
