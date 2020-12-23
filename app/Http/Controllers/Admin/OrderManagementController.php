<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function pendingOrder() {
        $pending_order = Order::where('delivery_status','Pending')->get();
        return view('backend.admin.order_management.pending_order',compact('pending_order'));
    }
    public function onReviewedOrder() {
        $onReview = Order::where('delivery_status','On review')->get();
        return view('backend.admin.order_management.on_review',compact('onReview'));
    }
    public function onDeliveredOrder() {
        $onDeliver= Order::where('delivery_status','On delivered')->get();
        return view('backend.admin.order_management.on_delivered',compact('onDeliver'));
    }
    public function deliveredOrder() {
        $Delivered= Order::where('delivery_status','Delivered')->get();
        return view('backend.admin.order_management.delivered',compact('Delivered'));
    }
    public function completedOrder() {
        $Completed= Order::where('delivery_status','Completed')->get();
        return view('backend.admin.order_management.completed',compact('Completed'));
    }
    public function canceledOrder() {
        $Canceled= Order::where('delivery_status','Cancel')->get();
        return view('backend.admin.order_management.canceled',compact('Canceled'));
    }
    public function orderDetails($id) {
        $order_details = Order::find($id);
        return view('backend.admin.order_management.order_details',compact('order_details'));
    }
    public function OrderProductChangeStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->delivery_status = $request->delivery_status;
        $order->save();
        Toastr::success('Delivery status successfully changed');
        return redirect()->back();
    }
}
