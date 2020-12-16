<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
    public function pendingOrder() {
        $pending_order = Order::where('user_id',Auth::id())->get();
        return view('backend.seller.order_management.pending_order',compact('pending_order'));
    }
    public function reviewOrder() {
        $review_product = Order::where('user_id',Auth::id())->get();
        return view('backend.seller.order_management.on_review_order',compact('review_product'));
    }
    public function onDeliveryOrder() {
        $on_delivery_product = Order::where('user_id',Auth::id())->get();
        return view('backend.seller.order_management.on_delivery_order',compact('on_delivery_product'));
    }
    public function deliveredOrder() {
        $delivered_product = Order::where('user_id',Auth::id())->get();
        return view('backend.seller.order_management.delivered_order',compact('delivered_product'));
    }
    public function canceledOrder() {
        $canceled_order = Order::where('user_id',Auth::id())->get();
        return view('backend.seller.order_management.canceled_order',compact('canceled_order'));
    }
    public function orderDetails($id) {
        $order_details = OrderDetails::where('order_id',$id)->first();
        return view('backend.seller.order_management.order_details',compact('order_details'));
    }
}
