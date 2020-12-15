<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        return view('backend.seller.payment_history.index');
    }
    public function money() {
        return view('backend.seller.money_withdraw.index');
    }
}
