<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FlashDealCollection;
use App\Http\Resources\ProductDetailCollection;
use App\Http\Resources\ProductsListCollection;
use App\Model\Color;
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use App\Model\Product;
use App\Model\RequestedProduct;
use App\Model\Review;
use App\Model\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getFeaturedProducts($id) {
        $shop = Shop::where('id',$id)->first();
        return new ProductsListCollection(Product::where('featured', 1)->where('user_id', $shop->user_id)->where('published',1)->latest()->get());
    }
    public function getTodaysDeal($id) {
        $shop = Shop::where('id',$id)->first();
        return new ProductsListCollection(Product::where('todays_deal', 1)->where('user_id', $shop->user_id)->where('published',1)->latest()->get());
    }
    public function getBestSales($id) {
        $shop = Shop::where('id',$id)->first();
        return new ProductsListCollection(Product::where('user_id', $shop->user_id)->where('published',1)->where('num_of_sale', '>',0)->orderBy('num_of_sale', 'DESC')->latest()->get());
    }
    public function getFlashDeals() {

        //$shop = Shop::where('id',$id)->first();
        $flash_deals = FlashDeal::where('status', 1)->where('featured', 1)->where('start_date', '<=', strtotime(date('d-m-Y')))->where('end_date', '>=', strtotime(date('d-m-Y')))->first();
        //return $flash_deals->count();
        if ($flash_deals){
            $flashDeal = [
                'title' => $flash_deals->title,
                'end_date' => $flash_deals->end_date,
//                'shop_id' => [
//                    'products' => [
//                        'id'=>1,
//                        'name'=>'aaa'
//                    ]
//                ],
            ];
            //dd($flash_deals);
            $flushProductsData = FlashDealProduct::where("flash_deal_id", $flash_deals->id)->get();
            //dd($flushProductsData);
            if ($flushProductsData->count() >0){
                $flushProductsDataGB = FlashDealProduct::join('shops','flash_deal_products.user_id', 'shops.user_id')
                ->select("flash_deal_products.user_id",'shops.id')
                    ->where("flash_deal_products.flash_deal_id", $flash_deals->id)
                    ->groupBy('flash_deal_products.user_id', 'shops.id')->get();
                //dd($flushProductsDataGB);

                foreach ($flushProductsDataGB as $shopKey => $flushSaleGb){
                   $shopId =  $flushSaleGb->id;
                   $shopUserId =  $flushSaleGb->user_id;

                    $flushProductsDataProducts = FlashDealProduct::join('products','products.id', 'flash_deal_products.product_id')
                        ->select("products.*",'flash_deal_products.discount as flash_deal_discount')
                        ->where("flash_deal_products.flash_deal_id", $flash_deals->id)
                        ->where("flash_deal_products.user_id", $shopUserId)
                        ->get();
                    //dd($flushProductsDataProducts);
                    $pro_data = [];
                    if($flushProductsDataProducts->count() > 0){

                        foreach ($flushProductsDataProducts as $key => $data){
                            //$flashDeal[$shopId]['products'][$key] = [
//                            $flashDeal[$shopId]['products'][$key] = [
//                                'id'=> $data->id,
//                                'name'=> $data->name,
//                                'photos' => json_decode($data->photos),
//                                'thumbnail_image' => $data->thumbnail_img,
//                                'base_price' => (double) $data->unit_price,
//                                'base_discounted_price' => (double) home_discounted_base_price($data->id),
//                                'todays_deal' => (integer) $data->todays_deal,
//                                'featured' =>(integer) $data->featured,
//                                'unit' => $data->unit,
//                                //'discount' => (double) $data->discount,
//                                'discount' => (double) $data->flash_deal_discount,
//                                'discount_type' => $data->discount_type,
//                                'rating' => (double) $data->rating,
//                                'sales' => (integer) $data->num_of_sale,
//                            ];


                            $nested_data['id']= $data->id;
                            $nested_data['shop_id']= (integer) $shopId;
                            $nested_data['name']= $data->name;
                            $nested_data['photos'] = json_decode($data->photos);
                            $nested_data['thumbnail_image'] = $data->thumbnail_img;
                            $nested_data['base_price'] = (double) $data->unit_price;
                            $nested_data['base_discounted_price'] = (double) home_discounted_base_price($data->id);
                            $nested_data['todays_deal'] = (integer) $data->todays_deal;
                            $nested_data['featured'] =(integer) $data->featured;
                            $nested_data['unit'] = $data->unit;
                            $nested_data['discount'] = (double) $data->flash_deal_discount;
                            $nested_data['discount_type'] = DiscountType($data->id);
                            $nested_data['rating'] = (double) $data->rating;
                            $nested_data['sales'] = (integer) $data->num_of_sale;

                            array_push($pro_data, $nested_data);
                        }
                    }

                    $flashDeal[$shopId]['products'] = $pro_data;

                }

            }


            return response()->json(['success'=>true,'response'=> $flashDeal], 200);
            //return new FlashDealCollection($flash_deals);
        }else{
            return response()->json([
                'message' => 'No Flash Deals active right now',
                'response'=>[],
            ]);
        }
       /* $flashDeal = FlashDeal::where('status',1)->where('user_id',$shop->user_id)->where('user_type','seller')->where('featured',1)->first();
        if (!empty($flashDeal))
        {
            return response()->json(['success'=>true,'response'=> $flashDeal], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }*/
    }
    public function getRelatedProducts($id){
        $product = Product::find($id);
        return new ProductsListCollection(Product::where('category_id',$product->category_id)->where('user_id',$product->user_id)->where('published',1)->latest()->get());
    }
    public function search_product(Request $request) {

        $storeId =  $request->shop_id;
        $name = $request->q;
        $shop = Shop::find($storeId);
        return new ProductsListCollection(Product::where('published',1)->where('name', 'LIKE', '%'. $name. '%')->where('user_id',$shop->user_id)->orWhere('tags', 'like', '%'.$name.'%')->latest()->get());
    }
    public function allReviews($id){
        $reviews = DB::table('reviews')
            ->join('users','reviews.user_id','=','users.id')
            ->where('reviews.product_id',$id)
            ->select('users.avatar_original as user_image','users.name as user_name','reviews.*')
            ->latest()
            ->get();
        if (!empty($reviews))
        {
            return response()->json(['success'=>true,'response'=> $reviews], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }

    }
    public function productDetails($id)
    {
        return new ProductDetailCollection(Product::where('id',$id)->get());
    }
    public function variantPrice(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $str = '';
        $tax = 0;

        //if ($request->has('color')) {
        if ($request->color != null) {
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        foreach (json_decode($request->choice) as $option) {
            $str .= $str != '' ?  '-'.str_replace(' ', '', $option->name) : str_replace(' ', '', $option->name);
        }

        if($str != null && $product->variant_product){
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $stockQuantity = $product_stock->qty;
        }
        else{
            $price = $product->unit_price;
            $stockQuantity = $product->current_stock;
        }

        //discount calculation
        $flash_deals = FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $price -= ($price*$flash_deal_product->discount)/100;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $price -= $product->discount;
            }
        }

       /* if ($product->tax_type == 'percent') {
            $price += ($price*$product->tax) / 100;
        }
        elseif ($product->tax_type == 'amount') {
            $price += $product->tax;
        }*/

        return response()->json([
            'product_id' => $product->id,
            'variant' => $str,
            'price' => (double) $price,
            'in_stock' => $stockQuantity < 1 ? false : true
        ]);
    }
    public function requestedProductStore(Request $request){
        $rq_product = new RequestedProduct();
        $rq_product->user_id = Auth::id();
        $rq_product->name = $request->name;
        if($request->hasFile('images')){
            $rq_product->images = $request->images->store('uploads/products/thumbnail');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        $rq_product->description = $request->description;
        $rq_product->price = $request->price;
        $rq_product->save();
        if (!empty($rq_product))
        {
            return response()->json(['success'=>true,'response'=> $rq_product], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong'], 404);
        }
    }
}
