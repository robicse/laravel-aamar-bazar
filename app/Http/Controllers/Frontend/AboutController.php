<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About() {
        return view('frontend.pages.about_us');
    }
    public function contact() {
        return view('frontend.pages.contact');
    }
    public function store(Request $request)
    {
        /* dd($request->all());*/
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $phone = $request->contact;
        $message = $request->message;

        $msg = '
<html>
<head>
  <title>Mail from ' . $name . '</title>
</head>
<body>
  <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
   <tr style="height: 32px;">
     <th align="right" style="width:150px; padding-right:5px;">Name:</th>
     <td align="left" style="padding-left:5px; line-height: 20px;">' . $name . '</td>
   </tr>
   <tr style="height: 32px;">
     <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
     <td align="left" style="padding-left:5px; line-height: 20px;">' . $email . '</td>
   </tr>
   <tr style="height: 32px;">
     <th align="right" style="width:150px; padding-right:5px;">Message:</th>
     <td align="left" style="padding-left:5px; line-height: 20px;">' . $message . '</td>
   </tr>
  </table>
</body>
</html>
';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: ' . $email . "\r\n";

        if(mail('info@mudihat.com',$subject,$msg,$headers)){
            Toastr::success('Message Sent Successfully','Success');
        }else{
            Toastr::error('Something went wrong! Please try again','Error');
        }
        return redirect()->back();
    }
    public function faqs() {
        return view('frontend.pages.faq');
    }
    public function policy() {
        return view('frontend.pages.policy');
    }
    public function terms() {
        return view('frontend.pages.terms_conditions');
    }
    public function shipping() {
        return view('frontend.pages.shipping');
    }
    public function returns() {
        return view('frontend.pages.return');
    }
}
