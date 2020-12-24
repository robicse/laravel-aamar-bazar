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
        //dd($slug);
        $shop=Shop::where('slug',$slug)->first();

        $products=Product::where('added_by','seller')->where('user_id',$shop->user_id)->get();

        return view('frontend.pages.vendor.vendor_store',compact('shop','products'));
    }
    public function shopCategories($slug) {
        //dd($slug);
        $shop=Shop::where('slug',$slug)->first();

        $shopCat=ShopCategory::where('shop_id',$shop->id)->latest()->get();
        //dd($shopCat->category->icon);
        $categories = Category::all();
//       dd($categories);

        return view('frontend.pages.vendor.vendor_categories',compact('shop','shopCat','categories'));
    }
    public function vendorList() {
        $shops = Shop::all();
        return view('frontend.pages.vendor.vendor_list',compact('shops'));
    }
}
