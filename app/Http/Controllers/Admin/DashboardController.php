<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStaffs = User::where('user_type','staff')->count();
        //dd($totalStaffs);
        return view('backend.admin.dashboard', compact('totalStaffs'));
    }
}
