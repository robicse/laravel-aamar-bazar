<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #303641;  min-height: 600px!important;">
    <!-- Brand Logo -->
{{--<a href="#" class="brand-link">
    <img src="{{asset('backend/images/logo.png')}}" width="150" height="100" alt="Aamar Bazar" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    --}}{{--<span class="brand-text font-weight-light">Farazi Home Care</span>--}}{{--
</a>--}}
<!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-2 pl-2 mb-2 d-flex">
            <div class="">
                <img src="{{asset('frontend/img/logo-mudi-hat.png')}}" class="" alt="User Image" width="100%">
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
                        <a href="{{route('admin.dashboard')}}"
                           class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/brands*')
                        || Request::is('admin/categories*')
                        || Request::is('admin/subcategories*')
                        || Request::is('admin/sub-subcategories*')
                        || Request::is('admin/products*')
                        || Request::is('admin/request/products*')
                        || Request::is('admin/all/seller/products*')
                        || Request::is('admin/attributes*'))
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
                                <a href="{{route('admin.attributes.index')}}"
                                   class="nav-link {{Request::is('admin/attributes*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/attributes*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Attributes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.brands.index')}}"
                                   class="nav-link {{Request::is('admin/brands*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/brands*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Brands</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.categories.index')}}"
                                   class="nav-link {{Request::is('admin/categories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/categories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.subcategories.index')}}"
                                   class="nav-link {{Request::is('admin/subcategories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/subcategories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Subcategories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.sub-subcategories.index')}}"
                                   class="nav-link {{Request::is('admin/sub-subcategories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/sub-subcategories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Sub Subcategories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.products.index')}}"
                                   class="nav-link {{Request::is('admin/products*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/products*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.products.request.form.seller')}}"
                                   class="nav-link {{Request::is('admin/request/products/from/seller*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/request/products/from/seller*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Seller Req Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.all.seller.products')}}"
                                   class="nav-link {{Request::is('admin/all/seller/products*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/all/seller/products*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>All Seller Products</p>
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
                                <a href="{{route('admin.pending.order')}}"
                                   class="nav-link {{Request::is('admin/pending-order*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/pending-order*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Pending Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.on-reviewed.order')}}"
                                   class="nav-link {{Request::is('admin/on-reviewed-order*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/on-reviewed-order*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>On Reviewed Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.on-delivered.order')}}"
                                   class="nav-link {{Request::is('admin/on-delivered-order*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/on-delivered-order*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>On Delivered Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.delivered.order')}}"
                                   class="nav-link {{Request::is('admin/delivered-order*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/delivered-order*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Delivered Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.completed.order')}}"
                                   class="nav-link {{Request::is('admin/completed-order*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/completed-order*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Completed Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.canceled.order')}}"
                                   class="nav-link {{Request::is('admin/canceled-order*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/canceled-order*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Cancel Order</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/roles*') || Request::is('admin/staffs*')) ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Role & permission
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.staffs.index')}}"
                                   class="nav-link {{Request::is('admin/staffs*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/staffs*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Staff Manage</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}"
                                   class="nav-link {{Request::is('admin/role*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/roles*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Role Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/sellers*') ) ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                Sellers
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.sellers.index')}}"
                                   class="nav-link {{Request::is('admin/sellers') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/sellers') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Seller List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.seller.withdraw.request')}}"
                                   class="nav-link {{Request::is('admin/sellers/withdraw/request*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/sellers/withdraw/request*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Seller Withdraw Requests</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.seller.payment.history')}}"
                                   class="nav-link {{Request::is('admin/sellers/payment/history*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/sellers/payment/history*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Payments History</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.seller.commission.form')}}"
                                   class="nav-link {{Request::is('admin/sellers/commission/form*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/sellers/commission/form*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Commission Settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        @endif
    </div>
    <!-- /.sidebar -->
</aside>


