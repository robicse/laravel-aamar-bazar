<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\ShopCategory;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    public  function getShopCategories() {
        $shopCategories = ShopCategory::all();
        if (!empty($shopCategories))
        {
            return response()->json(['success'=>true,'response'=> $shopCategories], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
