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
                        <a href="{{route('admin.dashboard')}}" class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
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
                                <a href="{{route('admin.attributes.index')}}" class="nav-link {{Request::is('admin/attributes*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/attributes*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Attributes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.brands.index')}}" class="nav-link {{Request::is('admin/brands*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/brands*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Brands</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.categories.index')}}" class="nav-link {{Request::is('admin/categories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/categories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.subcategories.index')}}" class="nav-link {{Request::is('admin/subcategories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/subcategories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Subcategories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.sub-subcategories.index')}}" class="nav-link {{Request::is('admin/sub-subcategories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/sub-subcategories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Sub Subcategories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.products.index')}}" class="nav-link {{Request::is('admin/products*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/products*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Products</p>
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
                                <a href="{{route('admin.staffs.index')}}" class="nav-link {{Request::is('admin/staffs*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/staffs*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Staff Manage</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}" class="nav-link {{Request::is('admin/role*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/roles*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Role Manage</p>
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


