<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductDetails($slug) {
        $productDetails = Product::where('slug',$slug)->first();
        return view('frontend.pages.shop.product_details', compact('productDetails'));
    }
}
