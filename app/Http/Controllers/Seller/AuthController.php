<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ShowRegForm()
    {
        return view('auth.seller.register');
    }
}
