@extends('frontend.layouts.master')
@section('title', 'Home')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div id="homepage-1">
        {{--        <div class="ps-home-banner ps-home-banner--1">--}}
        {{--            <div class="ps-container">--}}
        {{--                <div class="ps-section__full">--}}
        {{--                    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">--}}
        {{--                        <div class="ps-banner" data-background="{{asset('frontend/img/slider/home-1/slide-1.jpg')}}"></div>--}}
        {{--                        <div class="ps-banner" data-background="{{asset('frontend/img/slider/home-1/slide-2.jpg')}}"></div>--}}
        {{--                        <div class="ps-banner" data-background="{{('frontend/img/slider/home-1/slide-3.jpg')}}"></div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="ps-section__full"><a class="ps-collection" href="#"><img src="{{asset('frontend/img/slider/home-1/promotion-1.jpg')}}" alt=""></a><a class="ps-collection" href="#"><img src="{{asset('frontend/img/slider/home-1/promotion-2.jpg')}}" alt=""></a></div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
@include('frontend.includes.sliders')
        <div class="container ">
            <div class="city-list row shop_list">
                <div class="col-md-12 text-center my-5" id="loader">
                    <img  src="{{asset('frontend/img/shop/loader.gif')}}"  class="img-fluid ">
                </div>
                {{--                <div class="col-md-3 py-2 px-4">--}}
                {{--                    <figure>--}}
                {{--                        <a class="city-tile" data-gtm-cta="findRestaurant_dhaka" href="/city/dhaka"><picture>--}}
                {{--                                <div class="city-picture b-lazy b-loaded" data-src="https://images.deliveryhero.io/image/fd-bd/city-title/city-title-Dhaka.jpg?width=720" style="background-image: url(&quot;https://images.deliveryhero.io/image/fd-bd/city-title/city-title-Dhaka.jpg?width=720&quot;);">--}}
                {{--                                    &nbsp;</div>--}}
                {{--                            </picture> <figcaption class="city-info"> <span class="city-name"> Dhaka </span> <span class="city-letter">D</span> <span class="city-cta button city__called-action js-ripple"> <svg class="svg-stroke-container" height="18" viewBox="0 0 20 18" width="20" xmlns="http://www.w3.org/2000/svg"> <g fill="none" fill-rule="evenodd" stroke="#FFFFFF" stroke-linecap="round" stroke-width="2" transform="translate(1 1)"> <path d="M0,8 L17.5,8"></path> <polyline points="4.338 13.628 15.628 13.628 15.628 2.338" stroke-linejoin="round" transform="rotate(-45 9.983 7.983)"></polyline> </g> </svg> </span> </figcaption> </a></figure>--}}
                {{--                </div>--}}

                {{--                <div class="col-md-3 py-2 px-4">--}}
                {{--                    <figure>--}}
                {{--                        <a class="city-tile" data-gtm-cta="findRestaurant_dhaka" href="/city/dhaka"><picture>--}}
                {{--                                <div class="city-picture b-lazy b-loaded" data-src="https://images.deliveryhero.io/image/fd-bd/city-title/city-title-Dhaka.jpg?width=720" style="background-image: url(&quot;https://images.deliveryhero.io/image/fd-bd/city-title/city-title-Dhaka.jpg?width=720&quot;);">--}}
                {{--                                    &nbsp;</div>--}}
                {{--                            </picture> <figcaption class="city-info"> <span class="city-name"> Dhaka </span> <span class="city-letter">5 Meter away</span> <span class="city-cta button city__called-action js-ripple"> <svg class="svg-stroke-container mr-4" height="18" viewBox="0 0 20 18" width="20" xmlns="http://www.w3.org/2000/svg"> <g fill="none" fill-rule="evenodd" stroke="#FFFFFF" stroke-linecap="round" stroke-width="2" transform="translate(1 1)"> <path d="M0,8 L17.5,8"></path> <polyline points="4.338 13.628 15.628 13.628 15.628 2.338" stroke-linejoin="round" transform="rotate(-45 9.983 7.983)"></polyline> </g> </svg> </span> </figcaption> </a></figure>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3 p-2">--}}
                {{--                    <figure>--}}
                {{--                        <a class="city-tile" data-gtm-cta="findRestaurant_dhaka" href="/city/dhaka"><picture>--}}
                {{--                                <div class="city-picture b-lazy b-loaded" data-src="https://images.deliveryhero.io/image/fd-bd/city-title/city-title-Dhaka.jpg?width=720" style="background-image: url(&quot;https://images.deliveryhero.io/image/fd-bd/city-title/city-title-Dhaka.jpg?width=720&quot;);">--}}
                {{--                                    &nbsp;</div>--}}
                {{--                            </picture> <figcaption class="city-info"> <span class="city-name"> Dhaka </span> <span class="city-letter">D</span> <span class="city-cta button city__called-action js-ripple"> <svg class="svg-stroke-container mr-4" height="18" viewBox="0 0 20 18" width="20" xmlns="http://www.w3.org/2000/svg"> <g fill="none" fill-rule="evenodd" stroke="#FFFFFF" stroke-linecap="round" stroke-width="2" transform="translate(1 1)"> <path d="M0,8 L17.5,8"></path> <polyline points="4.338 13.628 15.628 13.628 15.628 2.338" stroke-linejoin="round" transform="rotate(-45 9.983 7.983)"></polyline> </g> </svg> </span> </figcaption> </a></figure>--}}
                {{--                </div>--}}
            </div>
        </div>

        {{--        free delivery panel--}}
        {{--        <div class="ps-site-features">--}}
        {{--            <div class="ps-container">--}}
        {{--                <div class="ps-block--site-features">--}}
        {{--                    <div class="ps-block__item">--}}
        {{--                        <div class="ps-block__left"><i class="icon-rocket"></i></div>--}}
        {{--                        <div class="ps-block__right">--}}
        {{--                            <h4>Free Delivery</h4>--}}
        {{--                            <p>For all oders over $99</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="ps-block__item">--}}
        {{--                        <div class="ps-block__left"><i class="icon-sync"></i></div>--}}
        {{--                        <div class="ps-block__right">--}}
        {{--                            <h4>90 Days Return</h4>--}}
        {{--                            <p>If goods have problems</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="ps-block__item">--}}
        {{--                        <div class="ps-block__left"><i class="icon-credit-card"></i></div>--}}
        {{--                        <div class="ps-block__right">--}}
        {{--                            <h4>Secure Payment</h4>--}}
        {{--                            <p>100% secure payment</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="ps-block__item">--}}
        {{--                        <div class="ps-block__left"><i class="icon-bubbles"></i></div>--}}
        {{--                        <div class="ps-block__right">--}}
        {{--                            <h4>24/7 Support</h4>--}}
        {{--                            <p>Dedicated support</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="ps-block__item">--}}
        {{--                        <div class="ps-block__left"><i class="icon-gift"></i></div>--}}
        {{--                        <div class="ps-block__right">--}}
        {{--                            <h4>Gift Service</h4>--}}
        {{--                            <p>Support gift service</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        Deals of the day--}}
        {{--        <div class="ps-deal-of-day">--}}
        {{--            <div class="ps-container">--}}
        {{--                <div class="ps-section__header">--}}
        {{--                    <div class="ps-block--countdown-deal">--}}
        {{--                        <div class="ps-block__left">--}}
        {{--                            <h3>Deals of the day</h3>--}}
        {{--                        </div>--}}
        {{--                        <div class="ps-block__right">--}}
        {{--                            <figure>--}}
        {{--                                <figcaption>End in:</figcaption>--}}
        {{--                                <ul class="ps-countdown" data-time="July 21, 2021 15:37:25">--}}
        {{--                                    <li><span class="days"></span></li>--}}
        {{--                                    <li><span class="hours"></span></li>--}}
        {{--                                    <li><span class="minutes"></span></li>--}}
        {{--                                    <li><span class="seconds"></span></li>--}}
        {{--                                </ul>--}}
        {{--                            </figure>--}}
        {{--                        </div>--}}
        {{--                    </div><a href="#">View all</a>--}}
        {{--                </div>--}}
        {{--                @dd($products->photos)--}}
        {{--                <div class="ps-section__content">--}}
        {{--                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">--}}
        {{--                        @foreach($products as $product)--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge">-16%</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price sale">৳{{$product->unit_price}} <del>$670.00 </del><small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{ $product->name }}</a>--}}
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
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        @endforeach--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details')}}"><img src="{{asset('frontend/img/products/home/2.jpg')}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price">$101.99<small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details')}}">Aroma Rice Cooker</a>--}}
        {{--                                    <div class="ps-product__rating">--}}
        {{--                                        <select class="ps-rating" data-read-only="true">--}}
        {{--                                            <option value="1">1</option>--}}
        {{--                                            <option value="1">2</option>--}}
        {{--                                            <option value="1">3</option>--}}
        {{--                                            <option value="1">4</option>--}}
        {{--                                            <option value="2">5</option>--}}
        {{--                                        </select><span>01</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ps-product__progress-bar ps-progress" data-value="66">--}}
        {{--                                        <div class="ps-progress__value"><span></span></div>--}}
        {{--                                        <p>Sold:61</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details')}}"><img src="{{asset('frontend/img/products/home/3.jpg')}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge">-25%</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price sale">$42.00 <del>$60.00 </del><small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details')}}">Simple Plastice Chair In White Color</a>--}}
        {{--                                    <div class="ps-product__rating">--}}
        {{--                                        <select class="ps-rating" data-read-only="true">--}}
        {{--                                            <option value="1">1</option>--}}
        {{--                                            <option value="1">2</option>--}}
        {{--                                            <option value="1">3</option>--}}
        {{--                                            <option value="1">4</option>--}}
        {{--                                            <option value="2">5</option>--}}
        {{--                                        </select><span>02</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ps-product__progress-bar ps-progress" data-value="91">--}}
        {{--                                        <div class="ps-progress__value"><span></span></div>--}}
        {{--                                        <p>Sold:71</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details')}}"><img src="{{asset('frontend/img/products/home/4.jpg')}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price">$320.00<small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details')}}">Korea Fabric Chair In Brown Colorr</a>--}}
        {{--                                    <div class="ps-product__rating">--}}
        {{--                                        <select class="ps-rating" data-read-only="true">--}}
        {{--                                            <option value="1">1</option>--}}
        {{--                                            <option value="1">2</option>--}}
        {{--                                            <option value="1">3</option>--}}
        {{--                                            <option value="1">4</option>--}}
        {{--                                            <option value="2">5</option>--}}
        {{--                                        </select><span>01</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ps-product__progress-bar ps-progress" data-value="48">--}}
        {{--                                        <div class="ps-progress__value"><span></span></div>--}}
        {{--                                        <p>Sold:2</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details')}}"><img src="{{asset('frontend/img/products/home/5.jpg')}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price">$85.00<small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details')}}">Set 14-Piece Knife From KichiKit</a>--}}
        {{--                                    <div class="ps-product__rating">--}}
        {{--                                        <select class="ps-rating" data-read-only="true">--}}
        {{--                                            <option value="1">1</option>--}}
        {{--                                            <option value="1">2</option>--}}
        {{--                                            <option value="1">3</option>--}}
        {{--                                            <option value="1">4</option>--}}
        {{--                                            <option value="2">5</option>--}}
        {{--                                        </select><span>01</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ps-product__progress-bar ps-progress" data-value="59">--}}
        {{--                                        <div class="ps-progress__value"><span></span></div>--}}
        {{--                                        <p>Sold:82</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details')}}"><img src="{{asset('frontend/img/products/home/6.jpg')}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price">$92.00<small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details')}}">Magic Bullet NutriBullet Pro 900 Series Blender</a>--}}
        {{--                                    <div class="ps-product__rating">--}}
        {{--                                        <select class="ps-rating" data-read-only="true">--}}
        {{--                                            <option value="1">1</option>--}}
        {{--                                            <option value="1">2</option>--}}
        {{--                                            <option value="1">3</option>--}}
        {{--                                            <option value="1">4</option>--}}
        {{--                                            <option value="2">5</option>--}}
        {{--                                        </select><span>01</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ps-product__progress-bar ps-progress" data-value="49">--}}
        {{--                                        <div class="ps-progress__value"><span></span></div>--}}
        {{--                                        <p>Sold:37</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details')}}"><img src="{{asset('frontend/img/products/home/7.jpg')}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge">-46%</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price sale">$42.00 <del>$60.00 </del><small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details')}}">Letter Printed Cushion Cover Cotton</a>--}}
        {{--                                    <div class="ps-product__rating">--}}
        {{--                                        <select class="ps-rating" data-read-only="true">--}}
        {{--                                            <option value="1">1</option>--}}
        {{--                                            <option value="1">2</option>--}}
        {{--                                            <option value="1">3</option>--}}
        {{--                                            <option value="1">4</option>--}}
        {{--                                            <option value="2">5</option>--}}
        {{--                                        </select><span>02</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ps-product__progress-bar ps-progress" data-value="77">--}}
        {{--                                        <div class="ps-progress__value"><span></span></div>--}}
        {{--                                        <p>Sold:88</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="ps-product ps-product--inner">--}}
        {{--                            <div class="ps-product__thumbnail"><a href="{{route('product-details')}}"><img src="{{asset('frontend/img/products/home/7.jpg')}}" alt=""></a>--}}
        {{--                                <div class="ps-product__badge">-46%</div>--}}
        {{--                                <ul class="ps-product__actions">--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>--}}
        {{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
        {{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-product__container">--}}
        {{--                                <p class="ps-product__price sale">$42.00 <del>$60.00 </del><small>18% off</small></p>--}}
        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details')}}">Letter Printed Cushion Cover Cotton</a>--}}
        {{--                                    <div class="ps-product__rating">--}}
        {{--                                        <select class="ps-rating" data-read-only="true">--}}
        {{--                                            <option value="1">1</option>--}}
        {{--                                            <option value="1">2</option>--}}
        {{--                                            <option value="1">3</option>--}}
        {{--                                            <option value="1">4</option>--}}
        {{--                                            <option value="2">5</option>--}}
        {{--                                        </select><span>02</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ps-product__progress-bar ps-progress" data-value="73">--}}
        {{--                                        <div class="ps-progress__value"><span></span></div>--}}
        {{--                                        <p>Sold:50</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
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
                        @foreach($shops as $shop)
                            @php
                                $order = \App\Model\Order::where('shop_id',$shop->id)->count();
                            @endphp
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                                    <div class="ps-product--horizontal">
                                        <div class="ps-product__thumbnail"><a href="{{route('shop.details',$shop->slug)}}"><img src="{{url($shop->logo)}}" alt=""></a></div>
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
    <script>
        $(document).ready(function(){
            $('#loader').hide();
        })
    </script>
@endpush
