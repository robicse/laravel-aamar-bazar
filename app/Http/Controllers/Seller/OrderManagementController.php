<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function pendingOrder() {
        return view('backend.seller.order_management.pending_order');
    }
    public function reviewOrder() {
        return view('backend.seller.order_management.on_review_order');
    }
    public function onDeliveryOrder() {
        return view('backend.seller.order_management.on_delivery_order');
    }
    public function deliveredOrder() {
        return view('backend.seller.order_management.delivered_order');
    }
    public function canceledOrder() {
        return view('backend.seller.order_management.canceled_order');
    }
}
