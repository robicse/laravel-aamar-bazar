@extends('frontend.layouts.master')
@section('title', 'About Us')
@push('css')
    <style>
        p{
            color: black;
            font-size: 16px;
        }
    </style>
@endpush
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <h2 class="text-center" style="color:#09c;">About Us</h2>
                <div class="text-justify">
                    <h3>Who We Are?</h3>
                    <p>Mudihat is a vendor based e-commerce web and application platform where we bring customers and sellers on the same platform and arrange for the fastest delivery of goods to the customers home. Mudihat has started its journey from 2021 in Bangladesh.
                    </p>
                    <p>Customers can find multiple grocery shops from his locality by using Mudihat and can make their order as per their needs. Mudihat will deliver their orders at their home within very short time. </p>
                </div>
                <div class="text-justify">
                    <h3>Our Mission and Vision</h3>
                    <p>
                        Our vision is to become the leading brand in the grocery home delivery services line of business in Bangladesh.
                    </p>
                    <p>
                        Our mission is to establish a grocery home delivery services business that will make available a wide range of goods and products from top manufacturing / production brands at affordable prices to the residence of Bangladesh where we intend marketing our services and products.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
