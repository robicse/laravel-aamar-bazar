@extends('frontend.layouts.master')
@section('title', $subCategory->name)
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
                                    <figure>
                                        <figcaption>Folow us on social</figcaption>
                                        <ul class="ps-list--social-color">
                                            <li><a class="facebook" href="{{$shop->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="{{$shop->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="linkedin" href="{{$shop->google}}"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="feed" href="{{$shop->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                        </ul>
                                    </figure>
                                </div>
                                <div class="ps-block__footer">
                                    <p>Call us directly<strong><a href="tel:{{$user->phone}}">{{$user->phone}}</a></strong></p>
                                    <p>or Or if you have any question</p><a class="ps-btn ps-btn--fullwidth" href="tel:{{$user->phone}}">Contact Seller</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-section__right">
                        <div class="ps-block--vendor-filter">
                            <div class="ps-block__left">
                                <ul>
                                    <li class="active"><a href="#">Subcategory Products</a></li>
                                </ul>
                            </div>
                            <div class="ps-block__right">
                                <form class="ps-form--search" action="http://nouthemes.net/html/martfury/index.html" method="get">
                                    <input class="form-control" type="text" placeholder="Search in this shop">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        @if($featuredProducts->count() > 1)
                            <div class="ps-vendor-best-seller">
                                <div class="ps-section__header">
                                    <h3>Featured Products</h3>
                                    <div class="ps-section__nav"><a class="ps-carousel__prev" href="#vendor-bestseller"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#vendor-bestseller"><i class="icon-chevron-right"></i></a></div>
                                </div>
                                <div class="ps-section__content">
                                    <div class="owl-slider" id="vendor-bestseller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                                        @foreach($featuredProducts as $featuredProduct)
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{route('product-details',$featuredProduct->slug)}}"><img src="{{asset($featuredProduct->thumbnail_img)}}" alt="" width="153" height="171"></a>
                                                    {{--                                                <div class="ps-product__badge">11%</div>--}}
                                                    <ul class="ps-product__actions">
                                                        <li><a href="{{route('product-details',$featuredProduct->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="{{route('product-details',$featuredProduct->slug)}}" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        <li><a href="{{route('add.wishlist',$featuredProduct->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
                                                    <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$featuredProduct->slug)}}">{{$featuredProduct->name}}</a>
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>01</span>
                                                        </div>
                                                        <p class="ps-product__price sale">৳{{$featuredProduct->unit_price}}  <del>৳{{$featuredProduct->purchase_price}}</del></p>
                                                    </div>
                                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$featuredProduct->slug)}}">{{$featuredProduct->name}}</a>
                                                        <p class="ps-product__price sale">৳{{$featuredProduct->unit_price}} <del> ৳{{$featuredProduct->purchase_price}}</del></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="ps-shopping ps-tab-root">
                            <div class="ps-shopping__header">
                                <p><strong>{{count($products)}} </strong> Products found</p>
                                <div class="ps-shopping__actions">
                                </div>
                            </div>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                <div class="ps-product">
                                                    <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{asset($product->thumbnail_img)}}" alt="" width="153" height="171"></a>
                                                        {{--                                                        <div class="ps-product__badge">11%</div>--}}
                                                        <ul class="ps-product__actions">
                                                            <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                            <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                            {{--                                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
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
                                    {{--                                    <div class="ps-pagination">--}}
                                    {{--                                        <ul class="pagination">--}}
                                    {{--                                            <li class="active"><a href="#">1</a></li>--}}
                                    {{--                                            <li><a href="#">2</a></li>--}}
                                    {{--                                            <li><a href="#">3</a></li>--}}
                                    {{--                                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </div>--}}
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
@endpush
