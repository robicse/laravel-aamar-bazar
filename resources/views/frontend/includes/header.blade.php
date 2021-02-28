
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
                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat-final.png')}}" alt="" width="200" height="90"></a>
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
                    <button class="mx-1" style="border-radius: 4px;"  title="Find in map" onclick="mapModalClick()"><i class="fa fa-map"></i></button>
                    <div class="ps-panel--search-result bklist ">
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
                                            <div class="ps-product__thumbnail"><a href="#"><img src="{{url($product->options->image)}}" alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__remove" href="{{route('product.cart.remove',$product->rowId)}}"><i class="icon-cross"></i></a><a href="#">{{$product->name}}</a>
                                                <p><small>{{$product->qty}} x ৳{{$product->price}}</small>
                                            </div>
                                            <p>Sold By:<strong> {{$product->options->shop_name}}</strong></p>
                                        </div>
                                    @endforeach
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
                                        @if(is_null(Auth::user()->avatar_original))
                                          <a href="{{route('login')}}">  <img src="{{asset('uploads/profile/default.png')}}" alt="" class="ps-widget-img rounded-circle" width="50" height="50"></a>
                                        @else
                                           <a href="{{route('login')}}"> <img src="{{url(Auth::user()->avatar_original)}}" alt="" class="ps-widget-img rounded-circle" width="50" height="50"></a>
                                        @endif
{{--                                            @php--}}
{{--                                                $values = explode(" ",Auth::user()->name);--}}
{{--                                            @endphp--}}
                                            <div class="ps-block__right"><a href="{{route('login')}}" data-toggle="tooltip" title="{{Auth::user()->name}}">{!! Str::limit(Auth::user()->name,7) !!}</a>
                                                <form action = "{{route('logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-lg btn-bold p-0">Logout</button>
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
            <div class="navigation__right">
