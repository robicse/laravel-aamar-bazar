<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Product;
use App\Model\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
        $totalPendingOrders = Order::where('shop_id',$shop->id)->where('delivery_status','pending')->count();
        $totalCompletedOrders = Order::where('shop_id',$shop->id)->where('delivery_status','Completed')->count();
        $totalSales = Order::where('shop_id',$shop->id)->where('delivery_status','Completed')->sum('grand_total');
        $totalCancelOrders = Order::where('shop_id',$shop->id)->where('delivery_status','Cancel')->count();
        $totalOrders = Order::where('shop_id',$shop->id)->count();
        $totalProducts = Product::where('user_id',Auth::id())->count();
        return view('backend.seller.home',
            compact('totalCancelOrders','totalCompletedOrders','totalOrders',
                'totalPendingOrders','totalSales','totalProducts'));
    }
}
