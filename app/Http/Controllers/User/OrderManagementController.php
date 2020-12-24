<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
    public function orderHistory()
    {
        $orders = Order::where('user_id',Auth::id())->latest()->get();
        return view('frontend.user.order_history',compact('orders'));
    }
    
    public function printInvoice($id) {
        $orders = Order::find($id);
        return view('frontend.user.invoice_print',compact('orders'));
    }
}
