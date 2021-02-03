<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\FavoriteShop;
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use App\Model\Product;
use App\Model\Seller;
use App\Model\Shop;
use App\Model\ShopBrand;
use App\Model\ShopCategory;
use App\Model\ShopSubcategory;
use App\Model\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index() {
        return view('frontend.pages.vendor.become_vendor');
    }
    public function singleshop($slug) {
        $shop=Shop::where('slug',$slug)->first();
        $seller = Seller::where('user_id',$shop->user_id)->first();
        $products=Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('featured',1)->latest()->take(8)->get();
        $best_sales_products=Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('num_of_sale', '>',0)->limit(8)->get();
        $todaysDeal = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('todays_deal',1)->latest()->take(8)->get();
        $flashDeal = FlashDeal::where('status',1)->where('user_id',$shop->user_id)->where('user_type','seller')->where('featured',1)->first();
        if(!empty($flashDeal)){
            $flashDealProducts = FlashDealProduct::where('user_id',$shop->user_id)->where('flash_deal_id',$flashDeal->id)->latest()->take(7)->get();
        }else{
            $flashDealProducts = null;
        }
        $favoriteShop = FavoriteShop::where('user_id', Auth::id())->where('shop_id', $shop->id)->first();

        //dd($flashDealProducts);
        $shopCat=ShopCategory::where('shop_id',$shop->id)->latest()->get();
//        dd($products);

        return view('frontend.pages.vendor.vendor_store',
            compact('shop','products','todaysDeal','shopCat',
                'best_sales_products','seller','flashDeal','flashDealProducts','favoriteShop'
            )
        );
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
        $category = Category::where('slug',$slug)->first();
//        $shopCat = ShopCategory::where('shop_id',$shop->id)->first();
        $featuredProducts = Product::where('category_id',$category->id)->where('user_id',$shops->user_id)->where('published',1)->where('featured',1)->latest()->take(8)->get();
        $products = Product::where('category_id',$category->id)->where('user_id',$shops->user_id)->where('published',1)->latest()->take(8)->get();
//        dd($products);
        return view('frontend.pages.vendor.category_by_product',compact('shops','featuredProducts','products','category'));
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
        //$shops = Shop::find($sellerId);
//        dd($shops);
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$sellerId)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->where('published',1)->where('featured',1)->get();

        return $result_data;
    }
    public function FeaturedSubFilter($data,$id,$subId)
    {
        $shop = Shop::find($id);
        $subcategory = Subcategory::find($subId);
//        $shopSubcategory = ShopSubcategory::where('');
//        dd($shops);
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$shop->user_id)->where('subcategory_id',$subcategory->id)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->where('published',1)->where('featured',1)->get();

        return $result_data;
    }
    public function flashdeal($slug) {
        $flashDeal = FlashDeal::where('slug',$slug)->first();
        $shop = Shop::where('user_id',$flashDeal->user_id)->first();
        $flashDealProducts = FlashDealProduct::where('flash_deal_id',$flashDeal->id)->where('user_id',$shop->user_id)->get();
        return view('frontend.pages.shop.flash_deals_products',compact('flashDealProducts','flashDeal','shop'));

    }
    public function todaysDeal($slug) {
        $shop = Shop::where('slug',$slug)->first();
        $shopCategories = ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $shopBrands = ShopBrand::where('shop_id',$shop->id)->latest()->get();
        $products = Product::where('added_by','seller')->where('user_id',$shop->id)->where('published',1)->where('todays_deal',1)->latest()->paginate(24);
        return view('frontend.pages.shop.todays_deal_products',compact('shop','shopCategories','shopBrands','products'));
    }
    public function todaysDealSubCategory($name,$slug,$sub) {
//        dd('sffk');
        $shop = Shop::where('slug',$name)->first();
        $category= Category::where('slug',$slug)->first();
        $subcategory = Subcategory::where('slug',$sub)->first();
        $shopCat = ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $shopBrand = ShopBrand::where('shop_id',$shop->id)->latest()->get();
        $products = Product::where('category_id',$category->id)->where('subcategory_id',$subcategory->id)->where('user_id',$shop->user_id)->where('published',1)->where('todays_deal',1)->latest()->paginate(24);
//        dd($products);
        return view('frontend.pages.shop.todays_deal_by_subcategory',compact('shop','category','subcategory','shopBrand','shopCat','products'));
    }
    public function todaysDealFilter($data,$sellerId)
    {
        //$shops = Shop::find($sellerId);
//        dd($shops);
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$sellerId)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->where('published',1)->where('todays_deal',1)->get();

        return $result_data;
    }
    public function todaysDealSubFilter($data,$id,$subId)
    {
        $shop = Shop::find($id);
        $subcategory = Subcategory::find($subId);
//        $shopSubcategory = ShopSubcategory::where('');
//        dd($shops);
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$shop->user_id)->where('subcategory_id',$subcategory->id)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->where('published',1)->where('todays_deal',1)->get();

        return $result_data;
    }
    public function bestSelling($slug) {
        $shop = Shop::where('slug',$slug)->first();
        $shopCategories = ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $shopBrands = ShopBrand::where('shop_id',$shop->id)->latest()->get();
        $products = Product::where('added_by','seller')->where('user_id',$shop->id)->where('published',1)->where('num_of_sale', '>',0)->latest()->paginate(24);
        return view('frontend.pages.shop.best_selling_products',compact('shop','shopCategories','shopBrands','products'));
    }
    public function bestSellingSubCategory($name,$slug,$sub) {
//dd('hhj');
        $shop = Shop::where('slug',$name)->first();
        $category= Category::where('slug',$slug)->first();
        $subcategory = Subcategory::where('slug',$sub)->first();
        $shopCat = ShopCategory::where('shop_id',$shop->id)->latest()->get();
        $shopBrand = ShopBrand::where('shop_id',$shop->id)->latest()->get();
        $products = Product::where('category_id',$category->id)->where('subcategory_id',$subcategory->id)->where('user_id',$shop->user_id)->where('published',1)->where('num_of_sale', '>',0)->latest()->paginate(24);
        return view('frontend.pages.shop.best_selling_by_subcategory',compact('shop','category','subcategory','shopBrand','shopCat','products'));
    }
    public function bestSellingFilter($data,$sellerId)
    {
        //$shops = Shop::find($sellerId);
//        dd($shops);
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$sellerId)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->where('published',1)->where('num_of_sale', '>',0)->get();

        return $result_data;
    }
    public function bestSellingSubFilter($data,$id,$subId)
    {
        $shop = Shop::find($id);
        $subcategory = Subcategory::find($subId);
//        $shopSubcategory = ShopSubcategory::where('');
//        dd($shops);
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$shop->user_id)->where('subcategory_id',$subcategory->id)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->where('published',1)->where('num_of_sale', '>',0)->get();

        return $result_data;
    }
    public function brandFilter($data,$id,$brndId)
    {
        $shop = Shop::find($id);
        $brand = Brand::find($brndId);
//        $shopSubcategory = ShopSubcategory::where('');
//        dd($shops);
        $data2 = explode(',',$data);
        $data_min = (int) $data2[0];
        $data_max = (int) $data2[1];
        $result_data = Product::where('user_id',$shop->user_id)->where('brand_id',$brand->id)->where('unit_price', '>=', $data_min)->where('unit_price', '<=', $data_max)->where('published',1)->get();

        return $result_data;
    }
}
