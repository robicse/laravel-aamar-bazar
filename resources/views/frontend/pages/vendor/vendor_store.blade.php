@extends('frontend.layouts.master')
@section('title', $shop->name)
@push('css')
    <style>
        .ps-vendor-store .ps-section__container .ps-section__right {
            max-width: 100%;
            padding-left: 0px;
        }
        @media (max-width: 1440px) and (min-width: 1200px){
            .ps-shopping .row .col-xl-2 {
                max-width: 20%;
                flex-basis: 25%;
            }
        }
        @media (min-width: 1200px){
            .col-xl-2 {
                max-width: 20%;
                flex-basis: 25%;
            }
        }


    </style>
@endpush
@section('content')
    <div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>{{$shop->name}}</li>
                </ul>
            </div>
        </div>
        <div class="ps-vendor-store">
            <div class="container-fluid">
                @if($seller->verification_status == 1)
                    <div class="" style="width: 100%">
                        <div class="ps-block--vendor-filter">
                            <div class="">
                                <form class="ps-form--search text-right" action="" method="get">
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                    <input  class="form-control" id="searchMain" name="searchName" type="search" placeholder="Search products in this shop" autocomplete="off">

                                </form>
                            </div>
                        </div>
                        @if($shopCat->count() > 0)
                            <div class="ps-deal-of-day">
                                <div class="ps-container">
                                    <div class="ps-section__header">
                                        <div class="ps-block--countdown-deal">
                                            <div class="ps-block__left">
                                                <h4>Featured Categories</h4>
                                            </div>
                                            <div class="ps-block__right">
                                            </div>
                                        </div><a href="{{route('view.all.categories',$shop->slug)}}">View all</a>
                                    </div>
                                    <div class="ps-section__content mb-5">
                                        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="false" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="6" data-owl-item-lg="6" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on" style="margin-top: -40px; margin-bottom: -20px;">
                                            @foreach($shopCat as $cat)
                                                @if($cat->category->status !=0)
                                                    <div class="card shadow p-3 mb-5 bg-white rounded" style="height: 182px; width: 18rem; border-radius: 0.75rem!important;" >
                                                        <div class="card-body text-center" style="text-align: center!important;">
                                                            <p style="color: black; font-weight: bold; font-size: 14px;">{{$cat->category->name}}</p>
                                                            <a href="{{url('/shop/'.$shop->slug.'/'.$cat->category->slug)}}"> <img src="{{asset('uploads/categories/'.$cat->category->icon)}}" alt="" width="120" height="100"></a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if( !empty($flashDeal) && $flashDeal->featured == 1  && strtotime(date('d-m-Y')) >= $flashDeal->start_date && strtotime(date('d-m-Y')) <= $flashDeal->end_date && $flashDealProducts->count() >0)
                            <div class="ps-deal-of-day" style="padding-top: 20px;">
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
                                        </div><a href="{{route('flash-deals',$flashDeal->slug)}}">View all</a>
                                    </div>

                                    <div class="ps-tabs">
                                        <div class="ps-tab active" id="tab-1">
                                            <div class="row" style="margin-top: -30px;">
                                                @foreach($flashDealProducts as $flashDealProduct)
                                                    {{FlashDealComponent($flashDealProduct)}}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($products->count() > 0)
                            <div class="ps-shopping ps-tab-root" style="padding-top: 20px;">
                                <div class="ps-shopping__header">
                                    <p>Featured Products</p>
                                    <div class="ps-shopping__actions">
                                        <div class="ps-shopping__view">
                                            <div><a href="{{route('featured-product.list', $shop->slug)}}">View All</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="row">
                                            @foreach($products as $product)
                                                {{ProductComponent($product)}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($todaysDeal->count() > 0)
                            <div class="ps-shopping ps-tab-root mb-5" style="padding-top: 10px;">
                                <div class="ps-shopping__header">
                                    <p>Todays Deal</p>
                                    <div class="ps-shopping__actions">
                                        <div class="ps-shopping__view">
                                            <div><a href="{{route('todays-deal-products',$shop->slug)}}">View All</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="row">
                                            @foreach($todaysDeal as $product)
                                                {{ProductComponent($product)}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($best_sales_products->count() > 0)
                            <div class="ps-shopping ps-tab-root">
                                <div class="ps-shopping__header">
                                    <p>All Products</p>
                                    <div class="ps-shopping__actions">
                                        <div class="ps-shopping__view">
                                            <div><a href="{{route('best-selling-products',$shop->slug)}}">View All</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="row">
                                            @foreach($best_sales_products as $product)
                                                {{ProductComponent($product)}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="ps-section__right text-center">
                        <div class="ps-image text-center" style="padding-top: 50px;">
                            <img src="{{asset('uploads/shop/not-verified.png')}}" width="300" height="300">
                        </div>
                        {{--                            <h3>Seller is not Verified</h3>--}}
                    </div>
                @endif
                @include('frontend.includes.shop_details')

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script !src = "">
        jQuery(document).ready(function($) {
            var product = new Bloodhound({
                remote: {
                    url: '/search/product?q=%QUERY%&storeId={{$shop->id}}',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('searchName'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $("#searchMain").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 3
                }, {

                    source: product.ttAdapter(),
                    // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                    name: 'serviceList',
                    display: 'name',
                    // the key from the array we want to display (name,id,email,etc...)
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown"><div class="list-group-item">Products not found, please try another search.</div></div>'
                        ],
                        header: [
                            // '<div class="list-group search-results-dropdown"><div class="list-group-item custom-header">Product</div>'
                        ],
                        suggestion: function (data) {
                            return '<a href="/product/'+data.slug+'" class="list-group-item custom-list-group-item">'+data.name+'</a>'
                        }
                    }
                },
            );
        });
    </script>
@endpush
