<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductStock;
use App\Model\Shop;
use App\Model\ShopCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductDetails($slug) {
        $productDetails = Product::where('slug',$slug)->first();
        $attributes=json_decode($productDetails->attributes);
        $options=json_decode($productDetails->choice_options);
        $colors=json_decode($productDetails->colors);
        $photos=json_decode($productDetails->photos);
        $brands = Brand::where('id',$productDetails->brand_id)->latest()->get();
        $categories = Category::where('id',$productDetails->category_id)->latest()->get();
//dd($colors);
        $variant=ProductStock::where('product_id',$productDetails->id)->first();
        if(!empty($variant)){
            $price=$variant->price;
            $avilability=$variant->qty;
        }else{
            $price=$productDetails->unit_price;
            $avilability=$productDetails->current_stock;
        }
        return view('frontend.pages.shop.product_details', compact('productDetails','attributes','options','colors','price','avilability','photos','brands','categories'));
    }

    public function ProductVariantPrice(Request  $request) {
      //dd($request->all());
      $c=count($request->variant);
      $i=1;
      $var=$request->variant;
      $v=[];
      for($i=1;$i<$c-1;$i++){
          array_push($v,$var[$i]['value']);
      }
      //dd(implode("-", $v));
      $variant=ProductStock::where('variant',implode("-", $v))->first();
      return response()->json(['success'=> true, 'response'=>$variant]);
      //dd($variant);
    }
    public function productList($slug) {
        $shop = Shop::where('slug',$slug)->first();
        $categories = ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $products = Product::where('added_by','seller')->where('user_id',$shop->id)->where('published',1)->latest()->paginate(24);
        return view('frontend.pages.shop.product_list',compact('shop','categories','products'));
    }
}
