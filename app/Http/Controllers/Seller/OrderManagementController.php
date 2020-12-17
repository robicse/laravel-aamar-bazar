<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
    public function pendingOrder() {
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
        dd($shop);
        $pending_order = Order::where('shop_id',$shop->id)->get();
        return view('backend.seller.order_management.pending_order',compact('pending_order'));
    }
    public function orderDetails($id) {
        $order_details = OrderDetails::where('order_id',$id)->first();
        return view('backend.seller.order_management.order_details',compact('order_details'));
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