</header>
<header class="header header--mobile" data-sticky="true">
    <div class="navigation--mobile" style="background: #fcb800;">
        <div class="navigation__left"><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat-final.png')}}" alt="" width="156" height="45"></a></div>
        <div class="navigation__right">
            <div class="header__actions" style="margin-left: -100px;">
                <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>{{Cart::count()}}</i></span></a>
                    <div class="ps-cart__content">
                        <div class="ps-cart__items">
                            @foreach(Cart::content() as $product)
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img src="{{url($product->options->image)}}" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="{{route('product.cart.remove',$product->rowId)}}"><i class="icon-cross"></i></a><a href="#">{{$product->name}}</a>
                                        <p><small>{{$product->qty}} x ৳{{$product->price}}</small>
                                    </div>
                                    <p>Sold By:<strong> {{$product->options->shop_name}}</strong></p>
                                </div>
                            @endforeach
                        </div>
{{--                        <div class="ps-cart__footer">--}}
{{--                            <h3>Sub Total:<strong>$59.99</strong></h3>--}}
{{--                            <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>--}}
{{--                        </div>--}}
                        <div class="ps-cart__footer">
                            <h3>Sub Total:<strong class="subTotal">{{Cart::subtotal()}}</strong></h3>
                            <figure><a class="ps-btn" href="{{route('shopping-cart')}}">Cart</a><a class="ps-btn" href="{{route('checkout')}}">Checkout</a><a class="ps-btn" href="{{route('product.clear.cart')}}">Clear</a></figure>
                        </div>
                    </div>
                </div>
{{--                @if(Auth::guest())--}}
{{--                <div class="ps-block--user-header">--}}
{{--                    <div class="ps-block__left"><i class="icon-user"></i></div>--}}
{{--                    <div class="ps-block__right"><a href="{{route('login')}}">Login</a><a href="{{route('register')}}">Register</a></div>--}}
{{--                </div>--}}
{{--                @else--}}
{{--                    <div class="ps-block--user-header">--}}
{{--                        <div class="ps-block__left">--}}
{{--                            @if(is_null(Auth::user()->avatar_original))--}}
{{--                                <a href="{{route('login')}}">  <img src="{{asset('uploads/profile/default.png')}}" alt="" class="ps-widget-img rounded-circle" width="40" height="40"></a>--}}
{{--                            @else--}}
{{--                                <a href="{{route('login')}}">  <img src="{{url(Auth::user()->avatar_original)}}" alt="" class="ps-widget-img rounded-circle" width="40" height="40"></a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="ps-block__right"><a href="{{route('login')}}" data-toggle="tooltip" title="{{Auth::user()->name}}">{!! Str::limit(Auth::user()->name,10) !!}</a>--}}
{{--                            <form action = "{{route('logout')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="btn btn-lg btn-bold p-0">Logout</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
    <div class="ps-search--mobile" style="background: #fcb800;">
{{--        <form class="ps-form--search-mobile" action="http://nouthemes.net/html/martfury/index.html" method="get">--}}
{{--            <div class="form-group--nest">--}}
{{--                <input class="form-control" type="text" placeholder="Search something...">--}}
{{--                <button><i class="icon-magnifier"></i></button>--}}
{{--            </div>--}}
{{--        </form>--}}
        <div class="ps-form--quick-search" >
            {{--                    <input type="text" class=" bksearch">--}}
            {{--                    <div class="bklist">--}}
            {{--                    </div>--}}
            <button class="mx-1" style=""  title="Find in map" onclick="mapModalClick()"><i class="fa fa-map"></i></button>
            @if(Request::is('be-a-seller'))
                <input class="form-control m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">
            @else
                <input class="form-control bksearch m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">
            @endif
            <button class="ml-2 mr-1" style="border-radius: 4px;" onclick="geoLocationInit()"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
            <button class="mx-1" style="border-radius: 4px;" id="find">Find</button>
            <div class="ps-panel--search-result bklist ">
            </div>
        </div>
    </div>
</header>
<div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
        <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
        <div class="ps-cart--mobile">
            <div class="ps-cart__content">
                @foreach(Cart::content() as $product)
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{url($product->options->image)}}" alt=""></a></div>
                        <div class="ps-product__content"><a class="ps-product__remove" href="{{route('product.cart.remove',$product->rowId)}}"><i class="icon-cross"></i></a><a href="#">{{$product->name}}</a>
                            <p><small>{{$product->qty}} x ৳{{$product->price}}</small>
                        </div>
                        <p>Sold By:<strong> {{$product->options->shop_name}}</strong></p>
                    </div>
                @endforeach
            </div>
            <div class="ps-cart__footer">
                <h3>Sub Total:<strong class="subTotal">{{Cart::subtotal()}}</strong></h3>
                <figure><a class="ps-btn" href="{{route('shopping-cart')}}">Cart</a><a class="ps-btn" href="{{route('checkout')}}">Checkout</a><a class="ps-btn" href="{{route('product.clear.cart')}}">Clear</a></figure>
            </div>
        </div>
    </div>
</div>
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Shops</h3>
    </div>
    @php
        $shops = DB::table('shops')
                ->join('sellers','shops.user_id','=','sellers.user_id')
                ->where('sellers.verification_status','=',1)
                ->select('shops.*')
                ->get();
    @endphp
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            @foreach($shops as $shop)
            <li class="current-menu-item "><a href="{{route('shop.details',$shop->slug)}}"><img src="{{url($shop->logo)}}" alt="" width="60" height="60"> {{$shop->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="navigation--list">
    <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Shops</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
</div>
{{--<div class="ps-panel--sidebar" id="search-sidebar">--}}
{{--    <div class="ps-panel__header">--}}
{{--        <form class="ps-form--search-mobile" action="http://nouthemes.net/html/martfury/index.html" method="get">--}}
{{--            <div class="form-group--nest">--}}
{{--                <input class="form-control" type="text" placeholder="Search something...">--}}
{{--                <button><i class="icon-magnifier"></i></button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    <div class="navigation__content"></div>--}}
{{--</div>--}}
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header" style="padding-bottom: 50px;">
        <div class="float-left">
            @if(Auth::guest())
            <img class="" src="{{asset('uploads/profile/default.png')}}" alt="" width="40" height="40">
            <a href="{{route('login')}}"><strong>Login</strong></a> | <a href="{{route('register')}}"><strong>Register</strong></a>
            @else
                @if(is_null(Auth::user()->avatar_original))
                    <a href="{{route('login')}}">  <img src="{{asset('uploads/profile/default.png')}}" alt="" class="ps-widget-img rounded-circle" width="40" height="40"> {{Auth::user()->name}}</a>
                @else
                    <a href="{{route('login')}}">  <img src="{{url(Auth::user()->avatar_original)}}" alt="" class="ps-widget-img rounded-circle" width="40" height="40"> {{Auth::user()->name}}</a>
                @endif
            @endif
        </div>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            @if(Auth::guest())
                <li class="menu-item-has-children"><a href="{{url('/')}}"><i class="icon-home"></i> Home </a>
                </li>
{{--                <li class="menu-item-has-children"><a href="{{url('/')}}"><i class="icon-user"></i> Login </a>--}}
{{--                </li>--}}
{{--                <li class="menu-item-has-children"><a href="{{url('/')}}"><i class="icon-home"></i> Register </a>--}}
{{--                </li>--}}
            @else
                <li class="menu-item-has-children"><a href="{{url('/')}}"><i class="icon-home"></i> Home </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.dashboard')}}"><i class="icon-user"></i> User Dashboard </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.order.history')}}"><i class="icon-store"></i> Order History </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.wishlist')}}"><i class="icon-heart"></i> Wishlist </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.edit-password')}}"><i class="icon-alarm-ringing"></i> Edit Password </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.address.index')}}"><i class="icon-map-marker"></i> Address </a>
                </li>
                <li class="menu-item-has-children">
                    <form action = "{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-lg" style="padding:15px 20px; font-size: 16px; color: #000!important; line-height: 20px;"><i class="icon-power-switch"></i> Logout</button>
                    </form>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- Modal -->
<div class="modal fade mapModalShow" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="mr-4">
                <span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <div class="row mb-3">
                    <div class="col-md-9">
                        <input class="form-control bksearch2 m-0" type="text" placeholder="Enter your full address" id="input-search-map" style="border-radius: 4px;" autocomplete="off" value="">
                    </div>
                    <div class="col-md-3">
                        <button class="p-3 bg-dark" style="border-radius: 4px; color: #fff;" id="find2">Find Shop</button>
                    </div>
                </div>
                <div class="bklist2 "></div>
                <input class="latval" id="txtLat" type="text" style="color:red" value="" />
                <input class="lngval" id="txtLng" type="text" style="color:red" value="" />
                <div id="map_canvas" style="width: auto; height: 400px;"> </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="{{asset('frontend/js/location/home_location.js')}}"></script>
    <script src="{{asset('frontend/js/bk.cdn.js')}}"></script>

@endpush
