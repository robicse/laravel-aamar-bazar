@extends('frontend.layouts.master')
@section('title', $shop->name)
@push('css')
    <style>
        .ps-product:hover {
            border-color: silver;
            margin-bottom: 98px!important;
        }
        .twitter-typeahead{
            width: 100% !important;
        }
        .tt-menu{
            width: 100% !important;
        }
        @media only screen and (max-width: 700px) {
            .mobile_view{
                display: none;
            }
        }
        @media only screen and (min-width: 600px) {
            .web_view{
                display: none;
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
            <div class="container">
                <div class="ps-section__container">
                    <div class="ps-section__left mobile_view">
                        <div class="ps-block--vendor">
                            <div class="ps-block__thumbnail"><img src="{{asset($shop->logo)}}" alt="" width="300" height="225"></div>
                            <div class="ps-block__container">
                                <div class="ps-block__header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><a href="{{route('shop.details',$shop->slug)}}">{{$shop->name}} </a></h4>
                                        </div>
                                        @if(empty($favoriteShop))
                                        <div class="col-md-6 pull-right">
                                            <button class="ps-btn" style="padding: 7px 20px 7px 20px; font-size: 14px;"><a href="{{route('add.favorite-shop',$shop->id)}}">Follow</a></button>
                                        </div>
                                        @else
                                            <div class="col-md-6 pull-right">
                                                <button class="ps-btn" style="padding: 7px 20px 7px 20px; font-size: 14px;"><a href="{{route('remove.favorite-shop',$shop->id)}}">Unfollow</a></button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-4">
                                         <p class="float-left pr-2">Rating: <strong style="font-size: 30px;">{{$totalRatingCount}}</strong></p>
                                        <div class="">
                                            <select class="ps-rating" data-read-only="true" style="margin-top: 7px;">
                                                @for ($i=0; $i < round($totalRatingCount); $i++)
                                                    <option value="1">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                </div><span class="ps-block__divider"></span>
                                <div class="ps-block__content">
                                    <p><strong>{{$shop->name}}</strong>, {{$shop->about}}</p><span class="ps-block__divider"></span>
                                    <p><strong>Address</strong> {{$shop->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($seller->verification_status == 1)
                        <div class="ps-section__right">
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
                                            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                                                @foreach($shopCat as $cat)
                                                    @if($cat->category->status !=0)
                                                    <div class="ps-product--inner" style="margin-left: 10px;">
                                                        <div class="text-center"><a href="{{url('/shop/'.$shop->slug.'/'.$cat->category->slug)}}"><img src="{{asset('uploads/categories/'.$cat->category->icon)}}" alt="" class="rounded-circle" alt="" width="80" height="80"></a>
                                                            <div class="item-content text-center" style="padding-top: 5px;">
                                                                <h4 class="item-title" style="font-size: 16px;"><a href="{{url('/shop/'.$shop->slug.'/'.$cat->category->slug)}}" style="color: #06c; margin-left: -10px;" data-toggle="tooltip" title="{{$cat->category->name}}">{{$cat->category->name}}</a></h4>
                                                            </div>
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
                                                        @if($flashDealProduct->category->status !=0)
                                                        {{FlashDealComponent($flashDealProduct)}}
                                                        @endif
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
                            @else
                                <div class="text-center">
                                    <p>Product isn't inserted yet..</p>
                                </div>
                            @endif
                            @if($todaysDeal->count() > 0)
                                <div class="ps-shopping ps-tab-root" style="padding-top: 10px;">
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
                                        <p>Best Selling</p>
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

                    <div class="ps-section__left web_view" style="padding-top: 20px;">
                        <div class="ps-block--vendor">
                            <div class="ps-block__thumbnail"><img src="{{asset($shop->logo)}}" alt="" width="300" height="225"></div>
                            <div class="ps-block__container">
                                <div class="ps-block__header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><a href="{{route('shop.details',$shop->slug)}}">{{$shop->name}} </a></h4>
                                        </div>
                                        @if(empty($favoriteShop))
                                            <div class="col-md-6 pull-right">
                                                <button class="ps-btn" style="padding: 7px 20px 7px 20px; font-size: 14px;"><a href="{{route('add.favorite-shop',$shop->id)}}">Follow</a></button>
                                            </div>
                                        @else
                                            <div class="col-md-6 pull-right">
                                                <button class="ps-btn" style="padding: 7px 20px 7px 20px; font-size: 14px;"><a href="{{route('remove.favorite-shop',$shop->id)}}">Unfollow</a></button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-4">
                                        <p class="float-left pr-2">Rating: <strong style="font-size: 30px;">{{$totalRatingCount}}</strong></p>
                                        <div class="">
                                            <select class="ps-rating" data-read-only="true" style="margin-top: 7px;">
                                                @for ($i=0; $i < round($totalRatingCount); $i++)
                                                    <option value="1">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                </div><span class="ps-block__divider"></span>
                                <div class="ps-block__content">
                                    <p><strong>{{$shop->name}}</strong>, {{$shop->about}}</p><span class="ps-block__divider"></span>
                                    <p><strong>Address</strong> {{$shop->address}}</p>
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
                            '<div class="list-group search-results-dropdown"><div class="list-group-item">Sorry,We could not find any Product.</div></div>'
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
