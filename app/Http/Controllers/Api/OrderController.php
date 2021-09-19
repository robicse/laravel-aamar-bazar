<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDetailsCollection;
use App\Model\Address;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\OrderTempCommission;
use App\Model\Product;
use App\Model\Review;
use App\Model\Seller;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order_get()
    {
        $orders = DB::table('orders')
            ->join('shops','orders.shop_id','=','shops.id')
            ->where('orders.user_id','=', Auth::id())
            ->select('shops.name as shop_name','shops.logo as shop_logo','orders.*')
            ->latest('orders.created_at')
            ->get();

        if (!empty($orders))
        {
            return response()->json(['success'=>true,'response'=> $orders], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Order is empty'], 404);
        }
    }
    public function order_details_get($id)
    {
        return new OrderDetailsCollection(OrderDetails::where('order_id', $id)->latest()->get());
    }


    public function orderSubmit(Request $request){
        if($request->pay == 'cod'){
            $payment_status = 'Due';
        }
        if($request->pay == 'ssl'){
            $payment_status = 'Paid';
        }
        $address = Address::where('user_id',Auth::id())->where('set_default',1)->first();
        $data['name'] = $request->name;
        $data['phone'] = $address->phone;
        $data['email'] = Auth::User()->email;
        $data['area'] = $address->Area->name;
        $data['city'] = $address->district->name;
        $data['address'] = $address->address;
        $data['country'] = $address->country;

        $shipping_info = json_encode($data);

        $shop_id = $request->shop_id;
        $order = new Order();
        $order->invoice_code = date('Ymd-his');
        $order->user_id = Auth::user()->id;
        $order->shop_id = $shop_id;
        $order->area = $address->Area->name;
        $order->shipping_address = $shipping_info;
        $order->payment_type = $request->pay;
        $order->payment_status = $payment_status;
        $order->grand_total = $request->subtotal;
        $order->delivery_cost = 0;
        $order->delivery_status = "Pending";
        $order->view = 0;
        $order->type = "product";
        $order->save();

        $orderProducts = json_decode($request->cart,true);
        foreach ($orderProducts as $content) {
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $content["product_id"];
            $orderDetails->name = $content["name"];
            $orderDetails->price = $content["price"];
            $orderDetails->quantity = $content["qty"];
            $orderDetails->variant = $content["variant"];
            $orderDetails->save();
            $product = Product::find($content["product_id"]);
            $product->num_of_sale++;
            $product->save();
        }

        if ($request->pay == 'cod') {
            $getSellerId = Shop::find($shop_id);
            $getSellerData = Seller::where('user_id',$getSellerId->user_id)->first();
            $grandTotal = $order->grand_total;
            $adminCommission = new OrderTempCommission();
            $adminCommission->order_id = $order->id;
            $adminCommission->shop_id = $shop_id;
            $adminCommission->temp_commission_to_seller = 0;
            $adminCommission->temp_commission_to_admin = $grandTotal*$getSellerData->commission / 100;
            $adminCommission->save();
            return response()->json(['success'=>true,'response'=> $order], 200);
        }else {
            return response()->json(['success'=>true,'response'=> 'Online Payment Method not yet done. Please try COD'], 404);
        }
    }
    public function reviewStore(Request $request)
    {
        $order = Order::find($request->order_id);
        $product = Product::find($request->product_id);
        $shop = Shop::where('user_id', $product->user_id)->first();
        if ($order->delivery_status == 'Completed') {
            $check = Review::where('user_id',Auth::id())->where('order_id',$request->order_id)->where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
            if (empty($check)){
                $review = new Review;
                $review->order_id = $request->order_id;
                $review->product_id = $request->product_id;
                $review->user_id = Auth::id();
                $review->rating = $request->rating;
                $review->comment = $request->comment;
                $review->shop_id = $shop->id;
                $review->viewed = '0';
                if($review->save()){
                    if(count(Review::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                        $product->rating = Review::where('product_id', $product->id)
                                ->where('status', 1)->sum('rating')/count(Review::where('product_id', $product->id)->where('status', 1)->get());
                    }
                    else {
                        $product->rating = 0;
                    }
                    $product->save();
                    $success['response'] = 'Review has been submitted successfully';
                    $success['review'] = $review;
                    return response()->json(['success'=>true,'response'=> $success], 200);
                }
            }else{
                return response()->json(['success'=>false,'response'=> 'Review has already been submitted'], 404);
            }

        }else{
            return response()->json(['success'=>false,'response'=> 'Order does not Completed yet.'], 404);
        }
        return response()->json(['success'=>false,'response'=> 'Something went wrong'], 404);
    }
    public function getReview(){
        $reviews = DB::table('reviews')
            ->join('products','reviews.product_id','=','products.id')
            ->join('shops','reviews.shop_id','=','shops.id')
            ->where('reviews.user_id','=',Auth::id())
            ->select('shops.name as shop_name','products.name as product_name','reviews.*')
            ->first();
        if (!empty($reviews))
        {
            return response()->json(['success'=>true,'response'=> $reviews], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Review is empty'], 404);
        }
    }
}
