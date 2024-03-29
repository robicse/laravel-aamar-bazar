<?php
/**
 * Created by PhpStorm.
 * User: ashiq
 * Date: 11/11/2019
 * Time: 3:08 PM
 */
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use App\Model\Product;
use App\Model\ProductStock;
use App\Model\Review;
use App\Model\Shop;



    function home_base_price($id)
    {
        $product = Product::findOrFail($id);
        return $product->unit_price;
    }

    function home_discounted_base_price($id)
    {
        $product = Product::findOrFail($id);
        $price = $product->unit_price;

        $flash_deals = FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first() != null) {
                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first();
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

        if ($inFlashDeal != true) {
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $price -= $product->discount;

            }
        }
       //dd($price);
        return $price;

    }

    function variantProductPrice($variant_id)
    {
        $variant=ProductStock::find($variant_id);
        $product = Product::findOrFail($variant->product_id);
        $price =$variant->price;
        if($product->discount_type == 'percent'){

            $price -= ($variant->price*$product->discount)/100;
        }
        elseif($product->discount_type == 'amount'){
            $price -= $product->discount;
        }
        return $price;
    }

     function getShopRatings($id){
        $shop = Shop::find($id);
        $fiveStarRev = Review::where('shop_id',$shop->id)->where('rating',5)->where('status',1)->sum('rating');
        $fourStarRev = Review::where('shop_id',$shop->id)->where('rating',4)->where('status',1)->sum('rating');
        $threeStarRev = Review::where('shop_id',$shop->id)->where('rating',3)->where('status',1)->sum('rating');
        $twoStarRev = Review::where('shop_id',$shop->id)->where('rating',2)->where('status',1)->sum('rating');
        $oneStarRev = Review::where('shop_id',$shop->id)->where('rating',1)->where('status',1)->sum('rating');
        $totalRating = Review::where('shop_id',$shop->id)->sum('rating');

        //dd($fiveStarRev);
        if ($totalRating > 0){
            $rating = (5*$fiveStarRev + 4*$fourStarRev + 3*$threeStarRev + 2*$twoStarRev + 1*$oneStarRev) / ($totalRating);
            $totalRatingCount = number_format((float)$rating, 1, '.', '');
        }else{
            $totalRatingCount =number_format((float)0, 1, '.', '');
        }
        if (!empty($totalRatingCount)){
            return $totalRatingCount;
        }else{
            return 'Something went wrong!';
        }
    }
    function FlashDealComponent($flashDealProduct){
        return view('frontend.pages.partials.flashDealComponent', compact('flashDealProduct'));
    }
    function ProductComponent($product){
        return view('frontend.pages.partials.productComponent', compact('product'));
    }
function ProductComponentTwo($product){
    return view('frontend.pages.partials.productComponentTwo', compact('product'));
}
function RelatedProductComponent($product){
    return view('frontend.pages.partials.relatedProductComponent', compact('product'));
}
function RelatedBrandProductComponent($product){
    return view('frontend.pages.partials.relatedBrandProductComponent', compact('product'));
}
function CarouselProductComponent($product){
    return view('frontend.pages.partials.carouselProductComponent', compact('product'));
}
    function ProductUnit($id){
    $product = Product::find($id);
        $productVariant = ProductStock::where('product_id',$id)->first();
    if ($product->variant_product == 1 && !empty($productVariant)){
        $unit = $productVariant->variant;

    }else{
        $unit = $product->unit;
    }
    return $unit;

    }
    function VariantPrice($id){
        $productVariant = ProductStock::where('product_id',$id)->first();
        $price = $productVariant->price;
        return $price;

    }

    function DiscountType($id){
        $product = Product::findOrFail($id);

        $flash_deals = FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first() != null) {
                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $type = 'percent';
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $type = 'amount';
                }
                $inFlashDeal = true;
                break;
            }
        }

        if ($inFlashDeal != true) {
            $type = $product->discount_type;
        }
        //dd($price);
        return $type;
    }



