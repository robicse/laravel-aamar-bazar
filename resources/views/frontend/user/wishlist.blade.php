@extends('frontend.layouts.master')
@section('title', 'User Wishlist')
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{('/')}}">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    @include('frontend.user.includes.user_sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h2>Wishlist</h2>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table--whishlist">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product name</th>
                                                <th>Unit Price</th>
                                                <th>Stock Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="#"><i class="icon-cross"></i></a></td>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/electronic/1.jpg')}}" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="product-default.html">Marshall Kilburn Wireless Bluetooth Speaker, Black (A4819189)</a></div>
                                                    </div>
                                                </td>
                                                <td class="price">$205.00</td>
                                                <td><span class="ps-tag ps-tag--in-stock">In-stock</span></td>
                                                <td><a class="ps-btn text-center" style="padding: 7px 12px 7px 12px; font-size: 14px;" href="#">Add to cart</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><i class="icon-cross"></i></a></td>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/clothing/2.jpg')}}" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="product-default.html">Unero Military Classical Backpack</a></div>
                                                    </div>
                                                </td>
                                                <td class="price">$108.00</td>
                                                <td><span class="ps-tag ps-tag--in-stock">In-stock</span></td>
                                                <td><a class="ps-btn text-center" style="padding: 7px 12px 7px 12px; font-size: 14px;"  href="#">Add to cart</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><i class="icon-cross"></i></a></td>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/electronic/15.jpg')}}" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="product-default.html">XtremepowerUS Stainless Steel Tumble Cloths Dryer</a></div>
                                                    </div>
                                                </td>
                                                <td class="price">$508.00</td>
                                                <td><span class="ps-tag ps-tag--in-stock">In-stock</span></td>
                                                <td><a class="ps-btn text-center" style="padding: 7px 12px 7px 12px; font-size: 14px;" href="#">Add to cart</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="ps-newsletter">
            <div class="ps-container">
                <form class="ps-form--newsletter" action="http://nouthemes.net/html/martfury/do_action" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" placeholder="Email address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
