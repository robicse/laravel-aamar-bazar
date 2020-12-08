<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart() {
        return view('frontend.pages.shop.shopping_cart');
    }
    public function checkout() {
        return view('frontend.pages.shop.checkout');
    }
}
