<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('frontend.pages.blog_list');
    }
    public function details() {
        return view('frontend.pages.blog_details');
    }
}
