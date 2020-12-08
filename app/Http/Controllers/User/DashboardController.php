<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.user.home');
    }
    public function invoices()
    {
        return view('backend.user.invoices');
    }
    public function notification()
    {
        return view('backend.user.notification');
    }
    public function address()
    {
        return view('backend.user.address');
    }
    public function wishlist()
    {
        return view('backend.user.wishlist');
    }
}
