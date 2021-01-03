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
        $best_sales_products=Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('num_of_sale', '>',0)->limit(8)->get();
        $todaysDeal = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('todays_deal',1)->latest()->take(8)->get();
        $shopCat=ShopCategory::where('shop_id',$shop->id)->latest()->get();

        return view('frontend.pages.vendor.vendor_store',compact('shop','products','todaysDeal','shopCat','best_sales_products'));
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
        $storeId =  $request->get('storeId');
        $name = $request->get('q');
        $shops = Shop::find($storeId);

        $product = Product::where('name', 'LIKE', '%'. $name. '%')->where('user_id',$shops->user_id)->where('added_by','seller')->limit(5)->get();

        return $product;
    }
    public function search_shop(Request $request){
        $name = $request->get('q');
        $shop = Shop::where('name', 'LIKE', '%'. $name. '%')->limit(5)->get();
        //dd($product);
        return $shop;
    }
    public function productFilter($data,$sellerId)
    {
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$sellerId)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->get();

    }
}
