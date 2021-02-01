<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductStock;
use App\Model\Review;
use App\Model\Shop;
use App\Model\ShopBrand;
use App\Model\ShopCategory;
use App\Model\ShopSubcategory;
use App\Model\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductDetails($slug) {
        $productDetails = Product::where('slug',$slug)->first();
        $attributes=json_decode($productDetails->attributes);
        $options=json_decode($productDetails->choice_options);
        $colors=json_decode($productDetails->colors);
        $photos=json_decode($productDetails->photos);
        $relatedBrands = Product::where('brand_id', $productDetails->brand_id)->latest()->take(3)->where('published',1)->get();
        $categories = Product::where('category_id',$productDetails->category_id)->take(3)->where('published',1)->latest()->get();
        $reviews = Review::where('product_id',$productDetails->id)->where('status',1)->get();
        $reviewsComments = Review::where('product_id',$productDetails->id)->where('status',1)->latest()->paginate(5);
        $fiveStarRev = Review::where('product_id',$productDetails->id)->where('rating',5)->where('status',1)->get();
        $fourStarRev = Review::where('product_id',$productDetails->id)->where('rating',4)->where('status',1)->get();
        $threeStarRev = Review::where('product_id',$productDetails->id)->where('rating',3)->where('status',1)->get();
        $twoStarRev = Review::where('product_id',$productDetails->id)->where('rating',2)->where('status',1)->get();
        $oneStarRev = Review::where('product_id',$productDetails->id)->where('rating',1)->where('status',1)->get();
//dd($colors);
        $variant=ProductStock::where('product_id',$productDetails->id)->first();
        if(!empty($variant)){
            $price=$variant->price;
            $avilability=$variant->qty;
        }else{
            $price=$productDetails->unit_price;
            $avilability=$productDetails->current_stock;
        }
        return view('frontend.pages.shop.product_details',
            compact('productDetails','attributes','options','colors','price',
                'avilability','photos','relatedBrands','categories','reviews','fiveStarRev','fourStarRev',
            'threeStarRev','twoStarRev','oneStarRev','reviewsComments')
        );
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
        $shopBrands = ShopBrand::where('shop_id',$shop->id)->latest()->get();

        $products = Product::where('added_by','seller')->where('user_id',$shop->id)->where('published',1)->where('featured',1)->latest()->paginate(24);
//        $products = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->latest()->paginate(24);
        return view('frontend.pages.shop.product_list',compact('shop','categories','shopBrands','products'));
    }
    public function productSubCategory($name,$slug,$sub) {
//        dd('sffk');
        $shop = Shop::where('slug',$name)->first();
        $category= Category::where('slug',$slug)->first();
        $subcategory = Subcategory::where('slug',$sub)->first();
        $shopCat = ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $shopBrand = ShopBrand::where('shop_id',$shop->id)->latest()->get();
        $products = Product::where('category_id',$category->id)->where('subcategory_id',$subcategory->id)->where('user_id',$shop->user_id)->where('published',1)->where('featured',1)->latest()->paginate(24);
//        dd($products);
        return view('frontend.pages.shop.products_by_subcategory',compact('shop','category','subcategory','shopBrand','shopCat','products'));
    }
    public function productByBrand($name,$slug) {
        $shop = Shop::where('slug',$name)->first();
        $brand = Brand::where('slug',$slug)->first();
        $shopCat = ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $shopBrand = ShopBrand::where('shop_id',$shop->id)->latest()->get();
        $products = Product::where('brand_id',$brand->id)->where('user_id',$shop->user_id)->where('published',1)->latest()->paginate(24);
//        dd($products);
        return view('frontend.pages.shop.products_by_brands',compact('shop','brand','shopCat','shopBrand','products'));
    }
}
