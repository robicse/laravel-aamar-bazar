@extends('frontend.layouts.master')
@section('title', 'User Invoice')
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="user-information.html">Account</a></li>
                    <li>Order History</li>
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
                                    <h3>Order History</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table ps-table--invoices">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="invoice-detail.html">500884010</a></td>
                                                <td><a href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a></td>
                                                <td>20-1-2020</td>
                                                <td>42.99</td>
                                                <td>Successful delivery</td>
                                            </tr>
                                            <tr>
                                                <td><a href="invoice-detail.html">593347935</a></td>
                                                <td><a href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a></td>
                                                <td>20-1-2020</td>
                                                <td>199.99</td>
                                                <td>Cancel</td>
                                            </tr>
                                            <tr>
                                                <td><a href="invoice-detail.html">593347935</a></td>
                                                <td><a href="product-default.html">Xbox One Wireless Controller Black Color</a></td>
                                                <td>20-1-2020</td>
                                                <td>199.99</td>
                                                <td>Cancel</td>
                                            </tr>
                                            <tr>
                                                <td><a href="invoice-detail.html">615397400</a></td>
                                                <td><a href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a></td>
                                                <td>20-1-2020</td>
                                                <td>41.00</td>
                                                <td>Cancel</td>
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
    </main>
@endsection
