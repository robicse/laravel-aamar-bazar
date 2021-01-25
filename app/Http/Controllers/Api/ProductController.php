<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getFeaturedProducts($id) {
        $shop = Shop::where('id',$id)->first();
        $products = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('featured',1)->get();
        return response()->json(['success'=>true,'response'=> $products], 200);
        if (!empty($products))
        {
            return response()->json(['success'=>true,'response'=> $products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
