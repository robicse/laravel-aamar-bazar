<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index() {
       //echo "Hello";
        return view('backend.admin.vendor.index');
    }
}
