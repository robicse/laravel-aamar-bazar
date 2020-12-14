
<style>
    .bk-autocomplete-items{
        margin-top: 50px;
        border: 0px;
    }
</style>

<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="ps-container">
            <div class="header__left">
            </div>
            <div class="header__center">
                <div class="ps-form--quick-search" >
                    {{--                    <input type="text" class=" bksearch">--}}
                    {{--                    <div class="bklist">--}}
                    {{--                    </div>--}}
                    <input class="form-control bksearch m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">
                    <button class="ml-2 mr-1" style="border-radius: 4px;" onclick="geoLocationInit()"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
                    <button class="mx-1" style="border-radius: 4px;" id="find">Find</button>
                    <div class="ps-panel--search-result bklist ">
                        {{--                        <div class="ps-panel__content ">--}}
                        {{--                            <div class="ps-product ps-product--wide ps-product--search-result ">--}}
                        {{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 32GB</a>--}}
                        {{--                                    <p>;las</p>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            --}}{{--                            <div class="ps-product ps-product--wide ps-product--search-result">--}}
                        {{--                            --}}{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/arrivals/1.jpg')}}" alt=""></a></div>--}}
                        {{--                            --}}{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>--}}
                        {{--                            --}}{{--                                    <div class="ps-product__rating">--}}
                        {{--                            --}}{{--                                        <select class="ps-rating" data-read-only="true">--}}
                        {{--                            --}}{{--                                            <option value="1">1</option>--}}
                        {{--                            --}}{{--                                            <option value="1">2</option>--}}
                        {{--                            --}}{{--                                            <option value="1">3</option>--}}
                        {{--                            --}}{{--                                            <option value="1">4</option>--}}
                        {{--                            --}}{{--                                            <option value="2">5</option>--}}
                        {{--                            --}}{{--                                        </select><span></span>--}}
                        {{--                            --}}{{--                                    </div>--}}
                        {{--                            --}}{{--                                    <p class="ps-product__price">$1120.50</p>--}}
                        {{--                            --}}{{--                                </div>--}}
                        {{--                            --}}{{--                            </div>--}}
                        {{--                            --}}{{--                            <div class="ps-product ps-product--wide ps-product--search-result">--}}
                        {{--                            --}}{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/arrivals/1.jpg')}}" alt=""></a></div>--}}
                        {{--                            --}}{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 128GB</a>--}}
                        {{--                            --}}{{--                                    <div class="ps-product__rating">--}}
                        {{--                            --}}{{--                                        <select class="ps-rating" data-read-only="true">--}}
                        {{--                            --}}{{--                                            <option value="1">1</option>--}}
                        {{--                            --}}{{--                                            <option value="1">2</option>--}}
                        {{--                            --}}{{--                                            <option value="1">3</option>--}}
                        {{--                            --}}{{--                                            <option value="1">4</option>--}}
                        {{--                            --}}{{--                                            <option value="2">5</option>--}}
                        {{--                            --}}{{--                                        </select><span></span>--}}
                        {{--                            --}}{{--                                    </div>--}}
                        {{--                            --}}{{--                                    <p class="ps-product__price">$1220.50</p>--}}
                        {{--                            --}}{{--                                </div>--}}
                        {{--                            --}}{{--                            </div>--}}
                        {{--                            --}}{{--                            <div class="ps-product ps-product--wide ps-product--search-result">--}}
                        {{--                            --}}{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/arrivals/2.jpg')}}" alt=""></a></div>--}}
                        {{--                            --}}{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a>--}}
                        {{--                            --}}{{--                                    <div class="ps-product__rating">--}}
                        {{--                            --}}{{--                                        <select class="ps-rating" data-read-only="true">--}}
                        {{--                            --}}{{--                                            <option value="1">1</option>--}}
                        {{--                            --}}{{--                                            <option value="1">2</option>--}}
                        {{--                            --}}{{--                                            <option value="1">3</option>--}}
                        {{--                            --}}{{--                                            <option value="1">4</option>--}}
                        {{--                            --}}{{--                                            <option value="2">5</option>--}}
                        {{--                            --}}{{--                                        </select><span>01</span>--}}
                        {{--                            --}}{{--                                    </div>--}}
                        {{--                            --}}{{--                                    <p class="ps-product__price">$36.78 – $56.99</p>--}}
                        {{--                            --}}{{--                                </div>--}}
                        {{--                            --}}{{--                            </div>--}}
                        {{--                            --}}{{--                            <div class="ps-product ps-product--wide ps-product--search-result">--}}
                        {{--                            --}}{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/arrivals/3.jpg')}}" alt=""></a></div>--}}
                        {{--                            --}}{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a>--}}
                        {{--                            --}}{{--                                    <div class="ps-product__rating">--}}
                        {{--                            --}}{{--                                        <select class="ps-rating" data-read-only="true">--}}
                        {{--                            --}}{{--                                            <option value="1">1</option>--}}
                        {{--                            --}}{{--                                            <option value="1">2</option>--}}
                        {{--                            --}}{{--                                            <option value="1">3</option>--}}
                        {{--                            --}}{{--                                            <option value="1">4</option>--}}
                        {{--                            --}}{{--                                            <option value="2">5</option>--}}
                        {{--                            --}}{{--                                        </select><span>02</span>--}}
                        {{--                            --}}{{--                                    </div>--}}
                        {{--                            --}}{{--                                    <p class="ps-product__price">$125.30</p>--}}
                        {{--                            --}}{{--                                </div>--}}
                        {{--                            --}}{{--                            </div>--}}
                        {{--                            --}}{{--                            <div class="ps-product ps-product--wide ps-product--search-result">--}}
                        {{--                            --}}{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/arrivals/4.jpg')}}" alt=""></a></div>--}}
                        {{--                            --}}{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>--}}
                        {{--                            --}}{{--                                    <div class="ps-product__rating">--}}
                        {{--                            --}}{{--                                        <select class="ps-rating" data-read-only="true">--}}
                        {{--                            --}}{{--                                            <option value="1">1</option>--}}
                        {{--                            --}}{{--                                            <option value="1">2</option>--}}
                        {{--                            --}}{{--                                            <option value="1">3</option>--}}
                        {{--                            --}}{{--                                            <option value="1">4</option>--}}
                        {{--                            --}}{{--                                            <option value="2">5</option>--}}
                        {{--                            --}}{{--                                        </select><span>02</span>--}}
                        {{--                            --}}{{--                                    </div>--}}
                        {{--                            --}}{{--                                    <p class="ps-product__price">$55.30</p>--}}
                        {{--                            --}}{{--                                </div>--}}
                        {{--                            --}}{{--                            </div>--}}
                        {{--                            --}}{{--                            <div class="ps-product ps-product--wide ps-product--search-result">--}}
                        {{--                            --}}{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/arrivals/5.jpg')}}" alt=""></a></div>--}}
                        {{--                            --}}{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>--}}
                        {{--                            --}}{{--                                    <div class="ps-product__rating">--}}
                        {{--                            --}}{{--                                        <select class="ps-rating" data-read-only="true">--}}
                        {{--                            --}}{{--                                            <option value="1">1</option>--}}
                        {{--                            --}}{{--                                            <option value="1">2</option>--}}
                        {{--                            --}}{{--                                            <option value="1">3</option>--}}
                        {{--                            --}}{{--                                            <option value="1">4</option>--}}
                        {{--                            --}}{{--                                            <option value="2">5</option>--}}
                        {{--                            --}}{{--                                        </select><span>02</span>--}}
                        {{--                            --}}{{--                                    </div>--}}
                        {{--                            --}}{{--                                    <p class="ps-product__price sale">$41.27 <del>$52.99 </del></p>--}}
                        {{--                            --}}{{--                                </div>--}}
                        {{--                            --}}{{--                            </div>--}}
                        {{--                            --}}{{--                            <div class="ps-product ps-product--wide ps-product--search-result">--}}
                        {{--                            --}}{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/arrivals/6.jpg')}}" alt=""></a></div>--}}
                        {{--                            --}}{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>--}}
                        {{--                            --}}{{--                                    <div class="ps-product__rating">--}}
                        {{--                            --}}{{--                                        <select class="ps-rating" data-read-only="true">--}}
                        {{--                            --}}{{--                                            <option value="1">1</option>--}}
                        {{--                            --}}{{--                                            <option value="1">2</option>--}}
                        {{--                            --}}{{--                                            <option value="1">3</option>--}}
                        {{--                            --}}{{--                                            <option value="1">4</option>--}}
                        {{--                            --}}{{--                                            <option value="2">5</option>--}}
                        {{--                            --}}{{--                                        </select><span>01</span>--}}
                        {{--                            --}}{{--                                    </div>--}}
                        {{--                            --}}{{--                                    <p class="ps-product__price sale">$41.27 <del>$62.39 </del></p>--}}
                        {{--                            --}}{{--                                </div>--}}
                        {{--                            --}}{{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="ps-panel__footer text-center"><a href="shop-default.html">See all results</a></div>--}}
                    </div>
                </div>
            </div>
            <div class="header__right">
                <div class="header__actions"><a class="header__extra" href="#">
                        <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
                            <div class="ps-cart__content">
                                {{--                            <div class="ps-cart__items">--}}
                                {{--                                <div class="ps-product--cart-mobile">--}}
                                {{--                                    <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('frontend/img/products/clothing/7.jpg')}}" alt=""></a></div>--}}
                                {{--                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>--}}
                                {{--                                        <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="ps-product--cart-mobile">--}}
                                {{--                                    <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('frontend/img/products/clothing/5.jpg')}}" alt=""></a></div>--}}
                                {{--                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>--}}
                                {{--                                        <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                <div class="ps-cart__footer">
                                    <h3>Sub Total:<strong></strong></h3>
                                    <figure><a class="ps-btn" href="{{route('shopping-cart')}}">View Cart</a><a class="ps-btn" href="{{route('checkout')}}">Checkout</a></figure>
                                </div>
                            </div>
                        </div>
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"><i class="icon-user"></i></div>
                            <div class="ps-block__right"><a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}">Register</a></div>
                        </div>
                </div>
            </div>
        </div>
    </div>     </div>
        </div>
    </div>
    <div class="ps-search--mobile">
        <form class="ps-form--search-mobile" action="http://nouthemes.net/html/martfury/index.html" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
</header>
@push('js')
    <script src="{{asset('frontend/js/location/home_location.js')}}"></script>
@endpush
