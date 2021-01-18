<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About() {
        return view('frontend.pages.about_us');
    }
    public function contact() {
        return view('frontend.pages.contact');
    }
    public function faqs() {
        return view('frontend.pages.faq');
    }
}
