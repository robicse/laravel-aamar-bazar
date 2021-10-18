<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\FavoriteShop;
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use App\Model\Product;
use App\Model\Review;
use App\Model\Seller;
use App\Model\Shop;
use App\Model\ShopCategory;
use App\Model\ShopSubcategory;
use App\Model\ShopSubSubcategory;
use App\Model\Subcategory;
use App\Model\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search_shop_product(Request $request){

        $shop = Shop::find($request->shop_id);
        $seller = Seller::where('user_id',$shop->user_id)->first();
        $name = $request->get('searchName');
        $shopCat=ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $products = DB::table('products')
            ->where('user_id',$shop->user_id)
            ->where('added_by','seller')
            ->where('published',1)
            ->where(function ($query) use ($name) {
                $query->where('name', 'LIKE', '%'. $name. '%')->orWhere('tags', 'like', '%'.$name.'%');
            })->get();
        $flashDeal = FlashDeal::where('status',1)->where('user_type','admin')->where('featured',1)->first();
        if(!empty($flashDeal)){
            $flashDealProducts = FlashDealProduct::where('user_id',$shop->user_id)->where('flash_deal_id',$flashDeal->id)->latest()->take(10)->get();
        }else{
            $flashDealProducts = null;
        }
        return view('frontend.pages.vendor.vendor_store',compact('shop','seller','products','shopCat','flashDeal','flashDealProducts'));
    }
    public function search_category_product(Request $request){

        $shop = Shop::find($request->shop_id);
        $category = Category::find($request->category_id);
        $name = $request->get('searchName');
        $shopSubcategories = ShopSubcategory::where('shop_id',$shop->id)->where('category_id',$category->id)->latest()->get();
        $products = DB::table('products')
            ->where('user_id',$shop->user_id)
            ->where('added_by','seller')
            ->where('category_id',$category->id)
            ->where('published',1)
            ->where(function ($query) use ($name) {
                $query->where('name', 'LIKE', '%'. $name. '%')->orWhere('tags', 'like', '%'.$name.'%');
            })->get();

        return view('frontend.pages.vendor.category_by_product',compact('shop','products','category','shopSubcategories'));
    }
    public function search_subcategory_product(Request $request){

        $shop = Shop::find($request->shop_id);
        $category = Category::find($request->category_id);
        $subCategory = Subcategory::find($request->subcategory_id);
        $subSubCategories = ShopSubSubcategory::where('shop_id',$shop->id)->where('subcategory_id',$subCategory->id)->latest()->get();
        $name = $request->get('searchName');
        $shopSubcategories = ShopSubcategory::where('shop_id',$shop->id)->where('category_id',$category->id)->latest()->get();
        $products = DB::table('products')
            ->where('user_id',$shop->user_id)
            ->where('added_by','seller')
            ->where('category_id',$category->id)
            ->where('subcategory_id',$subCategory->id)
            ->where('published',1)
            ->where(function ($query) use ($name) {
                $query->where('name', 'LIKE', '%'. $name. '%')->orWhere('tags', 'like', '%'.$name.'%');
            })->get();

        return view('frontend.pages.vendor.subcategory_by_products',compact('shop','products','category','subCategory','shopSubcategories','subSubCategories'));
    }
    public function search_sub_subcategory_product(Request $request){

        $shop = Shop::find($request->shop_id);
        $category = Category::find($request->category_id);
        $subCategory = Subcategory::find($request->subcategory_id);
        $subsubCategory = SubSubcategory::find($request->sub_subcategory_id);
        $name = $request->get('searchName');
        $products = DB::table('products')
            ->where('user_id',$shop->user_id)
            ->where('added_by','seller')
            ->where('category_id',$category->id)
            ->where('subcategory_id',$subCategory->id)
            ->where('subsubcategory_id',$subsubCategory->id)
            ->where('published',1)
            ->where(function ($query) use ($name) {
                $query->where('name', 'LIKE', '%'. $name. '%')->orWhere('tags', 'like', '%'.$name.'%');
            })->get();

        return view('frontend.pages.vendor.subsubcategory_by_products',compact('shop','products','category','subCategory','subsubCategory'));
    }
}
