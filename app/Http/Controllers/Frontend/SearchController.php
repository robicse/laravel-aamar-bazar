<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\FavoriteShop;
use App\Model\Product;
use App\Model\Review;
use App\Model\Shop;
use App\Model\ShopCategory;
use App\Model\ShopSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search_product(Request $request){

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
}
