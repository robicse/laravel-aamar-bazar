@extends('frontend.layouts.master')
@section('title', $shop->name)
@push('css')
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
                    <div class="ps-section__left">
                        <div class="ps-block--vendor">
                            <div class="ps-block__thumbnail"><img src="{{asset($shop->logo)}}" alt=""></div>
                            <div class="ps-block__container">
                                <div class="ps-block__header">
                                    <h4><a href="{{route('shop.details',$shop->slug)}}">{{$shop->name}} </a></h4>
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                    <p><strong>85% Positive</strong>  (62 rating)</p>
                                </div><span class="ps-block__divider"></span>
                                <div class="ps-block__content">
                                    <p><strong>{{$shop->name}}</strong>, {{$shop->about}}</p><span class="ps-block__divider"></span>
                                    <p><strong>Address</strong> {{$shop->address}}</p>
                                    <figure>
                                        <figcaption>Foloow us on social</figcaption>
                                        <ul class="ps-list--social-color">
                                            <li><a class="facebook" href="{{$shop->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="{{$shop->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="linkedin" href="{{$shop->google}}"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="feed" href="{{$shop->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                        </ul>
                                    </figure>
                                </div>
                                <div class="ps-block__footer">
                                    <p>Call us directly<strong><a href="tel:+8801771123456">(+880) 1771123456</a></strong></p>
                                    <p>or Or if you have any question</p><a class="ps-btn ps-btn--fullwidth" href="#">Contact Seller</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($seller->verification_status == 1)
                        <div class="ps-section__right">
                            <div class="ps-block--vendor-filter">
                                <div class="ps-block__left">
                                    <ul>
                                        <li class="active"><a href="#">Products</a></li>
                                        {{--                                    <li><a href="#">Reviews</a></li>--}}
                                        {{--                                    <li><a href="#">About</a></li>--}}
                                    </ul>
                                </div>
                                <div class="ps-block__right">
                                    <form class="ps-form--search text-right" action="" method="get">
                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                        <input  class="form-control" id="searchMain" name="searchName" type="search" placeholder="Search in this shop" autocomplete="off">
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
                                            </div><a href="#">View all</a>
                                        </div>
                                        <div class="ps-section__content">
                                            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                                                @foreach($shopCat as $cat)
                                                    <div class="ps-product ps-product--inner">
                                                        <div class="text-center"><a href="{{url('/shop/'.$shop->slug.'/'.$cat->category->slug)}}"><img src="{{asset('uploads/categories/'.$cat->category->icon)}}" alt="" class="rounded-circle" alt="" width="80" height="80"></a>
                                                            <div class="item-content text-center">
                                                                <h4 class="item-title"><a href="{{url('/shop/'.$shop->slug.'/'.$cat->category->slug)}}" style="color: #06c; padding: 5px;" data-toggle="tooltip" title="{{$cat->category->name}}">{!! Str::limit($cat->category->name,7) !!}</h4></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if( !empty($flashDeal) && $flashDeal->featured == 1  && strtotime(date('d-m-Y')) >= $flashDeal->start_date && strtotime(date('d-m-Y')) <= $flashDeal->end_date)
                                <div class="ps-deal-of-day">
                                    <div class="ps-container">
                                        <div class="ps-section__header">
                                            <div class="ps-block--countdown-deal">
                                                <div class="ps-block__left">
                                                    <h3>Deals of the day</h3>
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
                                                @forelse($flashDealProducts as $flashDealProduct)
                                                <div class="ps-product ps-product--inner" style="border:1px solid #ddd; padding: 5px;">
                                                    <div class="ps-product__thumbnail"><a href="{{route('product-details',$flashDealProduct->product->slug)}}"><img src="{{url($flashDealProduct->product->thumbnail_img)}}" alt=""></a>
                                                        <div class="ps-product__badge">-16%</div>
                                                        <ul class="ps-product__actions">
                                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="ps-product__container">
                                                        <p class="ps-product__price sale">$567.99 <del>$670.00 </del><small>18% off</small></p>
                                                        <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$flashDealProduct->product->slug)}}">{{$flashDealProduct->product->name}}</a>
                                                           {{-- <div class="ps-product__rating">
                                                                <select class="ps-rating" data-read-only="true">
                                                                    <option value="1">1</option>
                                                                    <option value="1">2</option>
                                                                    <option value="1">3</option>
                                                                    <option value="1">4</option>
                                                                    <option value="2">5</option>
                                                                </select><span>01</span>
                                                            </div>--}}
                                                           {{-- <div class="ps-product__progress-bar ps-progress" data-value="37">
                                                                <div class="ps-progress__value"><span></span></div>
                                                                <p>Sold:16</p>
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                    <h3>No product found!</h3>
                                                @endforelse

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{--                        @if($shopCat->count() > 0)--}}
                            {{--                        <div class="ps-vendor-best-seller">--}}
                            {{--                            <div class="ps-section__header">--}}
                            {{--                                <h3>Featured Categories</h3>--}}
                            {{--                                <div class="ps-section__nav"><a class="ps-carousel__prev" href="#vendor-bestseller"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#vendor-bestseller"><i class="icon-chevron-right"></i></a></div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="ps-section__content" style="padding-bottom: 20px;">--}}
                            {{--                                <div class="owl-slider" id="vendor-bestseller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">--}}
                            {{--                                    <div class="row">--}}
                            {{--                                        @foreach($shopCat as $cat)--}}
                            {{--                                            <div class="col-lg-2 col-md-6">--}}
                            {{--                                                <div class="text-center">--}}
                            {{--                                                    <a href="{{url('/shop/'.$shop->slug.'/'.$cat->category->slug)}}"> <img src="{{asset('uploads/categories/'.$cat->category->icon)}}" class="rounded-circle" alt="" width="80" height="80"></a>--}}
                            {{--                                                    <div class="item-content text-center">--}}
                            {{--                                                        <h4 class="item-title"><a href="{{url('/shop/'.$shop->slug.'/'.$cat->category->slug)}}" style="color: #06c;" data-toggle="tooltip" title="{{$cat->category->name}}">{!! Str::limit($cat->category->name,7) !!}</h4></a>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        @endif--}}
                            @if($products->count() > 0)
                                <div class="ps-shopping ps-tab-root">
                                    <div class="ps-shopping__header">
                                        <p>Featured Products</p>
                                        <div class="ps-shopping__actions">
                                            <div class="ps-shopping__view">
                                                <div><a href="{{route('product.list', $shop->slug)}}">View All</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tabs">
                                        <div class="ps-tab active" id="tab-1">
                                            <div class="row">
                                                @foreach($products as $product)
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                        <div class="ps-product">
                                                            <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{asset($product->thumbnail_img)}}" alt=""></a>
                                                                {{--                                                        <div class="ps-product__badge">11%</div>--}}
                                                                <ul class="ps-product__actions">
                                                                    <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                                    <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('product-details',$product->slug)}}"></a>
                                                                <div class="ps-product__content"><a class="ps-product__title" href="">{{$product->name}}</a>
                                                                    <div class="ps-product__rating">
                                                                        <select class="ps-rating" data-read-only="true">
                                                                            <option value="1">1</option>
                                                                            <option value="1">2</option>
                                                                            <option value="1">3</option>
                                                                            <option value="1">4</option>
                                                                            <option value="2">5</option>
                                                                        </select><span>01</span>
                                                                    </div>
                                                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}}</del></p>
                                                                </div>
                                                                <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}}</del></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                <div><a href="">View All</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tabs">
                                        <div class="ps-tab active" id="tab-1">
                                            <div class="row">
                                                @foreach($todaysDeal as $product)
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                        <div class="ps-product">
                                                            <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{asset($product->thumbnail_img)}}" alt=""></a>
                                                                {{--                                                        <div class="ps-product__badge">11%</div>--}}
                                                                <ul class="ps-product__actions">
                                                                    <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                                    <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('product-details',$product->slug)}}"></a>
                                                                <div class="ps-product__content"><a class="ps-product__title" href="">{{$product->name}}</a>
                                                                    <div class="ps-product__rating">
                                                                        <select class="ps-rating" data-read-only="true">
                                                                            <option value="1">1</option>
                                                                            <option value="1">2</option>
                                                                            <option value="1">3</option>
                                                                            <option value="1">4</option>
                                                                            <option value="2">5</option>
                                                                        </select><span>01</span>
                                                                    </div>
                                                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}}</del></p>
                                                                </div>
                                                                <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}}</del></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                <div><a href="">View All</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tabs">
                                        <div class="ps-tab active" id="tab-1">
                                            <div class="row">
                                                @foreach($best_sales_products as $product)
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                        <div class="ps-product">
                                                            <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{asset($product->thumbnail_img)}}" alt=""></a>
                                                                {{--                                                        <div class="ps-product__badge">11%</div>--}}
                                                                <ul class="ps-product__actions">
                                                                    <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                                    <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('product-details',$product->slug)}}"></a>
                                                                <div class="ps-product__content"><a class="ps-product__title" href="">{{$product->name}}</a>
                                                                    <div class="ps-product__rating">
                                                                        <select class="ps-rating" data-read-only="true">
                                                                            <option value="1">1</option>
                                                                            <option value="1">2</option>
                                                                            <option value="1">3</option>
                                                                            <option value="1">4</option>
                                                                            <option value="2">5</option>
                                                                        </select><span>01</span>
                                                                    </div>
                                                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}}</del></p>
                                                                </div>
                                                                <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                                                    <p class="ps-product__price sale">৳{{$product->unit_price}} <del>৳{{$product->purchase_price}}</del></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
