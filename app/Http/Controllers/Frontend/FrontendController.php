<?php

namespace App\Http\Controllers\Frontend;
use App\Model\Category;
use App\Model\Product;
use App\Model\Shop;
use App\Model\Subcategory;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index() {
        $categories = Category::where('is_home',1)->latest()->get();
        $products = Product::where('todays_deal',1)->latest()->limit(7)->get();
        $new_products = Product::where('published',1)->latest()->limit(7)->get();
        $best_sales_products=Product::where('added_by','seller')->where('published',1)->where('num_of_sale', '>',0)->limit(8)->get();
        $shops = Shop::all();
        return view('frontend.pages.index', compact('categories','products','new_products','shops','best_sales_products'));
    }
    public function register(Request $request) {
        $this->validate($request, [
            'name' =>  'required',
            'email' =>  'required|email|unique:users,email',
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users',
            'password' => 'required|min:6',
        ]);
        $phn1 = (int)$request->phone;
        $check = User::where('phone',$phn1)->first();
        if (!empty($check)){
            Toastr::error('This phone number already exist');
            return back();
        }
        $userReg = new User();
        $userReg->name = $request->name;
        $userReg->email = $request->email;
        $userReg->phone= $request->phone;
        $userReg->password = Hash::make($request->password);
        $userReg->user_type = 'customer';
        $userReg->save();
//        dd($userReg);


        Session::put('phone',$request->phone);
        Session::put('password',$request->password);
        Session::put('user_type','customer');


        Toastr::success('Your registration successfully done!');
        return redirect()->route('get-verification-code',$userReg->id);
//        $credential = [
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => $request->password,
//        ];
//        if (Auth::attempt($credential)) {
//            return redirect()->route('user.dashboard');
//        }

    }

}
