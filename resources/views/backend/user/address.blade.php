@extends('frontend.layouts.master')
@section('title', 'User Address')
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{('/')}}">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li>Addresses</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    @include('backend.user.includes.user_sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Address</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <figure class="ps-block--address">
                                                <figcaption>Billing address</figcaption>
                                                <div class="ps-block__content">
                                                    <p>You Have Not Set Up This Type Of Address Yet.</p><a href="edit-address.html">Edit</a>
                                                </div>
                                            </figure>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <figure class="ps-block--address">
                                                <figcaption>Shipping address</figcaption>
                                                <div class="ps-block__content">
                                                    <p>You Have Not Set Up This Type Of Address Yet.</p><a href="edit-address.html">Edit</a>
                                                </div>
                                            </figure>
                                        </div>
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
