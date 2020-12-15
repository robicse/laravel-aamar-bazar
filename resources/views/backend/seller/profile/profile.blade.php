@extends('backend.seller.layouts.master')
@section("title","Seller Profile")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{url($userInfo->avatar_original)}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$userInfo->name}}</h3>

                            <p class="text-muted text-center">{{$userInfo->user_type}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total Products</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Orders</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Sold Amount</b> <a class="float-right">13,287</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Wallet Balance</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="{{route('seller.shop.create')}}" class="btn btn-primary btn-block"><b>Go To Shop</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Shop</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Description</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#seller_info" data-toggle="tab">Seller
                                        Info</a></li>
                                <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit
                                        Profile </a></li>
                                <li class="nav-item"><a class="nav-link" href="#change_pass" data-toggle="tab">Change Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="seller_info">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="{{$userInfo->name}}" class="form-control" id="inputName" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="{{$userInfo->phone}}" class="form-control" id="inputEmail" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="{{$userInfo->email}}" class="form-control" id="inputEmail" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Shop Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="{{$shopInfo->name}}" class="form-control" id="inputEmail" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Shop Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="{{$shopInfo->address}}" class="form-control" id="address" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="edit">
                                    <form class="form-horizontal" action="{{route('seller.profile.update')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="{{$userInfo->name}}" name="name" class="form-control" id="inputName" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="{{$userInfo->phone}}" name="phone" class="form-control" id="inputEmail" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="{{$userInfo->email}}" name="email" class="form-control" id="inputEmail" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="shop_name" class="col-sm-2 col-form-label">Shop Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="{{$shopInfo->name}}" name="shop_name" class="form-control" id="shop_name" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="change_pass">
                                    <form class="form-horizontal" action="{{route('seller.password.update')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="old_password" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-header  p-2 p-0 bg-info">
                            <strong>Bank Details</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('seller.payment.update')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label col-md-2">Cash Payment</label>
                                    <label class="switch" style="margin-top:40px;">
                                        <input onchange="update_cash_on_delivery_status(this)" value="{{ $sellerInfo->id }}" {{$sellerInfo->cash_on_delivery_status == 1? 'checked':''}} type="checkbox" >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-md-2">Bank Payment</label>
                                    <label class="switch" style="margin-top:40px;">
                                        <input onchange="update_bank_payment_status(this)" value="{{ $sellerInfo->id }}" {{$sellerInfo->bank_payment_status == 1? 'checked':''}} type="checkbox" >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Bank Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bank_name" value="{{$sellerInfo->bank_name}}" class="form-control" id="bank_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Bank Acc Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bank_acc_name" value="{{$sellerInfo->bank_acc_name}}" class="form-control" id="bank_acc_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bank_acc_no" class="col-sm-2 col-form-label">Bank Acc Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bank_acc_no" value="{{$sellerInfo->bank_acc_no}}" class="form-control" id="bank_acc_no">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Bank Routing Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="bank_routing_no" value="{{$sellerInfo->bank_routing_no}}" class="form-control" id="inputName2" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        //today's deals
        function update_cash_on_delivery_status(el){
            console.log(el);
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('seller.payment.cash_on_delivery_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                console.log(data);
                if(data == 1){
                    toastr.success('success', 'Payment Status updated successfully');
                }
                else{
                    toastr.danger('danger', 'Something went wrong');
                }
            });
        }
        function update_bank_payment_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('seller.payment.bank_payment_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('success', 'Payment Status updated successfully');
                }
                else{
                    toastr.danger('danger', 'Something went wrong');
                }
            });
        }


    </script>
@endpush
