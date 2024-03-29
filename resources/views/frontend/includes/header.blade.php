<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
    .bk-autocomplete-items{
        margin-top: 50px;
        border: 0px;
    }

    .addListWeb::-webkit-scrollbar {
        display: none;
    }
    .addListWeb {
        -ms-overflow-style: none;  / IE and Edge /
    scrollbar-width: none;  / Firefox */
    }

</style>
<header class="header header--1" data-sticky="true" style="height: 100px;">
    <div class="header__top">
        <div class="ps-container">
            <div class="header__left">
                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset('frontend/img/logo-mudi-hat-final.png')}}" alt="logo" ></a>
            </div>
            <div class="header__center">
                <div class="ps-form--quick-search" >

                    @if(Request::is('/'))
                        @if(Request::is('be-a-seller'))
                            <input class="form-control m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">
                        @else
                            <input class="form-control address_web input-search-map myWebSearch"  type="text" placeholder="Enter your delivery location" id="web_search" style="border-radius: 4px;" autocomplete="off" value="">
                        @endif
                        <button class="ml-2 mr-1" data-toggle="tooltip" title="Current Location Nearest Shops" style="border-radius: 4px;" onclick="geoLocationInit()"><i class="fas fa-location" aria-hidden="true" style="font-size: 24px;"></i></button>
                        {{--<button class="mx-1 find" style="border-radius: 4px;" id="find">Find</button>--}}
                        <button class="mx-1" data-toggle="tooltip" title="Shops Search In Map"  style="border-radius: 4px;"  title="Find in map" onclick="mapModalClick()"><i class="fa fa-map" style="font-size: 24px;"></i></button>
                        <div class="ps-panel--search-result bklist ">
                        </div>
                    @endif

                </div>
                <ul class="list-group addListWeb" style="padding: 0; position: absolute; z-index: 999;width: 460px; ">

                </ul>
            </div>
            {{--            <div class="ps-form--quick-search" >--}}
            {{--                @if(Request::is('/'))--}}
            {{--                    <button class="mx-1" style=""  data-toggle="tooltip" title="Current Location Nearest Shops." onclick="mapModalClick()"><i class="fa fa-map"></i></button>--}}
            {{--                    @if(Request::is('be-a-seller'))--}}
            {{--                        <input class="form-control m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">--}}
            {{--                    @else--}}
            {{--                        --}}{{--<input class="form-control bksearch m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">--}}
            {{--                        <input type="text" onkeyup="getAddress()" id="mobile_search" placeholder="Search Your Area" class="form-control form_height form-control-sm address input-search-map" autocomplete="off">--}}
            {{--                    @endif--}}
            {{--                    <button data-toggle="tooltip" title="Search Shops In Map." class="ml-2 mr-1"  style="border-radius: 4px;" onclick="geoLocationInit()"><i class="fas fa-location" aria-hidden="true"></i></button>--}}

            {{--                    <div class="ps-panel--search-result bklist ">--}}
            {{--                    </div>--}}
            {{--                @endif--}}
            {{--            </div>--}}
            {{--            <ul class="list-group addList" style="padding: 0;">--}}

            {{--            </ul>--}}
            <div class="header__right">
                <div class="header__actions"><a class="header__extra" href="#">
                        <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i class="cart_count">{{Cart::count()}}</i></span></a>

                            <div class="ps-cart__content" style="min-height: 300px; height: 300px; overflow-y: scroll;">
{{--                                @if(Cart::content()->count() != 0 )--}}
                                    <div class="ps-cart__items cart_item">
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
{{--                                @else--}}
{{--                                    <div class="" style="background-color: white">--}}
{{--                                    <div class="text-center">--}}
{{--                                        <img src="{{asset('frontend/img/list.jpg')}}" height="150" width="200">--}}

