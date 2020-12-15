<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Seller;
use App\Model\SellerWithdrawRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $all_payment = Payment::where('seller_id',Auth::id())->get();
        return view('backend.seller.payment_history.index',compact('all_payment'));
    }

    public function money()
    {
        $payment = SellerWithdrawRequest::where('user_id', Auth::id())->first();
        return view('backend.seller.money_withdraw.index',compact('payment'));
    }

    public function store(Request $request)
    {
            $new_pay = new SellerWithdrawRequest();
            $new_pay->amount = $request->amount;
            $new_pay->message = $request->message;
            $new_pay->status = 1;
            $new_pay->save();
            Toastr::success("Request Inserted Successfully", "Success");
            return redirect()->back();

    }
}
