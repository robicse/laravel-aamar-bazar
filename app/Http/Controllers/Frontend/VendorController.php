<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Shop;
use App\Model\ShopCategory;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index() {
        return view('frontend.pages.vendor.become_vendor');
    }
    public function singleshop($slug) {
        $shop=Shop::where('slug',$slug)->first();
        $products=Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->latest()->take(8)->get();
        $todaysDeal = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('todays_deal',1)->latest()->take(8)->get();
        $shopCat=ShopCategory::where('shop_id',$shop->id)->latest()->get();

        return view('frontend.pages.vendor.vendor_store',compact('shop','products','todaysDeal','shopCat'));
    }
//    public function shopCategories($slug) {
//        //dd($slug);
//        $shop=Shop::where('slug',$slug)->first();
//
//        $shopCat=ShopCategory::where('shop_id',$shop->id)->latest()->get();
//        //dd($shopCat->category->icon);
////        $categories = Category::all();
////       dd($categories);
//
//        return view('frontend.pages.vendor.shop_categories',compact('shop','shopCat'));
//    }
    public function vendorList() {
        $shops = Shop::all();
        return view('frontend.pages.vendor.vendor_list',compact('shops'));
    }
    public function categoryProducts($name,$slug) {
        $shops = Shop::where('slug',$name)->first();
        $categories = Category::where('slug',$slug)->first();
//        $shopCat = ShopCategory::where('shop_id',$shop->id)->first();
        $products = Product::where('category_id',$categories->id)->where('user_id',$shops->user_id)->get();
//        dd($products);
        return view('frontend.pages.vendor.category_by_product',compact('shops','products'));
    }
    public function search_product(Request $request){
        $name = $request->get('q');
        //$shops = Shop::where('id','shop_id')->first();
        //dd($shops);
        $product = Product::where('name', 'LIKE', '%'. $name. '%')->limit(5)->get();

        return $product;
    }
    public function search_shop(Request $request){
        $name = $request->get('q');
        $shop = Shop::where('name', 'LIKE', '%'. $name. '%')->limit(5)->get();
        //dd($product);
        return $shop;
    }
}
