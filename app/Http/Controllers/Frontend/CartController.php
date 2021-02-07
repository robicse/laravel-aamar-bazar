<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\BusinessSetting;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\OrderTempCommission;
use App\Model\Product;
use App\Model\ProductStock;
use App\Model\Seller;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewCart() {
        return view('frontend.pages.shop.shopping_cart');
    }
    public function ProductAddCart(Request  $request) {
        $var=$request->variant;
        $product=Product::find($request->product_id);
        if(Cart::count()!=0){
            foreach (Cart::content() as $item){
                if($product->user_id!=$item->options->shop_userid){
                    Cart::destroy();
                    break;
                }
            }
        }

        $shop=\App\Model\Shop::where('user_id',$product->user_id)->first();
        if($product->variant_product==null){
            //dd("no");
            $qty=$var[count($var)-1]['value'];
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $qty;
            $data['price'] = $product->unit_price;
            $data['options']['image'] = $product->thumbnail_img;
            $data['options']['shipping_cost'] = 60;
            $data['options']['variant_id'] = null;
            $data['options']['variant'] = null;
            $data['options']['shop_name'] =  $shop->name;
            $data['options']['shop_id'] =  $shop->id;
            $data['options']['shop_userid'] =  $product->user_id;
            $data['options']['cart_type'] = "product";
//            if (!empty($flashSale) && $product->flash_sale == 1 && $flDateTime >= $currDateTime){
//                $data['price'] = $product->flash_sale_price;
//            }else {
//                $data['price'] = $product->sale_price;
//            }
            Cart::add($data);
            $data['countCart'] = Cart::count();
            //dd(Cart::content());
            return response()->json(['success'=> true, 'response'=>$data]);
        }else{
            $c=count($request->variant);
            $i=1;
            $v=[];
            for($i=1;$i<$c-1;$i++){
                array_push($v,$var[$i]['value']);
            }
            $implode=implode("-", $v);
            $variant=ProductStock::where('variant',$implode)->first();
            $qty=$var[count($var)-1]['value'];
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $qty;
            $data['price'] = $variant->price;
            $data['options']['image'] = $product->thumbnail_img;
            $data['options']['shipping_cost'] = 60;
            $data['options']['variant_id'] = $variant->id;
            $data['options']['variant'] = $variant->variant;
            $data['options']['shop_name'] =  $shop->name;
            $data['options']['shop_id'] =  $shop->id;
            $data['options']['shop_userid'] =  $product->user_id;
            $data['options']['cart_type'] = "product";
//            if (!empty($flashSale) && $product->flash_sale == 1 && $flDateTime >= $currDateTime){
//                $data['price'] = $product->flash_sale_price;
//            }else {
//                $data['price'] = $product->sale_price;
//            }
            Cart::add($data);
            $data['countCart'] = Cart::count();
            $data['subtotal'] = Cart::subtotal();
//            $data['rowid'] = Cart::rowId;
            //dd(Cart::content());
            return response()->json(['success'=> true, 'response'=>$data]);
        }

    }
    public function quantityUpdate(Request $request)
    {
        //dd($request->rid);
        $cartData = Cart::get($request->rid);
        $qty = $request->quantity;
        Toastr::success('Quantity Updated');
        Cart::update($request->rid, $qty);
        return back();
    }
    public function cartRemove($rowId)
    {
        Toastr::error('This Product removed from cart ');
        Cart::remove($rowId);
        return back();
    }
    public function clearCart()
    {
        Cart::destroy();
        return back();
    }

    public function checkout() {
        if(Cart::count()==0){
            Toastr::error('Nothing fount in cart');
            return back();
        }
        $addresses = Address::where('user_id', Auth::id())->get();
//        dd($address);
        return view('frontend.pages.shop.checkout',compact('addresses'));
    }

    public function orderSubmit(Request $request) {
        //dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'pay' => 'required',
        ]);
        if($request->pay == 'cod'){
            $payment_status = 'Due';
        }
        if($request->pay == 'ssl'){
            $payment_status = 'Paid';
        }
        //dd($request->all());
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['note'] = $request->note;
        $shipping_info = json_encode($data);

        foreach (Cart::content() as $content) {
           $shop_id = $content->options->shop_id;
           break;
        }
//        dd($shop_id);
        $order = new Order();
        $order->invoice_code = date('Ymd-his');
        $order->user_id = Auth::user()->id;
        $order->shop_id = $shop_id;
        $order->shipping_address = $shipping_info;
        $order->payment_type = $request->pay;
        $order->payment_status = $payment_status;
        $order->grand_total = Cart::total();
        $order->delivery_cost = 0;
        $order->delivery_status = "Pending";
        $order->view = 0;
        $order->type = "product";
        $order->save();


        foreach (Cart::content() as $content) {
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->variation_id = $content->options->variant_id;
            $orderDetails->product_id = $content->id;
            $orderDetails->name = $content->name;
            $orderDetails->price = $content->price;
            $orderDetails->quantity = $content->qty;
            $orderDetails->save();
            $product = Product::find($content->id);
            $product->num_of_sale++;
            $product->save();
        }

        if ($request->pay == 'cod') {
            $getSellerId = Shop::find($shop_id);
            $getSellerData = Seller::find($getSellerId->seller_id);
            $grandTotal = Cart::total();
            //dd($grandTotal);
            $adminCommission = new OrderTempCommission();
            $adminCommission->order_id = $order->id;
            $adminCommission->shop_id = $shop_id;
            $adminCommission->temp_commission_to_seller = 0;
            $adminCommission->temp_commission_to_admin = $grandTotal*$getSellerData->commission / 100;
            $adminCommission->save();

            Toastr::success('Order Successfully done! ');
            Cart::destroy();
            return redirect()->route('index');
        }else {
//            Session::put('order_id',$order->id);
//            return redirect()->route('pay');
            /*Toastr::success('Order Successfully done! ');
            Cart::destroy();*/
            Toastr::warning('Online Payment Method not yet done. Please try COD');
            return redirect()->route('index');
        }
        return view('frontend.pages.shop.checkout');
    }
}
