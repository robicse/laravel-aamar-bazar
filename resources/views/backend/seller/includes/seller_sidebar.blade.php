<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #303641">
    <!-- Brand Logo -->
{{--<a href="#" class="brand-link">
    <img src="{{asset('backend/images/logo.png')}}" width="150" height="100" alt="Aamar Bazar" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    --}}{{--<span class="brand-text font-weight-light">Farazi Home Care</span>--}}{{--
</a>--}}
<!-- Sidebar -->
    <div class="sidebar" >
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-2 mb-2 d-flex">
            <div class="image">
                <img src="{{asset('backend/images/logo.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block"><strong>Aamar Bazar</strong></a>
            </div>
        </div>

    @if (Auth::check() )
        <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('seller.dashboard')}}" class="nav-link {{Request::is('seller/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('seller/brands*')
                        || Request::is('seller/categories*')
                        || Request::is('seller/subcategories*')
                        || Request::is('seller/sub-subcategories*')
                        || Request::is('seller/products*')
                        || Request::is('seller/attributes*'))
                    ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Product Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('seller.products.index')}}" class="nav-link {{Request::is('seller/products*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('seller/products*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link {{Request::is('seller/order') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Order Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('seller.pending.order')}}" class="nav-link {{Request::is('seller/pending-order*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('seller/pending-order*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Order Product</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link {{Request::is('seller/settings') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                               Settings
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('seller.shop.create')}}" class="nav-link {{Request::is('seller/shop*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('seller/shop*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Shop Settings</p>
                                </a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('seller.slider.index')}}" class="nav-link {{Request::is('seller/slider*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-{{Request::is('seller/slider*') ? 'folder-open':'folder'}} nav-icon"></i>--}}
{{--                                    <p>Slider Settings</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('seller.profile.show')}}" class="nav-link {{Request::is('seller/manage-profile') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Manage Profile
{{--                                <i class="right fa fa-angle-left"></i>--}}
                            </p>
                        </a>
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="" class="nav-link {{Request::is('seller/profile*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-{{Request::is('seller/profile*') ? 'folder-open':'folder'}} nav-icon"></i>--}}
{{--                                    <p>Edit Profile</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('seller.password.edit')}}" class="nav-link {{Request::is('seller/password*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-{{Request::is('seller/password*') ? 'folder-open':'folder'}} nav-icon"></i>--}}
{{--                                    <p>Edit Password</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('seller.payment.settings')}}" class="nav-link {{Request::is('seller/payment*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-{{Request::is('seller/payment*') ? 'folder-open':'folder'}} nav-icon"></i>--}}
{{--                                    <p>Payment Settings</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </li>
                    <li class="nav-item">
                        <a href="{{route('seller.payment.history')}}" class="nav-link {{Request::is('seller/payment-history') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                Payment History
{{--                                <i class="right fa fa-angle-left"></i>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('seller.money.withdraw') }}" class="nav-link {{Request::is('seller/money-withdraw') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Money Withdraw
{{--                                <i class="right fa fa-angle-left"></i>--}}
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        @endif
    </div>
    <!-- /.sidebar -->
</aside>


