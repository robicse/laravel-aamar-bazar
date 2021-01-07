<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Product;
use App\Model\Review;
use Brian2694\Toastr\Facades\Toastr;
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
    public function reviewStore(Request $request)
    {
        //dd($request->all());
        $review = new Review;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::user()->id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->viewed = '0';
        if($review->save()){
            $product = Product::findOrFail($request->product_id);
            if(count(Review::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating')/count(Review::where('product_id', $product->id)->where('status', 1)->get());
            }
            else {
                $product->rating = 0;
            }
            $product->save();
            Toastr::success('Review has been submitted successfully');
            return back();
        }
        Toastr::error('Something went wrong!');
        return back();
    }
}
