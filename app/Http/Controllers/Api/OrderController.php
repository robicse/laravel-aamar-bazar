<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\OrderTempCommission;
use App\Model\Product;
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
        $orders=Order::where('user_id',Auth::id())->latest('created_at')->get();
//        return response()->json(['success'=>true,'response' =>$order], 200);
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
//        $order_details=OrderDetails::where('order_id',$id)->get();
        $order_details = DB::table('order_details')
            ->join('orders','order_details.order_id','=','orders.id')
            ->join('shops','orders.shop_id','=','shops.id')
            ->join('products','order_details.product_id','=','products.id')
            ->where('orders.id','=',$id)
            ->select('products.thumbnail_img as product_image','order_details.*','orders.grand_total as Subtotal','orders.delivery_cost as delivery_cost','shops.logo')
            ->get();
        if (!empty($order_details))
        {
            return response()->json(['success'=>true,'response'=> $order_details], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Order is empty'], 404);
        }
    }


    public function orderSubmit(Request $request){
        if($request->pay == 'cod'){
            $payment_status = 'Due';
        }
        if($request->pay == 'ssl'){
            $payment_status = 'Paid';
        }
        $address = Address::where('user_id',Auth::id())->where('set_default',1)->first();
        //dd($request->all());
        $data['name'] = Auth::User()->name;
        $data['email'] = Auth::User()->email;
        $data['address'] = $address->address;
        $data['country'] = $address->country;
        $data['city'] = $address->city;
        $data['postal_code'] = $address->postal_code;
        $data['phone'] = $address->phone;
        $shipping_info = json_encode($data);

//        foreach (Cart::content() as $content) {
//            $shop_id = $content->options->shop_id;
//            break;
//        }
//        dd($shop_id);
        $shop_id = $request->shop_id;
        $order = new Order();
        $order->invoice_code = date('Ymd-his');
        $order->user_id = Auth::user()->id;
        $order->shop_id = $shop_id;
        $order->shipping_address = $shipping_info;
        $order->payment_type = $request->pay;
        $order->payment_status = $payment_status;
        $order->grand_total = $request->subtotal;
        $order->delivery_cost = 0;
        $order->delivery_status = "Pending";
        $order->view = 0;
        $order->type = "product";
        $order->save();
//        return $order;

        $orderProducts = json_decode($request->cart,true);
        foreach ($orderProducts as $content) {
//            return $content["product_id"];
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id;
//            $orderDetails->variation_id = $content->options->variant_id;
            $orderDetails->product_id = $content["product_id"];
            $orderDetails->name = $content["name"];
            $orderDetails->price = $content["price"];
            $orderDetails->quantity = $content["qty"];
            $orderDetails->save();
            $product = Product::find($content["product_id"]);
            $product->num_of_sale++;
            $product->save();
        }

        if ($request->pay == 'cod') {
//            $getSellerId = Shop::find($shop_id);
//            $getSellerData = Seller::find($getSellerId->seller_id);
//            $grandTotal = Cart::total();
//            //dd($grandTotal);
//            $adminCommission = new OrderTempCommission();
//            $adminCommission->order_id = $order->id;
//            $adminCommission->shop_id = $shop_id;
//            $adminCommission->temp_commission_to_seller = 0;
//            $adminCommission->temp_commission_to_admin = $grandTotal*$getSellerData->commission / 100;
//            $adminCommission->save();

            return response()->json(['success'=>true,'response'=> $order], 200);
        }else {
//            Session::put('order_id',$order->id);
//            return redirect()->route('pay');
            /*Toastr::success('Order Successfully done! ');
            Cart::destroy();*/
//            Toastr::warning('Online Payment Method not yet done. Please try COD');
//            return redirect()->route('index');
            return response()->json(['success'=>true,'response'=> 'Online Payment Method not yet done. Please try COD'], 404);
        }
    }
}
