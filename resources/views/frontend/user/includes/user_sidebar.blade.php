<style>
    @media only screen and (max-width: 700px) {
        .side_bar{
            display: none;
        }
    }
</style>

<div class="col-lg-3 side_bar">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__header"><img src="{{url(Auth::user()->avatar_original)}}" alt="">
                <figure>
                    <figcaption>{{Auth::user()->name}}</figcaption>
                    <p><a href="#"><span class="__cf_email__" data-cfemail="12676177607c737f7752757f737b7e3c717d7f">{{Auth::user()->email}}</span></a></p>
                </figure>
            </div>
            <div class="ps-widget__content">
                <ul>
                    <li class="{{Request::is('user/dashboard*') ? 'active' :''}}"><a href="{{route('user.dashboard')}}"><i class="icon-user"></i>Dashboard</a></li>
                    <li class="{{Request::is('user/edit-password*') ? 'active' :''}}"><a href="{{route('user.edit-password')}}"><i class="icon-alarm-ringing"></i>Edit Password</a></li>
{{--                    <li class="{{Request::is('user/notification*') ? 'active' :''}}"><a href="{{route('user.notification')}}"><i class="icon-alarm-ringing"></i>Notifications</a></li>--}}
{{--                    <li><a href="{{route('user.invoices')}}"><i class="icon-papers"></i> Invoices</a></li>--}}
                    <li class="{{Request::is('user/address*') ? 'active' :''}}"><a href="{{route('user.address.index')}}"><i class="icon-map-marker"></i>Address</a></li>
                    <li class="{{Request::is('user/order*') ? 'active' :''}}"><a href="{{route('user.order.history')}}"><i class="icon-list"></i>Order History</a></li>
                    <li class="{{Request::is('user/wishlist*') ? 'active' :''}}"><a href="{{route('user.wishlist')}}"><i class="icon-heart"></i>Wishlist</a></li>
                    <li class="{{Request::is('user/favorite-shops*') ? 'active' :''}}"><a href="{{route('user.favorite.shop')}}"><i class="icon-store"></i>Favorite Shop</a></li>
                    <li>
                        <form action = "{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-lg" style="padding:15px 20px; font-size: 16px; color: #000!important; line-height: 20px;"><i class="icon-power-switch"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div>