{{--                                    </div>--}}
{{--                                        <div class="text-center">--}}
{{--                                        <span>Cart is empty!!</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                            </div>

                        </div>

                        @if(Auth::guest())
                            <div class="ps-block--user-header">
                                <div class="ps-block__left"><i class="icon-user"></i></div>
                                <div class="ps-block__right"><a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}">Register</a></div>
                            </div>
                        @elseif(Auth::User()->user_type == 'seller')
                            <div class="ps-block--user-header">
                                <div class="ps-widget__header">
                                    <div class="ps-block__left">
                                        <a href="{{route('seller.dashboard')}}"> <img src="{{url(Auth::user()->avatar_original)}}" alt="" class="ps-widget-img rounded-circle" width="50" height="50"></a>
                                        <div class="ps-block__right"><a href="{{route('seller.dashboard')}}" data-toggle="tooltip" title="{{Auth::user()->name}}">{!! Str::limit(Auth::user()->name,7) !!}</a>
                                            <form action = "{{route('logout')}}" method="post" >
                                                @csrf
                                                <button type="submit" class="btn btn-lg p-0" style="background: #7B0F17!important; font-size: 1.5rem;">Logout</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::User()->user_type == 'admin')
                            <div class="ps-block--user-header">
                                <div class="ps-widget__header">
                                    <div class="ps-block__left">
                                        <a href="{{route('admin.dashboard')}}"> <img src="{{url(Auth::user()->avatar_original)}}" alt="" class="ps-widget-img rounded-circle" width="50" height="50"></a>
                                        <div class="ps-block__right"><a href="{{route('admin.dashboard')}}" data-toggle="tooltip" title="{{Auth::user()->name}}">{!! Str::limit(Auth::user()->name,7) !!}</a>
                                            <form action = "{{route('logout')}}" method="post" >
                                                @csrf
                                                <button type="submit" class="btn btn-lg p-0" style="background: #7B0F17!important; font-size: 1.5rem;">Logout</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::User()->user_type == 'customer')
                            <div class="ps-block--user-header">
                                <div class="ps-widget__header">
                                    <div class="ps-block__left">
                                        <a href="{{route('user.dashboard')}}"> <img src="{{url(Auth::user()->avatar_original)}}" alt="" class="ps-widget-img rounded-circle" width="50" height="50"></a>
                                        <div class="ps-block__right"><a href="{{route('user.dashboard')}}" data-toggle="tooltip" title="{{Auth::user()->name}}">{!! Str::limit(Auth::user()->name,7) !!}</a>
                                            <form action = "{{route('logout')}}" method="post" >
                                                @csrf
                                                <button type="submit" class="btn btn-lg p-0" style="background: #7B0F17!important; font-size: 1.5rem;">Logout</button>
                                            </form>
                                        </div>

                                    </div>
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
            </div>
        </div>
    </nav>
</header>
<header class="header header--mobile" data-sticky="true">
    <div class="navigation--mobile" style="background: #000000;">
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

                        <div class="ps-cart__footer">
                            <h3>Sub Total:<strong class="subTotal">{{Cart::subtotal()}}</strong></h3>
                            <figure><a class="ps-btn" href="{{route('shopping-cart')}}">Cart</a><a class="ps-btn" href="{{route('checkout')}}">Checkout</a><a class="ps-btn" href="{{route('product.clear.cart')}}">Clear</a></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-search--mobile" style="background: #000000;">
        <div class="ps-form--quick-search" >
            @if(Request::is('/'))
                <button class="mx-1" style=""  data-toggle="tooltip" title="Current Location Nearest Shops." onclick="mapModalClick()"><i class="fa fa-map"></i></button>
                @if(Request::is('be-a-seller'))
                    <input class="form-control m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">
                @else
                    {{--<input class="form-control bksearch m-0" type="text" placeholder="Enter your full address" id="input-search" style="border-radius: 4px;" autocomplete="off" value="">--}}
                    <input type="text" onkeyup="getAddress()" id="mobile_search" placeholder="Search Your Area" class="form-control form_height form-control-sm address input-search-map" autocomplete="off">
                @endif
                <button data-toggle="tooltip" title="Search Shops In Map." class="ml-2 mr-1"  style="border-radius: 4px;" onclick="geoLocationInit()"><i class="fas fa-location" aria-hidden="true"></i></button>

                <div class="ps-panel--search-result bklist ">
                </div>
            @endif
        </div>
        <ul class="list-group addList" style="padding: 0;">

        </ul>
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
    <div class="navigation__content">
        <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
            <i class="icon-menu"></i><span> Menu</span>
        </a>
        {{-- <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4">
             </i><span> Shops</span>
         </a>--}}
        <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile">
            <i class="icon-bag2"></i><span> Cart</span>
        </a>
    </div>
