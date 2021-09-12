@extends('frontend.layouts.master')
@section('title', 'Home')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div id="homepage-1">

@include('frontend.includes.sliders')
        <div class="container ">
            <div class="city-list row shop_list">
                <div class="col-md-12 text-center my-5" id="loader">
                    <img  src="{{asset('frontend/img/shop/loader.gif')}}"  class="img-fluid ">
                </div>
            </div>
        </div>
        <div class="ps-home-ads" style="padding-top: 20px; padding-bottom: 20px; background-color: #f3f3f3">
            <div class="ps-container">
                <div class="row">
                    @foreach($offers as $offer)
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{url($offer->image)}}" alt=""></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="ps-home-ads" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="ps-container">
                <div class="row">
                    <div class="col-md-6">
                      <img src="{{asset('frontend/img/list.jpg')}}" >
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5" style="padding-top: 20px;">
                        @php
                        $total_seller = \App\User::where('user_type','seller')->count();
                        $total_customer = \App\User::where('user_type','customer')->count();
                        $total_order = \App\Model\Order::where('delivery_status','Completed')->count();
                        @endphp
                        <div class="card" style="background-color: #f3f3f3">
                            <div class="card-body" style="padding: 50px;">
                                <h3 ><span >Total Seller:</span> {{$total_seller + 200}}</h3>
                                <h3 ><span >Total Customer:</span> {{$total_customer + 500}}</h3>
                                <h3 ><span >Total Successful Order:</span> {{$total_order + 250}}</h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="ps-download-app" style="margin-top: -10px;">
            <div class="ps-container">
                <div class="ps-block--download-app">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__thumbnail"><img src="{{asset('frontend/img/application.png')}}" alt=""></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__content">
                                    <h3>Download Mudi Hat App Now!</h3>
                                    <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>
                                    <form class="ps-form--download-app" action="/" method="post">
                                        {{--                                        <div class="form-group--nest">--}}
                                        {{--                                            <input class="form-control" type="Email" placeholder="Email Address">--}}
                                        {{--                                            <button class="ps-btn">Subscribe</button>--}}
                                        {{--                                        </div>--}}
                                    </form>
                                    <p class="download-link"><a href="https://play.google.com/store/apps/details?id=com.starit.mudihat"><img src="{{asset('frontend/img/google-play.png')}}" alt=""></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('frontend/js/location/home_location.js')}}"></script>
    <script src="{{asset('frontend/js/bk.cdn.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#loader').hide();
        })
    </script>
@endpush
