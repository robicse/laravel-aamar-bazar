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
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order_history as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{date('j-m-Y',strtotime($order->created_at))}}</td>
                                                <td>{{ $order->name }}</td>
                                                <td><a href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a></td>
                                                <td>20-1-2020</td>
                                                <td>42.99</td>
                                                <td>Successful delivery</td>
                                            </tr>
                                            @endforeach
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
