<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Attribute;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Order;
use App\Model\Product;
use App\Model\Seller;
use App\Model\Shop;
use App\Model\Subcategory;
use App\Model\SubSubcategory;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
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
            'NID Number'=>$sellerInfo->nid_number,
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
        $user->save();

        $shop = Shop::where('user_id',Auth::id())->first();
        $shop->name = $request->shop_name;
        $shop->save();
        $data = DB::table('users')
            ->join('shops','users.id','=','shops.user_id')
            ->where('users.id',Auth::id())
            ->select('users.*','shops.name as shop_name')
            ->get();
//        $data = ['Shop Name:', $shop->name];
        if (!empty($data))
        {
            return response()->json(['success'=>true,'response'=> $data], 200);
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
        if($request->has('previous_photos')){
            $photos = $request->previous_photos;
        }
        else{
            $photos = array();
        }
        if($request->hasFile('trade_licence_images')){
            foreach ($request->trade_licence_images as $key => $photo) {
                $path = $photo->store('uploads/seller_info');
                array_push($photos, $path);
                //ImageOptimizer::optimize(base_path('public/').$path);
            }
        }
        $sellerInfo->trade_licence_images = json_encode($photos);
        $sellerInfo->save();
        if (!empty($sellerInfo->nid_number))
        {
            return response()->json(['success'=>true,'response'=> $sellerInfo->nid_number], 200);
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
        $shop->name = $request->name;
        $shop->slug = Str::slug($request->name) . '-' . Auth::id();
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
}
