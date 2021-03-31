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
        <div class="ps-home-ads" style="padding-top: 20px;">
            <div class="ps-container">
                <div class="row">
                    @foreach($offers as $offer)
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{url($offer->image)}}" alt=""></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="ps-download-app">
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
                                    <form class="ps-form--download-app" action="http://nouthemes.net/html/martfury/do_action" method="post">
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

        @if( !empty($flashDeal) && $flashDeal->featured == 1  && strtotime(date('d-m-Y')) >= $flashDeal->start_date && strtotime(date('d-m-Y')) <= $flashDeal->end_date)
        <div class="ps-deal-of-day">
            <div class="ps-container">
                <div class="ps-section__header">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3>{{$flashDeal->title}}</h3>
                        </div>
                        <div class="ps-block__right">
                            <figure>
                                <figcaption>End in:</figcaption>
                                <ul class="ps-countdown" data-time="{{date('m/d/Y', $flashDeal->end_date)}}">
                                    <li><span class="days"></span></li>
                                    <li><span class="hours"></span></li>
                                    <li><span class="minutes"></span></li>
                                    <li><span class="seconds"></span></li>
                                </ul>
                            </figure>
                        </div>
                    </div><a href="#">View all</a>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">

                        @foreach($flashDealProducts as $flashDealProduct)
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="{{route('product-details',$flashDealProduct->product->slug)}}"><img src="{{asset($flashDealProduct->product->thumbnail_img)}}" alt="" width="153" height="171"></a>
                                <ul class="ps-product__actions">
                                    <li><a href="{{route('product-details',$flashDealProduct->product->slug)}}" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="{{route('product-details',$flashDealProduct->product->slug)}}" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="{{route('add.wishlist',$flashDealProduct->product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">৳{{home_discounted_base_price($flashDealProduct->product_id)}}
                                    @if(home_base_price($flashDealProduct->product_id) != home_discounted_base_price($flashDealProduct->product_id))
                                        <del>৳{{home_base_price($flashDealProduct->product_id)}}</del>
                                    @else
                                        ৳{{home_discounted_base_price($flashDealProduct->product_id)}}
                                    @endif</p>
                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$flashDealProduct->product->slug)}}">{{$flashDealProduct->product->name}}</a>
{{--                                    <div class="ps-product__rating">--}}
{{--                                        <select class="ps-rating" data-read-only="true">--}}
{{--                                            <option value="1">1</option>--}}
{{--                                            <option value="1">2</option>--}}
{{--                                            <option value="1">3</option>--}}
{{--                                            <option value="1">4</option>--}}
{{--                                            <option value="2">5</option>--}}
{{--                                        </select><span>01</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="ps-product__progress-bar ps-progress" data-value="37">--}}
{{--                                        <div class="ps-progress__value"><span></span></div>--}}
{{--                                        <p>Sold:16</p>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="ps-product-list ps-new-arrivals">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Best Selling Product</h3>
                    <ul class="ps-section__links">
{{--                        @foreach($categories as $cat)--}}
{{--                            <li><a href="shop-grid.html">{{$cat->name}}</a></li>--}}
{{--                        @endforeach--}}
                        <li><a href="#">Top 20</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        @foreach($best_sales_products as $product)
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                                <div class="ps-product--horizontal">
                                    <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{ $product->name }}</a>
                                        <p class="ps-product__price">৳{{$product->unit_price}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="ps-product-list ps-clothings">--}}
{{--            <div class="ps-container">--}}
{{--                <div class="ps-section__header">--}}
{{--                    <h3>Best Selling Product</h3>--}}
{{--                    <ul class="ps-section__links">--}}
{{--                        <li>Top 20</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="ps-section__content" style="padding-top: 20px;">--}}
{{--                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">--}}
{{--                       @foreach($best_sales_products as $product)--}}
{{--                        <div class="ps-product">--}}
{{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt="" width="153" height="171"></a>--}}
{{--                                <ul class="ps-product__actions">--}}
{{--                                    <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>--}}
{{--                                    <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                    <li><a href="{{route('add.wishlist',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
{{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="ps-product__container">--}}
{{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>--}}
{{--                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}} </del></p>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>--}}
{{--                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}} </del></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                            @php--}}
{{--                                $shop = \App\Model\Shop::where('user_id',$product->user_id)->first();--}}
{{--                            @endphp--}}
{{--                            <div class="ps-product">--}}
{{--                                <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt="" width="153" height="171"></a>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('shop.details',$shop->slug)}}">{{$shop->name}}</a>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>--}}
{{--                                        Price: ৳ {{home_discounted_base_price($product->id)}}--}}
{{--                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))--}}
{{--                                            <del>৳ {{home_base_price($product->id)}}</del>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>--}}
{{--                                        Price: ৳ {{home_discounted_base_price($product->id)}}--}}
{{--                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))--}}
{{--                                            <del>৳ {{home_base_price($product->id)}}</del>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="ps-product-list ps-new-arrivals">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Best Sellers</h3>
                    <ul class="ps-section__links">
                        <li><a href="{{route('best-seller.shop-list')}}">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        @foreach($orders as $order)
                            @php
                                $shop = \App\Model\Shop::where('id',$order->shop_id)->first();
                            @endphp
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                                    <div class="ps-product--horizontal">
                                        <div class="ps-product__thumbnail"><a href="{{route('shop.details',$shop->slug)}}"><img src="{{url($shop->logo)}}" alt="" width="100" height="75"></a></div>
                                        <div class="ps-product__content"><a class="ps-product__title" href="{{route('shop.details',$shop->slug)}}">{{ $shop->name }}</a>

                                            <div class="">
                                                <p class="ps-product__price"> <a href="{{route('shop.details',$shop->slug)}}">Visit Store</a>
                                                    <i class="right fa fa-angle-left"></i> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
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
