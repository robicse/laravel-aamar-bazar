<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\OrderTempCommission;
use App\Model\Seller;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
    public function pendingOrder() {
        //$pending_order = Order::where('delivery_status','Pending')->get();
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
        //dd($shop);
        $pending_order = Order::where('shop_id',$shop->id)->where('delivery_status','pending')->latest()->get();
        return view('backend.seller.order_management.pending_order',compact('pending_order'));
    }
    public function onReviewedOrder() {
        //$onReview = Order::where('delivery_status','On review')->get();
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
        $onReview = Order::where('delivery_status','On review')->where('shop_id',$shop->id)->latest()->get();
        return view('backend.seller.order_management.on_review',compact('onReview'));
    }
    public function onDeliveredOrder() {
        $onDeliver= Order::where('delivery_status','On delivered')->latest()->get();
//        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
//        //dd($shop);
//        $pending_order = Order::where('shop_id',$shop->id)->get();
        return view('backend.seller.order_management.on_delivered',compact('onDeliver'));
    }
    public function deliveredOrder() {
        $Delivered= Order::where('delivery_status','Delivered')->latest()->get();
//        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
//        //dd($shop);
//        $pending_order = Order::where('shop_id',$shop->id)->get();
        return view('backend.seller.order_management.delivered',compact('Delivered'));
    }
    public function completedOrder() {
        //$Completed= Order::where('delivery_status','Completed')->get();
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
//        //dd($shop);
        $Completed = Order::where('delivery_status','Completed')->where('shop_id',$shop->id)->latest()->get();
        return view('backend.seller.order_management.completed',compact('Completed'));
    }
    public function canceledOrder() {
        //$Canceled= Order::where('delivery_status','Cancel')->latest()->get();
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
//        //dd($shop);
        $Canceled = Order::where('delivery_status','Cancel')->where('shop_id',$shop->id)->get();
        return view('backend.seller.order_management.cancel',compact('Canceled'));
    }
    public function orderDetails($id) {
        $orders = Order::find(decrypt($id));
        $orderDetails = OrderDetails::where('order_id',$orders->id)->get();
        return view('backend.seller.order_management.order_details',compact('orders','orderDetails'));
    }
    public function OrderProductChangeStatus(Request $request, $id)
    {
        //dd($request->delivery_status);
        $order = Order::find($id);
        $order->delivery_status = $request->delivery_status;
        $order->save();
        if ($request->delivery_status == 'Completed'){
            $tempCommission = OrderTempCommission::where('order_id',$id)->first();
//            dd($tempCommission);
            $shop = Shop::find($tempCommission->shop_id);
            $seller = Seller::where('user_id',$shop->user_id)->first();
            $seller->admin_to_pay += $tempCommission->temp_commission_to_seller;
            $seller->seller_will_pay_admin += $tempCommission->temp_commission_to_admin;
            $seller->save();
            $tempCommission->temp_commission_to_seller = 0.00;
            $tempCommission->temp_commission_to_admin = 0.00;
            $tempCommission->save();
            $order->payment_status = 'Paid';
            $order->save();
        }elseif ($request->delivery_status == 'Cancel'){
            $tempCommission = OrderTempCommission::where('order_id',$id)->first();
            $shop = Shop::find($tempCommission->shop_id);
            $seller = Seller::find($shop->seller_id);
            $seller->admin_to_pay += 0;
            $seller->seller_will_pay_admin += 0;
            $seller->save();
            $tempCommission->temp_commission_to_seller = 0;
            $tempCommission->temp_commission_to_admin = 0;
            $tempCommission->save();
        }
        Toastr::success('Delivery status successfully changed');
        return redirect()->back();
    }
    public function printInvoice($id) {
        $orders = Order::find($id);
        return view('backend.seller.order_management.invoice_print',compact('orders'));
    }
}
