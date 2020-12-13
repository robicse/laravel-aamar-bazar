<?php

namespace App\Http\Controllers\Frontend;
use App\Model\Category;
use App\Model\Product;
use App\Model\Shop;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index() {
        $categories = Category::where('is_home',1)->latest()->get();
        $products = Product::where('todays_deal',1)->latest()->limit(7)->get();
        $new_products = Product::where('published',1)->latest()->limit(7)->get();
        $shops = Shop::all();
        return view('frontend.pages.index', compact('categories','products','new_products','shops'));
    }
    public function register(Request $request) {
//        dd('sjf');

        $this->validate($request, [
            'name' =>  'required',
            'email' =>  'required',
            'phone' => 'required|min:8|numeric',
            'password' => 'required|min:6',
        ]);
        $userReg = new User();
        $userReg->name = $request->name;
        $userReg->email = $request->email;
        $userReg->phone= $request->phone;
        $userReg->password = Hash::make($request->password);
        $userReg->user_type = 'customer';
        $userReg->save();
        Toastr::success('Your registration successfully done!');
//        return redirect()->route('get-verification-code',$userReg->id);
        $credential = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credential)) {
            return redirect()->route('user.dashboard');
        }

    }
}
