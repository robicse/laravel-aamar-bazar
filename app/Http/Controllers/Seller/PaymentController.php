<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Product;
use App\Model\Seller;
use App\Model\SellerWithdrawRequest;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $all_payment = Payment::where('seller_id',Auth::id())->get();
        return view('backend.seller.payment_history.index',compact('all_payment'));
    }

    public function money()
    {
        $seller = Seller::where('user_id',Auth::id())->first();
        $payment = SellerWithdrawRequest::where('user_id', Auth::id())->get();
//        dd($payment);
        return view('backend.seller.money_withdraw.index',compact('seller','payment'));
    }

    public function store(Request $request)
    {
        $seller = Seller::where('user_id',Auth::id())->first();
        if($seller->admin_to_pay >= $request->amount ) {
        $new_pay = new SellerWithdrawRequest();
        $new_pay->user_id= Auth::id();
        $new_pay->amount = $request->amount;
        $new_pay->message = $request->message;
        $new_pay->status = 0;
        $new_pay->save();
        $seller->admin_to_pay -= $request->amount;
        $seller->save();
        Toastr::success("Request Inserted Successfully", "Success");
        return redirect()->back();
        } else {
            Toastr::error("You do not have enough balance to send withdraw request");
            return redirect()->back();
        }

    }
    public function paymentReport(){
        $shop = Shop::where('user_id',Auth::id())->first();
        $value = DB::table('orders')
            ->join('order_details','orders.id','=','order_details.order_id')
            ->join('products','order_details.product_id','=','product_id')
            ->where('orders.delivery_status','=','Completed')
            ->whereMonth('products.created_at', '=', 2)
            ->select('products.unit_price')
            ->get();
        dd($value);
//$product = Product::where('user_id',Auth::id())->whereMonth('created_at', '=', 1)->sum('unit_price');

        return view('backend.seller.payment_report.index');
    }
}
