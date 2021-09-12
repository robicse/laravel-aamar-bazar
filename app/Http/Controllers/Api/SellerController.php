<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDetailsCollection;
use App\Model\Attribute;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\OrderTempCommission;
use App\Model\Product;
use App\Model\ProductStock;
use App\Model\Seller;
use App\Model\Shop;
use App\Model\ShopBrand;
use App\Model\ShopCategory;
use App\Model\ShopSubcategory;
use App\Model\ShopSubSubcategory;
use App\Model\Subcategory;
use App\Model\SubSubcategory;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public  function getSellers()
    {
        $sellers= Seller::all();
        if (!empty($sellers))
        {
            return response()->json(['success'=>true,'response'=> $sellers], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function dashboard(){
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
        $totalPendingOrders = Order::where('shop_id',$shop->id)->where('delivery_status','pending')->count();
        $totalCompletedOrders = Order::where('shop_id',$shop->id)->where('delivery_status','Completed')->count();
        $totalSales = Order::where('shop_id',$shop->id)->where('delivery_status','Completed')->sum('grand_total');
        $totalCancelOrders = Order::where('shop_id',$shop->id)->where('delivery_status','Cancel')->count();
        $totalOrders = Order::where('shop_id',$shop->id)->count();
        $totalProducts = Product::where('user_id',Auth::id())->count();
        $adminCommission = Seller::where('user_id',Auth::id())->pluck('seller_will_pay_admin')->first();
        $totalEarning = Order::where('shop_id',$shop->id)->where('payment_status','paid')->where('delivery_status','Completed')->sum('grand_total');
        $data = [
            'Total Products'=>$totalProducts,
            'Total Sales'=>$totalSales,
            'Total Earning'=>$totalEarning,
            'Total Successful Order'=>$totalCompletedOrders,
            'Admin get Commission'=>$adminCommission,
            'Total Orders'=>$totalOrders,
            'Total Pending Orders'=>$totalPendingOrders,
            'Total Cancel Orders'=>$totalCancelOrders,
            ];
        if (!empty($data))
        {
            return response()->json(['success'=>true,'response'=> $data], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function profile(){
        $userInfo = User::where('id',Auth::id())->first();
        $sellerInfo = Seller::where('user_id',Auth::id())->first();
        $shop = Shop::where('user_id',Auth::id())->first();
        $data = [
            'Seller Name'=>$userInfo->name,
            'Seller Phone'=>$userInfo->phone,
            'Seller Email'=>$userInfo->email,
            'Shop Name'=>$shop->name,
            'Shop Address'=>$shop->address,
            'Bank Name'=>$sellerInfo->bank_name,
            'Bank Account Name'=>$sellerInfo->bank_acc_name,
            'Bank Account Number'=>$sellerInfo->bank_acc_no,
            'Bank Account Routing Number'=>$sellerInfo->bank_routing_no,
            'Bank cash_on_delivery_status'=>$sellerInfo->cash_on_delivery_status,
            'Bank bank_payment_status'=>$sellerInfo->bank_payment_status,
            'NID Number'=>$sellerInfo->nid_number,
            'Trade Licence Images'=>$sellerInfo->trade_licence_images,
            'avatar_original'=>$userInfo->avatar_original,
            'Shop Logo'=>$shop->logo,
            ];
        if (!empty($data))
        {
            return response()->json(['success'=>true,'response'=> $data], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function profileUpdate(Request $request){
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('avatar_original')){
            $user->avatar_original = $request->avatar_original->store('uploads/profile');
        }
//        if($request->hasFile('avatar_original')){
//            $imageName = time().'.'.$request->avatar_original->getClientOriginalExtension();
//            $request->avatar_original->move(public_path('uploads/profile'), $imageName);
//            //$user->avatar_original = $request->avatar_original->store('uploads/profile');
//            $user->avatar_original = $imageName;
//        }
        $user->save();

        if (!empty($user))
        {
            return response()->json(['success'=>true,'response'=> $user], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function passwordUpdate(Request $request){
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json(['success'=>true,'response'=> 'Password Updated Successfully!!'], 200);
            } else {
                return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
            }
        } else {
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function bankDetailsUpdate(Request $request){
        $bankInfo = Seller::where('user_id',Auth::id())->first();
        $bankInfo->bank_name = $request->bank_name;
        $bankInfo->bank_acc_name = $request->bank_acc_name;
        $bankInfo->bank_acc_no = $request->bank_acc_no;
        $bankInfo->bank_routing_no = $request->bank_routing_no;
        $bankInfo->cash_on_delivery_status = $request->cash_on_delivery_status;
        $bankInfo->bank_payment_status = $request->bank_payment_status;
        $bankInfo->save();
        if (!empty($bankInfo))
        {
            return response()->json(['success'=>true,'response'=> $bankInfo], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function nidInfoUpdate(Request $request){


        $sellerInfo = Seller::where('user_id',Auth::User()->id)->first();
        $sellerInfo->nid_number = $request->nid_number;
        //return $sellerInfo->trade_licence_images;

       $photos = array();
       if($sellerInfo->trade_licence_images == null){
           $photos  = array();
       }else{
          $prevPhotos = json_decode($sellerInfo->trade_licence_images);
          foreach ($prevPhotos as $prevPhoto){
              array_push($photos, $prevPhoto);
          }

       }
        if($request->hasFile('trade_licence_images')){
            $path = $request->trade_licence_images->store('uploads/seller_info');
            array_push($photos, $path);
        }
//        if($request->hasFile('trade_licence_images')){
//            foreach ($request->trade_licence_images as $photo) {
//                $path = $photo->store('uploads/seller_info');
//                array_push($photos, $path);
//                //ImageOptimizer::optimize(base_path('public/').$path);
//            }
//        }
        $sellerInfo->trade_licence_images = json_encode($photos);
        $sellerInfo->save();
        if (!empty($sellerInfo))
        {
            return response()->json(['success'=>true,'response'=> $sellerInfo], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function shopInfo(){
        $shop = Shop::where('user_id',Auth::id())->first();
        if (!empty($shop))
        {
            return response()->json(['success'=>true,'response'=> $shop], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function shopInfoUpdate(Request $request){
        $shop = Shop::where('user_id',Auth::id())->first();
        $shop->about = $request->about;
        $shop->facebook = $request->facebook;
        $shop->google = $request->google;
        $shop->twitter = $request->twitter;
        $shop->youtube = $request->youtube;
        $shop->meta_title = $request->meta_title;
        $shop->meta_description = $request->meta_description;
//        $sliders = array();

        if ($request->hasFile('logo')) {
            $shop->logo = $request->logo->store('uploads/shop/logo');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        $shop->save();

        if (!empty($shop))
        {
            return response()->json(['success'=>true,'response'=> $shop], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function allProducts(){
        $products = Product::where('added_by','seller')->where('user_id',Auth::id())->get();
        if (!empty($products))
        {
            return response()->json(['success'=>true,'response'=> $products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function updateTodaysDeal(Request $request){
        $product = Product::find($request->product_id);
        $product->todays_deal = $request->status;
        $product->save();
        if (!empty($product))
        {
            return response()->json(['success'=>true,'response'=> $product], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }

    }
    public function updatePublished(Request $request)
    {
        //return 'ok';
        $product = Product::find($request->product_id);
        $product->published = $request->status;
        $product->save();
        if (!empty($product))
        {
            return response()->json(['success'=>true,'response'=> $product], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function updateFeatured(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->featured = $request->status;
        $product->save();
        if (!empty($product))
        {
            return response()->json(['success'=>true,'response'=> $product], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function allOrders() {
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
        $orders = Order::where('shop_id',$shop->id)->get();
        if (!empty($orders))
        {
            return response()->json(['success'=>true,'response'=> $orders], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function deliveryStatusUpdate(Request $request){
        $order = Order::find($request->order_id);
        $order->delivery_status = $request->delivery_status;
        $order->save();
        if ($request->delivery_status == 'Completed'){
            $tempCommission = OrderTempCommission::where('order_id',$request->order_id)->first();
            $shop = Shop::find($tempCommission->shop_id);
            $seller = Seller::find($shop->seller_id);
            $seller->admin_to_pay += $tempCommission->temp_commission_to_seller;
            $seller->seller_will_pay_admin += $tempCommission->temp_commission_to_admin;
            $seller->save();
            $tempCommission->temp_commission_to_seller = 0;
            $tempCommission->temp_commission_to_admin = 0;
            $tempCommission->save();
        }elseif ($request->delivery_status == 'Cancel'){
            $tempCommission = OrderTempCommission::where('order_id',$request->order_id)->first();
            $shop = Shop::find($tempCommission->shop_id);
            $seller = Seller::find($shop->seller_id);
            $seller->admin_to_pay += 0;
            $seller->seller_will_pay_admin += 0;
            $seller->save();
            $tempCommission->temp_commission_to_seller = 0;
            $tempCommission->temp_commission_to_admin = 0;
            $tempCommission->save();
        }
        if (!empty($order))
        {
            return response()->json(['success'=>true,'response'=> $order], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function verificationStatus(){
        $seller = Seller::where('user_id',Auth::id())->first();
        $shop = Shop::where('user_id',Auth::id())->first();
        $success['shop_id'] = $shop->id;
        $success['verification_status'] = $seller->verification_status;
        if (!empty($seller))
        {
            return response()->json(['success'=>true,'response'=> $success], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }

    public function getOrders() {
        $shop = Shop::where('user_id',Auth::id())->first();
        $orders=Order::where('shop_id',$shop->id)->latest('created_at')->get();
        if (!empty($orders))
        {
            return response()->json(['success'=>true,'response'=> $orders], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Order is empty'], 404);
        }
    }
    public function getOrderDetails($id){
        return new OrderDetailsCollection(OrderDetails::where('order_id', $id)->latest()->get());
    }
    public function productAddToMyShop($sellerId)
    {
        $sellerP = Product::where('added_by','seller')->where('user_id',$sellerId)->select('aPId_to_seller')->get();
        $products = Product::where('added_by','admin')->latest()->select('id','name','unit_price','thumbnail_img')->latest()->get();
        $arr = array();
        $check2 = array();
        foreach ($products as $product){
            $data = $sellerP->contains('aPId_to_seller', $product->id);
            if (!$data){
                $check2['id'] = $product->id;
                $check2['image'] = $product->thumbnail_img;
                $check2['name'] = $product->name;
                $check2['unit_price'] = $product->unit_price;
                array_push($arr, $check2);
            }
        }
        $Response = array('data' => $arr );
        return response()->json($Response);
    }
    public function productAddToMyShopStore(Request $request)
    {
        //dd($request->all());
        foreach ($request->product_id as $data){
            $product = Product::find($data);
            $product_new = $product->replicate();
            $product_new->added_by = 'seller';
            $product_new->user_id = $request->user_id;
            $product_new->aPId_to_seller = $product->id;
            $product_new->slug = substr($product_new->slug, 0, -5).Str::random(5);
            $product_new->save();
            if($product->variant_product == 1){
                $stockProducts = ProductStock::where('product_id', $product->id)->get();
                foreach ($stockProducts as $stockProduct){
                    $new_stockProduct = $stockProduct->replicate();
                    $new_stockProduct->product_id = $product_new->id;
                    $new_stockProduct->save();
                }
            }

            //check shop categories
            $shopId = Shop::where('user_id',$request->user_id)->first();
            $checkShopCategory = ShopCategory::where('shop_id',$shopId->id)->where('category_id',$product_new->category_id)->first();
            if(empty($checkShopCategory)){
                $shopCategoryData = new ShopCategory();
                $shopCategoryData->shop_id = $shopId->id;
                $shopCategoryData->category_id = $product_new->category_id;
                $shopCategoryData->save();
            }
            $shopSubcategory = ShopSubcategory::where('shop_id',$shopId->id)->where('subcategory_id',$product_new->subcategory_id)->where('category_id',$product_new->subcategory_id)->first();
//            $shopCategory = ShopCategory::where('shop_id',$shopId->id)->where('category_id',$product_new->category_id)->first();
            if (empty($shopSubcategory)) {
                $shopSubcategoryData = new ShopSubcategory();
                $shopSubcategoryData->shop_id = $shopId->id;
                $shopSubcategoryData->subcategory_id = $product_new->subcategory_id;
                $shopSubcategoryData->category_id = $product_new->category_id;
                $shopSubcategoryData->save();
            }

            //check shop sub sub_categories
            $checkShopSubSubCategory = ShopSubSubcategory::where('shop_id',$shopId->id)->where('subsubcategory_id',$product_new->subsubcategory_id)->where('subcategory_id',$product_new->subcategory_id)->where('category_id',$product_new->subcategory_id)->first();
            if (empty($checkShopSubSubCategory)) {
                $shopSub_SubcategoryData = new ShopSubSubcategory();
                $shopSub_SubcategoryData->shop_id = $shopId->id;
                $shopSub_SubcategoryData->subsubcategory_id = $product_new->subsubcategory_id;
                $shopSub_SubcategoryData->subcategory_id = $product_new->subcategory_id;
                $shopSub_SubcategoryData->category_id = $product_new->category_id;
                $shopSub_SubcategoryData->save();
            }

            $shopBrand = ShopBrand::where('shop_id',$shopId->id)->where('brand_id',$product_new->brand_id)->first();
            if(empty($shopBrand)){
                $shopBrandData = new ShopBrand();
                $shopBrandData->shop_id = $shopId->id;
                $shopBrandData->brand_id = $product_new->brand_id;
                $shopBrandData->save();
            }
        }
        return response()->json("Product successfully added to my shop!");
    }

}
