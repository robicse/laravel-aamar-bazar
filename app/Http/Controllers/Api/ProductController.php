<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\FlashDeal;
use App\Model\Product;
use App\Model\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getFeaturedProducts($id) {
        $shop = Shop::where('id',$id)->first();
        $products = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('subcategories','products.subcategory_id','=','subcategories.id')
            ->join('sub_subcategories','products.subsubcategory_id','=','sub_subcategories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->where('products.user_id','=',$shop->user_id)
            ->where('products.added_by','=','seller')
            ->where('products.published','=',1)
            ->where('products.featured','=',1)
            ->select('categories.name as category_name','subcategories.name as subcategory_name','sub_subcategories.name as sub_subcategory_name','brands.name as brand_name','products.*')
            ->latest()
            ->get();
//        $products = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('featured',1)->get();
//        return response()->json(['success'=>true,'response'=> $products], 200);
        if (!empty($products))
        {
            return response()->json(['success'=>true,'response'=> $products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getTodaysDeal($id) {
        $shop = Shop::where('id',$id)->first();
        $todaysDeal = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('subcategories','products.subcategory_id','=','subcategories.id')
            ->join('sub_subcategories','products.subsubcategory_id','=','sub_subcategories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->where('products.user_id','=',$shop->user_id)
            ->where('products.added_by','=','seller')
            ->where('products.published','=',1)
            ->where('products.todays_deal','=',1)
            ->select('categories.name as category_name','subcategories.name as subcategory_name','sub_subcategories.name as sub_subcategory_name','brands.name as brand_name','products.*')
            ->latest()
            ->get();
//        $todaysDeal = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('todays_deal',1)->get();
        if (!empty($todaysDeal))
        {
            return response()->json(['success'=>true,'response'=> $todaysDeal], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getBestSales($id) {
        $shop = Shop::where('id',$id)->first();
        $best_sales_products = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('subcategories','products.subcategory_id','=','subcategories.id')
            ->join('sub_subcategories','products.subsubcategory_id','=','sub_subcategories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->where('products.user_id','=',$shop->user_id)
            ->where('products.added_by','=','seller')
            ->where('products.published','=',1)
            ->where('products.num_of_sale','>',0)
            ->select('categories.name as category_name','subcategories.name as subcategory_name','sub_subcategories.name as sub_subcategory_name','brands.name as brand_name','products.*')
            ->latest()
            ->get();
//        $best_sales_products=Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('num_of_sale', '>',0)->get();
        if (!empty($best_sales_products))
        {
            return response()->json(['success'=>true,'response'=> $best_sales_products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getFlashDeals($id) {
        $shop = Shop::where('id',$id)->first();
        $flashDeal = FlashDeal::where('status',1)->where('user_id',$shop->user_id)->where('user_type','seller')->where('featured',1)->first();
        if (!empty($flashDeal))
        {
            return response()->json(['success'=>true,'response'=> $flashDeal], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getRelatedProducts($id){
        $product = Product::find($id);
        $RelatedProducts = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('subcategories','products.subcategory_id','=','subcategories.id')
            ->join('sub_subcategories','products.subsubcategory_id','=','sub_subcategories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->where('products.category_id','=',$product->category_id)
            ->where('products.added_by','=','seller')
            ->where('products.published','=',1)
            ->select('categories.name as category_name','subcategories.name as subcategory_name','sub_subcategories.name as sub_subcategory_name','brands.name as brand_name','products.*')
            ->latest()
            ->get();
//        $RelatedProducts = Product::where('category_id',$product->category_id)->where('published',1)->get();
        if (!empty($RelatedProducts))
        {
            return response()->json(['success'=>true,'response'=> $RelatedProducts], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function search_product(Request $request) {

        $storeId =  $request->shop_id;
        $name = $request->q;
        $shop = Shop::find($storeId);
        $products = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('subcategories','products.subcategory_id','=','subcategories.id')
            ->join('sub_subcategories','products.subsubcategory_id','=','sub_subcategories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->where('products.name','LIKE',"%{$name}%")
            ->where('products.user_id','=',$shop->user_id)
            ->orWhere('products.tags','like',"%{$name}%")
            ->where('products.published','=',1)
            ->select('categories.name as category_name','subcategories.name as subcategory_name','sub_subcategories.name as sub_subcategory_name','brands.name as brand_name','products.*')
            ->get();
//        $products = Product::where('name', 'LIKE', '%'. $name. '%')->where('user_id',$shop->user_id)->orWhere('tags', 'like', '%'.$name.'%')->where('published',1)->get();
        if (!empty($products))
        {
            return response()->json(['success'=>true,'response'=> $products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
