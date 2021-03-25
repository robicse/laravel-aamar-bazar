<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Shop;
use App\Model\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public  function getCategories() {
        $categories = Category::all();
        if (!empty($categories))
        {
            return response()->json(['success'=>true,'response'=> $categories], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function categoryProducts($id) {
        $shopCategory = ShopCategory::find($id);
        $shop = Shop::where('id',$shopCategory->shop_id)->first();
        $featuredProducts = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('subcategories','products.subcategory_id','=','subcategories.id')
            ->join('sub_subcategories','products.subsubcategory_id','=','sub_subcategories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->where('products.category_id','=',$shopCategory->category_id)
            ->where('products.user_id','=',$shop->user_id)
            ->where('products.published','=',1)
            ->where('products.featured','=',1)
            ->select('categories.name as category_name','subcategories.name as subcategory_name','sub_subcategories.name as sub_subcategory_name','brands.name as brand_name','products.*')
            ->latest()
            ->get();
//        $featuredProducts = Product::where('category_id',$shopCategory->category_id)->where('user_id',$shop->user_id)->where('published',1)->where('featured',1)->get();
        if (!empty($featuredProducts))
        {
            return response()->json(['success'=>true,'response'=> $featuredProducts], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function categoryAllProducts($id) {
        $shopCategory = ShopCategory::where('id',$id)->first();
        $shop = Shop::where('id',$shopCategory->shop_id)->first();
        $allProducts = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('subcategories','products.subcategory_id','=','subcategories.id')
            ->join('sub_subcategories','products.subsubcategory_id','=','sub_subcategories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->where('products.category_id','=',$shopCategory->category_id)
            ->where('products.user_id','=',$shop->user_id)
            ->where('products.published','=',1)
            ->select('categories.name as category_name','subcategories.name as subcategory_name','sub_subcategories.name as sub_subcategory_name','brands.name as brand_name','products.*')
            ->latest()
            ->get();
//        $allProducts = Product::where('category_id',$shopCategory->category_id)->where('user_id',$shop->user_id)->where('published',1)->get();
        if (!empty($allProducts))
        {
            return response()->json(['success'=>true,'response'=> $allProducts], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
