<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use App\Model\Order;
use App\Model\Payment;
use App\Model\Seller;
use App\Model\Product;
use App\Model\SellerWithdrawRequest;
use App\Model\Shop;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
   public function index()
   {
       $sellerUserInfos = User::where('user_type','seller')->get();
       return view('backend.admin.seller.index', compact('sellerUserInfos'));
   }

   public function verification(Request $request)
   {
       //return $request->id;
       $seller = Seller::find($request->id);
       $seller->verification_status = $request->status;
       if($seller->save()){
           return 1;
       }
       return 0;
   }
   public function commissionForm()
   {
       $commission = BusinessSetting::where('type','seller_commission')->first();

       return view('backend.admin.seller.commission',compact('commission'));
   }

   public function commissionStore(Request $request, $id)
   {
        $this->validate($request,[
            'value' => 'required',
        ]);
        $data = BusinessSetting::find($id);
        $data->value = $request->value;
        $data->save();
        Toastr::success($request->value.' % Seller Commission successfully added for all sellers');
        return redirect()->back();
   }
   public function paymentHistory()
   {
       $paymentHistories = Payment::latest()->get();
    return view('backend.admin.seller.payment_history',compact('paymentHistories'));
   }
   public function withdrawRequest()
   {
       $withdrawRequests = SellerWithdrawRequest::latest()->get();
       return view('backend.admin.seller.withdraw_request', compact('withdrawRequests'));
   }

   public function profileShow($id)
   {
       $userInfo = User::find($id);
       $sellerInfo = Seller::where('user_id',$id)->first();
       $shopInfo = Shop::where('user_id',$id)->first();
       return view('backend.admin.seller.profile', compact('userInfo','sellerInfo','shopInfo'));
   }
   public function updateProfile(Request $request, $id)
   {
       $this->validate($request, [
           'name' =>  'required',
           'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone,'.$id,
           'email' =>  'required|email|unique:users,email,'.$id,
       ]);

       $user =  User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->save();
       Toastr::success('Seller Profile Updated Successfully','Success');
       return redirect()->back();
   }
    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' =>  'required|confirmed|min:6',
        ]);

        $user =  User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('Seller Password Updated Successfully','Success');
        return redirect()->back();
    }
    public function bankInfoUpdate(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'bank_name' =>  'required',
            'bank_acc_name' =>  'required',
            'bank_acc_no' =>  'required',
            'bank_routing_no' =>  'required',
        ]);

        $serller =   Seller::find($id);
        $serller->bank_name =  $request->bank_name;
        $serller->bank_acc_name =  $request->bank_acc_name;
        $serller->bank_acc_no =  $request->bank_acc_no;
        $serller->bank_routing_no =  $request->bank_routing_no;
        $serller->save();
        Toastr::success('Seller Bank Info Updated Successfully','Success');
        return redirect()->back();
    }
    public function commission_modal(Request $request)
    {
        $seller = Seller::find($request->id);
        return view('backend.admin.seller.individual_seller_commission', compact('seller'));
    }
    public function individulCommissionSet(Request $request, $id)
    {
        $this->validate($request,[
            'commission' => 'required',
        ]);
        $data = Seller::find($id);
        $data->commission = $request->commission;
        $data->save();
        Toastr::success($request->commission.' % Seller Commission successfully added for all sellers');
        return redirect()->back();
    }
    public function payment_modal(Request $request)
    {
        $seller = Seller::find($request->id);
        return view('backend.admin.seller.payment_modal', compact('seller'));
    }
    public function withdraw_payment_modal(Request $request)
    {
        //$seller = Seller::find($request->id);
        $withdrawData = SellerWithdrawRequest::find($request->id);
        $seller = Seller::where('user_id',$withdrawData->user_id)->first();
        //return $seller;
        return view('backend.admin.seller.withdraw_payment_modal', compact('seller','withdrawData'));
    }
    public function pay_to_seller_commission(Request $request)
    {
        $data['seller_id'] = $request->seller_id;
        $data['amount'] = $request->amount;
        $data['type'] = $request->type;
        $data['payment_method'] = $request->payment_option;
        //$data['payment_withdraw'] = $request->payment_withdraw;
        if ($data['type'] == 'withdraw'){
            $data['withdraw_request_id'] = $request->withdraw_request_id;
        }
        if ($request->txn_code != null) {
            $data['txn_code'] = $request->txn_code;
        }
        else {
            $data['txn_code'] = null;
        }
        $request->session()->put('payment_type', 'seller_payment');
        $request->session()->put('payment_data', $data);
        if ($request->payment_option == 'cash') {
            return $this->seller_payment_done($request->session()->get('payment_data'), null);
        }
        /*elseif ($request->payment_option == 'sslcommerz') {
            $sslcommerz = new PublicSslCommerzPaymentController;
            return $sslcommerz->index($request);
        }*/

    }

    public function seller_payment_done($payment_data, $payment_details){
        $seller = Seller::findOrFail($payment_data['seller_id']);
        if($payment_data['type'] == 'payment'){
            $seller->admin_to_pay = $seller->admin_to_pay - $payment_data['amount'];
            $seller->save();
        }

        $payment = new Payment;
        $payment->seller_id = $seller->id;
        $payment->amount = $payment_data['amount'];
        $payment->payment_method = $payment_data['payment_method'];
        $payment->txn_code = $payment_data['txn_code'];
        $payment->payment_details = $payment_details;
        $payment->save();

        if ($payment_data['type'] == 'withdraw') {
            $seller_withdraw_request = SellerWithdrawRequest::find($payment_data['withdraw_request_id']);
            $seller_withdraw_request->status = '1';
            $seller_withdraw_request->viewed = '1';
            $seller_withdraw_request->save();
        }

        Session::forget('payment_data');
        Session::forget('payment_type');

        if ($payment_data['type'] == 'payment') {
            Toastr::success('Payment completed', 'Success');
            return redirect()->route('admin.seller.payment.history');
        }else{
            Toastr::success('Payment completed', 'Success');
            return redirect()->route('admin.seller.withdraw.request');
        }

    }

    public function order_management() {
        $pending_order = Order::where('delivery_status','Pending')->get();
//        $shop = Shop::where('user_id',Auth::id())->select('id')->first();
//        //dd($shop);
//        $pending_order = Order::where('shop_id',$shop->id)->get();
        return view('backend.admin.seller.order_management',compact('pending_order'));
    }

}