</div>
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header" style="padding-bottom: 50px;">
        <div class="float-left">
            @if(Auth::guest())
                <img class="" src="{{asset('uploads/profile/default.png')}}" alt="" width="40" height="40">
                <a href="{{route('login')}}"><strong>Login</strong></a> | <a href="{{route('register')}}"><strong>Register</strong></a>
            @else
                @if(is_null(Auth::user()->avatar_original))
                    <a href="{{route('user.dashboard')}}">  <img src="{{asset('uploads/profile/default.png')}}" alt="" class="ps-widget-img rounded-circle" width="40" height="40"> {{Auth::user()->name}}</a>
                    <p>Refarral Code: <strong>{{Auth::user()->referral_code}}</strong></p>
                @else
                    <a href="{{route('user.dashboard')}}" style="margin-top: -10px;" class="small">  <img src="{{url(Auth::user()->avatar_original)}}" alt="" class="ps-widget-img rounded-circle" width="30" height="30">{{Auth::user()->name}} </a>
                    <p style="color: #0c0c0c; padding-left: 25px;">Refarral Code: <strong>{{Auth::user()->referral_code}}</strong></p>
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
                @if(Auth::user()->referral_code !=null)
                    <li class="menu-item-has-children">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="" value="{{route('registration.refer.code',Auth::user()->referral_code)}}" data-toggle="tooltip" title="Click here to copy link!" aria-label="Recipient's username" aria-describedby="basic-addon2" style="height: 35px; padding: 0 10px">
                            <div class="input-group-append">
                                <span class="input-group-text bg-info" style="color: #ffffff"><a href="{{route('registration.refer.code',Auth::user()->referral_code)}}">Copy</a></span>
                            </div>
                        </div>
                    </li>
                @endif
                <li class="menu-item-has-children"><a href="{{url('/')}}"><i class="icon-home"></i> Home </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.dashboard')}}"><i class="icon-list"></i> User Dashboard </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.edit-profile')}}"><i class="icon-user"></i> Edit Profile </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.edit-password')}}"><i class="icon-alarm-ringing"></i> Edit Password </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.order.history')}}"><i class="icon-list"></i> Order History </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.wishlist')}}"><i class="icon-heart"></i> Wishlist </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.address.index')}}"><i class="icon-map-marker"></i> Address </a>
                </li>
                <li class="menu-item-has-children"><a href="{{route('user.favorite.shop')}}"><i class="icon-store"></i>Favorite Shop</a>
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
            <div class="mr-4 mt-5">
                <span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <div class="row mb-3 ml-1">
                    <div class="" style="width: 70%">
                        <input class="form-control bksearch2 input-search-map m-0" type="text" placeholder="Enter your full address" id="" style="border-radius: 4px;" autocomplete="off" value="">
                    </div>
                    <div >
                        <button class="p-3 bg-dark find" style="border-radius: 4px; color: #fff;" id="find2"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="bklist2 "></div>
                <input class="latval" id="txtLat" type="hidden" style="color:red" value="" />
                <input class="lngval" id="txtLng" type="hidden" style="color:red" value="" />
                <div id="map_canvas" style="width: auto; height: 400px;"> </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/gh/barikoi/barikoi-js@b6f6295467c19177a7d8b73ad4db136905e7cad6/dist/barikoi.min.js?key:MjMzNTpTWlBLSkRHUTRZ"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        Bkoi.onSelect(function () {
            // get selected data from dropdown list
            let selectedPlace = Bkoi.getSelectedData()
            console.log(selectedPlace)
            // center of the map
            document.getElementsByName("city")[0].value = selectedPlace.city;
            document.getElementsByName("area")[0].value = selectedPlace.area;
            document.getElementsByName("latitude")[0].value = selectedPlace.latitude;
            document.getElementsByName("longitude")[0].value = selectedPlace.longitude;

        })

        function getAddress() {

            let places=[];
            let location=null;
            let add=$('.address').val();
            $('.addList').empty();
            fetch("https://barikoi.xyz/v1/api/search/autocomplete/MjMzNTpTWlBLSkRHUTRZ/place?q="+add)
                .then(response => response.json())
                .catch(error => console.error('Error:', error))
                .then(response => {
                    response.places.forEach(result)
                })
        }
        $('.myWebSearch').keyup(debounce(function(){
            let places=[];
            let location=null;
            let add = $('.address_web').val();
            $('.addListWeb').empty();
            fetch("https://barikoi.xyz/v1/api/search/autocomplete/MjMzNTpTWlBLSkRHUTRZ/place?q="+add)
                .then(response => response.json())
                .catch(error => console.error('Error:', error))
                .then(response => {
                    console.log(response.places)
                    if ( response.places.length != undefined) {
                        $('.addListWeb').css({"height": "450px", "overflow-y": "scroll"})
                    }
                    response.places.forEach(resultWeb)
                })

        },500));

        function result(item, index){
            var $li = $("<li class='list-group-item'><a href='#' class='list-group-item bg-light'>" + item.address + "</a></li>");
            $(".addList").append($li);
            $li.on('click', getPlacesDetails.bind(this, item));
        }
        function resultWeb(item, index){
            var $li = $("<li class='list-group-item listD'><a href='#' class='list-group-item bg-light'>" + item.address + "</a></li>");
            $(".addListWeb").append($li);
            $li.on('click', getPlacesDetailsWeb.bind(this, item));
        }
        function getPlacesDetails(mapData)
        {
            searchShops(mapData.latitude,mapData.longitude)
            $("#mobile_search").val(mapData.address)
            $(".addList").empty();
        }
        function getPlacesDetailsWeb(mapData)
        {
            searchShops(mapData.latitude,mapData.longitude)
            $("#web_search").val(mapData.address)
            $(".addListWeb").empty().css({"height": "0px", "overflow-y": "scroll"});
        }

        function debounce(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this, args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }

    </script>
@endpush
