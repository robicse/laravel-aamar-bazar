
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
{{--                <div class="menu--toggle">--}}
{{--                <div class=""><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat.png')}}" alt=""></a></div>--}}
{{--                </div>--}}
{{--                                <div class="menu--product-categories">--}}
{{--                                    <div class="navigation__left"><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat.png')}}" alt=""></a></div>--}}
{{--                                </div>--}}
                {{--                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>--}}
                {{--                    <div class="menu__content">--}}
                {{--                        @php--}}
                {{--                            $categories = \App\Model\Category::where('is_home',1)->latest()->get();--}}
                {{--                        @endphp--}}
                {{--                        <ul class="menu--dropdown">--}}
                {{--                            --}}{{--                            <li class="current-menu-item "><a href="#"><i class="icon-star"></i> Hot Promotions</a>--}}
                {{--                            --}}{{--                            </li>--}}
                {{--                            @foreach($categories as $cat)--}}
                {{--                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon">--}}
                {{--                                            <img src="{{ asset('uploads/categories/'.$cat->icon) }}">--}}
                {{--                                        </i>{{ $cat->name }}</a>--}}
                {{--                                    <div class="mega-menu">--}}
                {{--                                        <div class="mega-menu__column">--}}
                {{--                                            <h4>{{ $cat->name }}<span class="sub-toggle"></span></h4>--}}
                {{--                                            @php--}}
                {{--                                                $subcategories = \App\Model\Subcategory::all();--}}
                {{--                                            @endphp--}}
                {{--                                            <ul class="mega-menu__list">--}}
                {{--                                                @foreach($subcategories as $subCat)--}}
                {{--                                                    <li class="current-menu-item "><a href="#">{{$subCat->name}}</a>--}}
                {{--                                                    </li>--}}
                {{--                                                @endforeach--}}
                {{--                                            </ul>--}}
                {{--                                        </div>--}}
                {{--                                        --}}{{--                                    <div class="mega-menu__column">--}}
                {{--                                        --}}{{--                                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>--}}
                {{--                                        --}}{{--                                        <ul class="mega-menu__list">--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Digital Cables</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Audio &amp; Video Cables</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Batteries</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                        </ul>--}}
                {{--                                        --}}{{--                                    </div>--}}
                {{--                                    </div>--}}
                {{--                                </li>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo_light.png')}}" alt=""></a>--}}
                {{--                <a class="ps-logo" href="{{url('/')}}"><h2 class="font-weight-light">Mudi <span class="text-capitalize text-secondary">Hat</span></h2></a>--}}

                {{--               <div class="menu--product-categories">--}}
                {{--                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>--}}
                {{--                    <div class="menu__content">--}}
                {{--                        @php--}}
                {{--                            $categories = \App\Model\Category::where('is_home',1)->latest()->get();--}}
                {{--                        @endphp--}}
                {{--                        <ul class="menu--dropdown">--}}
                {{--                            --}}{{--                            <li class="current-menu-item "><a href="#"><i class="icon-star"></i> Hot Promotions</a>--}}
                {{--                            --}}{{--                            </li>--}}

                {{--                            @foreach($categories as $cat)--}}
                {{--                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon">--}}
                {{--                                            <img src="{{ asset('uploads/categories/'.$cat->icon) }}">--}}
                {{--                                        </i>{{ $cat->name }}</a>--}}
                {{--                                    <div class="mega-menu">--}}
                {{--                                        <div class="mega-menu__column">--}}
                {{--                                            <h4>{{ $cat->name }}<span class="sub-toggle"></span></h4>--}}
                {{--                                            @php--}}
                {{--                                                $subcategories = \App\Model\Subcategory::where('category_id',$cat->id)->latest()->get();--}}
                {{--                                            @endphp--}}
                {{--                                            <ul class="mega-menu__list">--}}
                {{--                                                @foreach($subcategories as $subCat)--}}
                {{--                                                    <li class="current-menu-item "><a href="#">{{$subCat->name}}</a>--}}
                {{--                                                    </li>--}}
                {{--                                                @endforeach--}}
                {{--                                            </ul>--}}
                {{--                                        </div>--}}
                {{--                                        --}}{{--                                    <div class="mega-menu__column">--}}
                {{--                                        --}}{{--                                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>--}}
                {{--                                        --}}{{--                                        <ul class="mega-menu__list">--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Digital Cables</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Audio &amp; Video Cables</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Batteries</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                        </ul>--}}
                {{--                                        --}}{{--                                    </div>--}}
                {{--                                    </div>--}}
                {{--                                </li>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo_light.png')}}" alt=""></a>--}}
                {{--                <a class="ps-logo" href="{{url('/')}}"><h2 class="font-weight-light">Mudi <span class="text-capitalize text-secondary">Hat</span></h2></a>--}}
                {{--                <div class="menu--product-categories">--}}
                {{--                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>--}}
                {{--                    <div class="menu__content">--}}
                {{--                        @php--}}
                {{--                            $categories = \App\Model\Category::where('is_home',1)->latest()->get();--}}
                {{--                        @endphp--}}
                {{--                        <ul class="menu--dropdown">--}}
                {{--                            --}}{{--                            <li class="current-menu-item "><a href="#"><i class="icon-star"></i> Hot Promotions</a>--}}
                {{--                            --}}{{--                            </li>--}}
                {{--                            @foreach($categories as $cat)--}}
                {{--                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon">--}}
                {{--                                            <img src="{{ asset('uploads/categories/'.$cat->icon) }}">--}}
                {{--                                        </i>{{ $cat->name }}</a>--}}
                {{--                                    <div class="mega-menu">--}}
                {{--                                        <div class="mega-menu__column">--}}
                {{--                                            <h4>{{ $cat->name }}<span class="sub-toggle"></span></h4>--}}
                {{--                                            @php--}}
                {{--                                                $subcategories = \App\Model\Subcategory::all();--}}
                {{--                                            @endphp--}}
                {{--                                            <ul class="mega-menu__list">--}}
                {{--                                                @foreach($subcategories as $subCat)--}}
                {{--                                                    <li class="current-menu-item "><a href="#">{{$subCat->name}}</a>--}}
                {{--                                                    </li>--}}
                {{--                                                @endforeach--}}
                {{--                                            </ul>--}}
                {{--                                        </div>--}}
                {{--                                        --}}{{--                                    <div class="mega-menu__column">--}}
                {{--                                        --}}{{--                                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>--}}
                {{--                                        --}}{{--                                        <ul class="mega-menu__list">--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Digital Cables</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Audio &amp; Video Cables</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                            <li class="current-menu-item "><a href="#">Batteries</a>--}}
                {{--                                        --}}{{--                                            </li>--}}
                {{--                                        --}}{{--                                        </ul>--}}
                {{--                                        --}}{{--                                    </div>--}}
                {{--                                    </div>--}}
                {{--                                </li>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo_light.png')}}" alt=""></a>--}}
                {{--                <a class="ps-logo" href="{{url('/')}}"><h2 class="font-weight-light">Mudi <span class="text-capitalize text-secondary">Hat</span></h2></a>--}}
{{--                <a class="" href="{{url('/')}}"><h2 class="font-weight-light">Mudi <span class="text-capitalize text-secondary">Hat</span></h2></a>--}}
                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat.png')}}" alt=""></a>
            </div>
            <div class="header__center">
                <div class="ps-form--quick-search" >
                    {{--                    <input type="text" class=" bksearch">--}}
                    {{--                    <div class="bklist">--}}
                    {{--                    </div>--}}
                    @if(Request::is('be-a-seller'))
                        <input class="form-control m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">
                    @else
                        <input class="form-control bksearch m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">
                    @endif
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
                        <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i class="cart_count">{{Cart::count()}}</i></span></a>
                            <div class="ps-cart__content">
                                <div class="ps-cart__items cart_item">
                                    {{--                                    @forelse(Cart::content() as $product)--}}
                                    {{--                                        <div class="ps-product--cart-mobile">--}}
                                    {{--                                            <div class="ps-product__thumbnail"><a href="#"><img src="{{asset($product->options->image)}}" alt=""></a></div>--}}
                                    {{--                                            <div class="ps-product__content"><a class="ps-product__remove" href="{{route('product.cart.remove',$product->rowId)}}"><i class="icon-cross"></i></a><a href="#">{{$product->name}}</a>--}}
                                    {{--                                                <p><small>{{$product->qty}} x {{$product->price}}</small>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    @empty--}}
                                    {{--                                        <div class="ps-product--cart-mobile text-center text-danger">--}}
                                    {{--                                            <div class="row">--}}
                                    {{--                                                <div class="col-md-12">--}}
                                    {{--                                                    <i class="fa fa-shopping-basket fa-4x mb-2" aria-hidden="true"></i>--}}
                                    {{--                                                    <h3>Empty Cart</h3>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    @endforelse--}}
                                    @foreach(Cart::content() as $product)
                                        <div class="ps-product--cart-mobile">
                                            <div class="ps-product__thumbnail"><a href="#"><img src="{{asset($product->options->image)}}" alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__remove" href="{{route('product.cart.remove',$product->rowId)}}"><i class="icon-cross"></i></a><a href="#">{{$product->name}}</a>
                                                <p><small>{{$product->qty}} x ৳{{$product->price}}</small>
                                            </div>
                                            <p>Sold By:<strong> {{$product->options->shop_name}}</strong></p>
                                        </div>
                                    @endforeach
                                    {{--                                        <div class="ps-product--cart-mobile">--}}
                                    {{--                                            <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('frontend/img/products/clothing/5.jpg')}}" alt=""></a></div>--}}
                                    {{--                                            <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>--}}
                                    {{--                                                <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                </div>

                                <div class="ps-cart__footer">
                                    <h3>Sub Total:<strong class="subTotal">{{Cart::subtotal()}}</strong></h3>
                                    <figure><a class="ps-btn" href="{{route('shopping-cart')}}">Cart</a><a class="ps-btn" href="{{route('checkout')}}">Checkout</a><a class="ps-btn" href="{{route('product.clear.cart')}}">Clear</a></figure>
                                </div>

                            </div>
                        </div>
                        {{--                        <div class="ps-block--user-header">--}}
                        {{--                            <div class="ps-block__left"><i class="icon-user"></i></div>--}}
                        {{--                            <div class="ps-block__right"><a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}">Register</a></div>--}}
                        {{--                        </div>--}}
                        @if(Auth::guest())
                            <div class="ps-block--user-header">
                                <div class="ps-block__left"><i class="icon-user"></i></div>
                                <div class="ps-block__right"><a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}">Register</a></div>
                            </div>
                        @else
                            <div class="ps-block--user-header">
                                <div class="ps-widget__header">
                                    <div class="ps-block__left">
                                        @if(is_null(Auth::user()->avatar))
                                          <a href="{{route('login')}}">  <img src="{{asset('uploads/profile/default.png')}}" alt="" class="ps-widget-img rounded-circle" width="50" height="50"></a>
                                        @else
                                           <a href="{{route('login')}}"> <img src="{{url(Auth::user()->avatar)}}" alt="" class="ps-widget-img rounded-circle" width="50" height="50"></a>
                                        @endif
                                            <div class="ps-block__right"><a href="{{route('login')}}">{{Auth::user()->name}}</a>
{{--                                                <a href="{{ route('logout') }}">Logout</a>--}}
                                                <form action = "{{route('logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-lg btn-bold">Logout</button>
                                                </form>
                                            </div>

                                    </div>
                                    {{--                                    <img src="{{url(Auth::user()->avatar)}}" alt="User Image" class="ps-avatar-img ps-rounded-circle">--}}
{{--                                    <div class="ps-block__right">--}}
{{--                                        <a href="{{ route('login') }}">{{Auth::user()->name}}</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="ps-block__right">--}}
{{--                                        <a href="">Logout</a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="ps-container">
{{--            <div class="navigation__left">--}}
{{--                <div class="menu--product-categories">--}}
{{--                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>--}}
{{--                    <div class="menu__content">--}}
{{--                        @php--}}
{{--                            $categories = \App\Model\Category::where('is_home',1)->latest()->get();--}}
{{--                        @endphp--}}
{{--                        <ul class="menu--dropdown">--}}
{{--                            @foreach($categories as $cat)--}}
{{--                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon">--}}
{{--                                            <img src="{{ asset('uploads/categories/'.$cat->icon) }}">--}}
{{--                                        </i>{{ $cat->name }}</a>--}}
{{--                                    <div class="mega-menu">--}}
{{--                                        <div class="mega-menu__column">--}}
{{--                                            <h4>{{ $cat->name }}<span class="sub-toggle"></span></h4>--}}
{{--                                            @php--}}
{{--                                                $subcategories = \App\Model\Subcategory::where('category_id',$cat->id)->latest()->get();--}}
{{--                                            @endphp--}}
{{--                                            <ul class="mega-menu__list">--}}
{{--                                                @foreach($subcategories as $subCat)--}}
{{--                                                    <li class="current-menu-item "><a href="#">{{$subCat->name}}</a>--}}
{{--                                                    </li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="navigation__right">

{{--                <ul class="menu">--}}
{{--                    <li class="menu-item"><a href="{{url('/')}}">Home</a>--}}
{{--                    </li>--}}
{{--                    <li class="menu-item has-mega-menu"><a href="{{route('vendor.list')}}">Shop</a><span class="sub-toggle"></span>--}}
{{--                    </li>--}}
{{--                    <li class="menu-item has-mega-menu"><a href="{{route('about-us')}}">About Us</a>--}}
{{--                    <li class="menu-item has-mega-menu"><a href="{{route('blog-list')}}">Blogs</a>--}}
{{--                    <li class="menu-item has-mega-menu"><a href="{{route('contact')}}">Contact Us</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

    {{--    <nav class="navigation">--}}
    {{--        <div class="ps-container">--}}
    {{--            <div class="navigation__left">--}}
    {{--                <div class="menu--product-categories">--}}
    {{--                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>--}}
    {{--                    <div class="menu__content">--}}
    {{--                        @php--}}
    {{--                        $categories = \App\Model\Category::where('is_home',1)->latest()->get();--}}
    {{--                        @endphp--}}
    {{--                        <ul class="menu--dropdown">--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-star"></i> Hot Promotions</a>--}}
    {{--                            </li>--}}
    {{--                            @foreach($categories as $cat)--}}
    {{--                            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon">--}}
    {{--                                        <img src="{{ asset('uploads/categories/'.$cat->icon) }}">--}}
    {{--                                    </i>{{ $cat->name }}</a>--}}
    {{--                                <div class="mega-menu">--}}
    {{--                                    <div class="mega-menu__column">--}}
    {{--                                        <h4>{{ $cat->name }}<span class="sub-toggle"></span></h4>--}}
    {{--                                        @php--}}
    {{--                                        $subcategories = \App\Model\Subcategory::all();--}}
    {{--                                        @endphp--}}
    {{--                                        <ul class="mega-menu__list">--}}
    {{--                                            @foreach($subcategories as $subCat)--}}
    {{--                                            <li class="current-menu-item "><a href="#">{{$subCat->name}}</a>--}}
    {{--                                            </li>--}}
    {{--                                            @endforeach--}}
    {{--                                        </ul>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="mega-menu__column">--}}
    {{--                                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>--}}
    {{--                                        <ul class="mega-menu__list">--}}
    {{--                                            <li class="current-menu-item "><a href="#">Digital Cables</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Audio &amp; Video Cables</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Batteries</a>--}}
    {{--                                            </li>--}}
    {{--                                        </ul>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                            @endforeach--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-shirt"></i> Clothing &amp; Apparel</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-lampshade"></i> Home, Garden &amp; Kitchen</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-heart-pulse"></i> Health &amp; Beauty</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-diamond2"></i> Yewelry &amp; Watches</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon-desktop"></i> Computer &amp; Technology</a>--}}
    {{--                                <div class="mega-menu">--}}
    {{--                                    <div class="mega-menu__column">--}}
    {{--                                        <h4>Computer &amp; Technologies<span class="sub-toggle"></span></h4>--}}
    {{--                                        <ul class="mega-menu__list">--}}
    {{--                                            <li class="current-menu-item "><a href="#">Computer &amp; Tablets</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Laptop</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Monitors</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Networking</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Drive &amp; Storages</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Computer Components</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Security &amp; Protection</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Gaming Laptop</a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="current-menu-item "><a href="#">Accessories</a>--}}
    {{--                                            </li>--}}
    {{--                                        </ul>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-baby-bottle"></i> Babies &amp; Moms</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-baseball"></i> Sport &amp; Outdoor</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-smartphone"></i> Phones &amp; Accessories</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-book2"></i> Books &amp; Office</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-car-siren"></i> Cars &amp; Motocycles</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-wrench"></i> Home Improments</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="current-menu-item "><a href="#"><i class="icon-tag"></i> Vouchers &amp; Services</a>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="navigation__right">--}}
    {{--                <ul class="menu">--}}
    {{--                    <li class="menu-item"><a href="{{url('/')}}">Home</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="menu-item has-mega-menu"><a href="{{route('shop')}}">Shop</a><span class="sub-toggle"></span>--}}
    {{--                        <div class="mega-menu">--}}
    {{--                            <div class="mega-menu__column">--}}
    {{--                                <h4>Catalog Pages<span class="sub-toggle"></span></h4>--}}
    {{--                                <ul class="mega-menu__list">--}}
    {{--                                    <li class="current-menu-item "><a href="shop-default.html">Shop Default</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="shop-default.html">Shop Fullwidth</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="shop-categories.html">Shop Categories</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="shop-sidebar.html">Shop Sidebar</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="shop-sidebar-without-banner.html">Shop Without Banner</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="shop-carousel.html">Shop Carousel</a>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <div class="mega-menu__column">--}}
    {{--                                <h4>Product Layout<span class="sub-toggle"></span></h4>--}}
    {{--                                <ul class="mega-menu__list">--}}
    {{--                                    <li class="current-menu-item "><a href="product-default.html">Default</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-extend.html">Extended</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-full-content.html">Full Content</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-box.html">Boxed</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-sidebar.html">Sidebar</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-default.html">Fullwidth</a>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <div class="mega-menu__column">--}}
    {{--                                <h4>Product Types<span class="sub-toggle"></span></h4>--}}
    {{--                                <ul class="mega-menu__list">--}}
    {{--                                    <li class="current-menu-item "><a href="product-default.html">Simple</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-default.html">Color Swatches</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-image-swatches.html">Images Swatches</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-countdown.html">Countdown</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-multi-vendor.html">Multi-Vendor</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-instagram.html">Instagram</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-affiliate.html">Affiliate</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-on-sale.html">On sale</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-video.html">Video Featured</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-groupped.html">Grouped</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="product-out-stock.html">Out Of Stock</a>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <div class="mega-menu__column">--}}
    {{--                                <h4>Woo Pages<span class="sub-toggle"></span></h4>--}}
    {{--                                <ul class="mega-menu__list">--}}
    {{--                                    <li class="current-menu-item "><a href="shopping-cart.html">Shopping Cart</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="checkout.html">Checkout</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="whishlist.html">Whishlist</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="compare.html">Compare</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="order-tracking.html">Order Tracking</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="my-account.html">My Account</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="checkout-2.html">Checkout 2</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="shipping.html">Shipping</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="payment.html">Payment</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="payment-success.html">Payment Success</a>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li class="menu-item-has-children has-mega-menu"><a href="#">Pages</a><span class="sub-toggle"></span>--}}
    {{--                        <div class="mega-menu">--}}
    {{--                            <div class="mega-menu__column">--}}
    {{--                                <h4>Basic Page<span class="sub-toggle"></span></h4>--}}
    {{--                                <ul class="mega-menu__list">--}}
    {{--                                    <li class="current-menu-item "><a href="{{route('about-us')}}">About Us</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="{{route('contact')}}">Contact</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="faqs.html">Faqs</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="comming-soon.html">Comming Soon</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="404-page.html">404 Page</a>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <div class="mega-menu__column">--}}
    {{--                                <h4>Vendor Pages<span class="sub-toggle"></span></h4>--}}
    {{--                                <ul class="mega-menu__list">--}}
    {{--                                    <li class="current-menu-item "><a href="{{route('become-vendor')}}">Become a Vendor</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="{{route('vendor-store')}}">Vendor Store</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="vendor-dashboard-free.html">Vendor Dashboard Free</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="vendor-dashboard-pro.html">Vendor Dashboard Pro</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="store-list.html">Store List</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="store-list.html">Store List 2</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="store-detail.html">Store Detail</a>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <div class="mega-menu__column">--}}
    {{--                                <h4>Account Pages<span class="sub-toggle"></span></h4>--}}
    {{--                                <ul class="mega-menu__list">--}}
    {{--                                    <li class="current-menu-item "><a href="user-information.html">User Information</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="addresses.html">Addresses</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="invoices.html">Invoices</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="invoice-detail.html">Invoice Detail</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="current-menu-item "><a href="notifications.html">Notifications</a>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li class="menu-item has-mega-menu"><a href="{{route('about-us')}}">About Us</a>--}}
    {{--                    <li class="menu-item has-mega-menu"><a href="{{route('blog-list')}}">Blogs</a>--}}
    {{--                    <li class="menu-item has-mega-menu"><a href="{{route('contact')}}">Contact Us</a>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </nav>--}}
</header>
<header class="header header--mobile" data-sticky="true">
    <div class="header__top">
        <div class="header__left">
            <p></p>
        </div>
    </div>
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat.png')}}" alt=""></a></div>
        <div class="navigation__right">
            <div class="header__actions">
                <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i class="cart_count">0</i></span></a>
                    <div class="ps-cart__content">
                        <div class="ps-cart__items">
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('frontend/img/products/clothing/7.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                    <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>
                                </div>
                            </div>
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('frontend/img/products/clothing/5.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                    <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>
                                </div>
                            </div>
                        </div>
                        <div class="ps-cart__footer">
                            <h3>Sub Total:<strong>$59.99</strong></h3>
                            <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                        </div>
                    </div>
                </div>
                @if(Auth::guest())
                <div class="ps-block--user-header">
                    <div class="ps-block__left"><i class="icon-user"></i></div>
                    <div class="ps-block__right"><a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}">Register</a></div>
                </div>
                @else
                    <div class="ps-block--user-header">
                        <div class="ps-widget__header">
                            <div class="ps-block__left">
                                @if(is_null(Auth::user()->avatar))
                                    <a href="{{route('login')}}">  <img src="{{asset('uploads/profile/default.png')}}" alt="" class="ps-widget-img rounded-circle" width="30" height="30"></a>
                                @else
                                    <a href="{{route('login')}}"> <img src="{{url(Auth::user()->avatar)}}" alt="" class="ps-widget-img rounded-circle" width="30" height="30"></a>
                                @endif
                                <div class="ps-block__right"><a href="{{route('login')}}">{{Auth::user()->name}}</a>
                                    {{--                                                <a href="{{ route('logout') }}">Logout</a>--}}
                                    <form action = "{{route('logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-lg btn-bold">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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
<div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
        <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
        <div class="ps-cart--mobile">
            <div class="ps-cart__content">
                <div class="ps-product--cart-mobile">
                    <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt=""></a></div>
                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                        <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>
                    </div>
                </div>
            </div>
            <div class="ps-cart__footer">
                <h3>Sub Total:<strong>$59.99</strong></h3>
                <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
            </div>
        </div>
    </div>
</div>
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Categories</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li class="current-menu-item "><a href="#">Hot Promotions</a>
            </li>
            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#">Consumer Electronic</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Electronic<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="#">Home Audio &amp; Theathers</a>
                            </li>
                            <li class="current-menu-item "><a href="#">TV &amp; Videos</a>
                            </li>
{{--                            <li class="current-menu-item "><a href="#">Camera, Photos &amp; Videos</a>--}}
{{--                            </li>--}}
{{--                            <li class="current-menu-item "><a href="#">Cellphones &amp; Accessories</a>--}}
{{--                            </li>--}}
{{--                            <li class="current-menu-item "><a href="#">Headphones</a>--}}
{{--                            </li>--}}
{{--                            <li class="current-menu-item "><a href="#">Videosgames</a>--}}
{{--                            </li>--}}
{{--                            <li class="current-menu-item "><a href="#">Wireless Speakers</a>--}}
{{--                            </li>--}}
{{--                            <li class="current-menu-item "><a href="#">Office Electronic</a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="#">Digital Cables</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Audio &amp; Video Cables</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Batteries</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="current-menu-item "><a href="#">Clothing &amp; Apparel</a>
            </li>
            <li class="current-menu-item "><a href="#">Home, Garden &amp; Kitchen</a>
            </li>
            <li class="current-menu-item "><a href="#">Health &amp; Beauty</a>
            </li>
            <li class="current-menu-item "><a href="#">Yewelry &amp; Watches</a>
            </li>
            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#">Computer &amp; Technology</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Computer &amp; Technologies<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="#">Computer &amp; Tablets</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Laptop</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Monitors</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Networking</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Drive &amp; Storages</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Computer Components</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Security &amp; Protection</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Gaming Laptop</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Accessories</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="current-menu-item "><a href="#">Babies &amp; Moms</a>
            </li>
            <li class="current-menu-item "><a href="#">Sport &amp; Outdoor</a>
            </li>
            <li class="current-menu-item "><a href="#">Phones &amp; Accessories</a>
            </li>
            <li class="current-menu-item "><a href="#">Books &amp; Office</a>
            </li>
            <li class="current-menu-item "><a href="#">Cars &amp; Motocycles</a>
            </li>
            <li class="current-menu-item "><a href="#">Home Improments</a>
            </li>
            <li class="current-menu-item "><a href="#">Vouchers &amp; Services</a>
            </li>
        </ul>
    </div>
</div>
<div class="navigation--list">
    <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="http://nouthemes.net/html/martfury/index.html" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
    <div class="navigation__content"></div>
</div>
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li class="menu-item-has-children"><a href="index.html">Home</a><span class="sub-toggle"></span>
                <ul class="sub-menu">
                    <li class="current-menu-item "><a href="index.html">Marketplace Full Width</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-2.html">Home Auto Parts</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-10.html">Home Technology</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-9.html">Home Organic</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-3.html">Home Marketplace V1</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-4.html">Home Marketplace V2</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-5.html">Home Marketplace V3</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-6.html">Home Marketplace V4</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-7.html">Home Electronic</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-8.html">Home Furniture</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-kids.html">Home Kids</a>
                    </li>
                    <li class="current-menu-item "><a href="homepage-photo-and-video.html">Home photo and picture</a>
                    </li>
                    <li class="current-menu-item "><a href="home-medical.html">Home Medical</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children has-mega-menu"><a href="shop-default.html">Shop</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Catalog Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="shop-default.html">Shop Default</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-default.html">Shop Fullwidth</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-categories.html">Shop Categories</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-sidebar.html">Shop Sidebar</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-sidebar-without-banner.html">Shop Without Banner</a>
                            </li>
                            <li class="current-menu-item "><a href="shop-carousel.html">Shop Carousel</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Product Layout<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="product-default.html">Default</a>
                            </li>
                            <li class="current-menu-item "><a href="product-extend.html">Extended</a>
                            </li>
                            <li class="current-menu-item "><a href="product-full-content.html">Full Content</a>
                            </li>
                            <li class="current-menu-item "><a href="product-box.html">Boxed</a>
                            </li>
                            <li class="current-menu-item "><a href="product-sidebar.html">Sidebar</a>
                            </li>
                            <li class="current-menu-item "><a href="product-default.html">Fullwidth</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Product Types<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="product-default.html">Simple</a>
                            </li>
                            <li class="current-menu-item "><a href="product-default.html">Color Swatches</a>
                            </li>
                            <li class="current-menu-item "><a href="product-image-swatches.html">Images Swatches</a>
                            </li>
                            <li class="current-menu-item "><a href="product-countdown.html">Countdown</a>
                            </li>
                            <li class="current-menu-item "><a href="product-multi-vendor.html">Multi-Vendor</a>
                            </li>
                            <li class="current-menu-item "><a href="product-instagram.html">Instagram</a>
                            </li>
                            <li class="current-menu-item "><a href="product-affiliate.html">Affiliate</a>
                            </li>
                            <li class="current-menu-item "><a href="product-on-sale.html">On sale</a>
                            </li>
                            <li class="current-menu-item "><a href="product-video.html">Video Featured</a>
                            </li>
                            <li class="current-menu-item "><a href="product-groupped.html">Grouped</a>
                            </li>
                            <li class="current-menu-item "><a href="product-out-stock.html">Out Of Stock</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Woo Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="shopping-cart.html">Shopping Cart</a>
                            </li>
                            <li class="current-menu-item "><a href="checkout.html">Checkout</a>
                            </li>
                            <li class="current-menu-item "><a href="whishlist.html">Whishlist</a>
                            </li>
                            <li class="current-menu-item "><a href="compare.html">Compare</a>
                            </li>
                            <li class="current-menu-item "><a href="order-tracking.html">Order Tracking</a>
                            </li>
                            <li class="current-menu-item "><a href="my-account.html">My Account</a>
                            </li>
                            <li class="current-menu-item "><a href="checkout-2.html">Checkout 2</a>
                            </li>
                            <li class="current-menu-item "><a href="shipping.html">Shipping</a>
                            </li>
                            <li class="current-menu-item "><a href="payment.html">Payment</a>
                            </li>
                            <li class="current-menu-item "><a href="payment-success.html">Payment Success</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item-has-children has-mega-menu"><a href="#">Pages</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Basic Page<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="about-us.html">About Us</a>
                            </li>
                            <li class="current-menu-item "><a href="contact-us.html">Contact</a>
                            </li>
                            <li class="current-menu-item "><a href="faqs.html">Faqs</a>
                            </li>
                            <li class="current-menu-item "><a href="comming-soon.html">Comming Soon</a>
                            </li>
                            <li class="current-menu-item "><a href="404-page.html">404 Page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Vendor Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="become-a-vendor.html">Become a Vendor</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-store.html">Vendor Store</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-dashboard-free.html">Vendor Dashboard Free</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-dashboard-pro.html">Vendor Dashboard Pro</a>
                            </li>
                            <li class="current-menu-item "><a href="store-list.html">Store List</a>
                            </li>
                            <li class="current-menu-item "><a href="store-list.html">Store List 2</a>
                            </li>
                            <li class="current-menu-item "><a href="store-detail.html">Store Detail</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Account Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="user-information.html">User Information</a>
                            </li>
                            <li class="current-menu-item "><a href="addresses.html">Addresses</a>
                            </li>
                            <li class="current-menu-item "><a href="invoices.html">Invoices</a>
                            </li>
                            <li class="current-menu-item "><a href="invoice-detail.html">Invoice Detail</a>
                            </li>
                            <li class="current-menu-item "><a href="notifications.html">Notifications</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item-has-children has-mega-menu"><a href="#">Blogs</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Blog Layout<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="blog-grid.html">Grid</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-list.html">Listing</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-small-thumb.html">Small Thumb</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-left-sidebar.html">Left Sidebar</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-right-sidebar.html">Right Sidebar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Single Blog<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="blog-detail.html">Single 1</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-2.html">Single 2</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-3.html">Single 3</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-4.html">Single 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
@push('js')
    <script src="{{asset('frontend/js/location/home_location.js')}}"></script>
@endpush
