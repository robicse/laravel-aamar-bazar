@extends('backend.seller.layouts.master')
@section("title","On Delivery Order")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order Management</li>
                        <li class="breadcrumb-item active">On Delivery Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">On Delivery Order</h3>
                        <div class="float-right">
                            {{--<a href="{{route('admin.p.create')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>--}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach($sellerUserInfos as $key => $sellerUserInfo)--}}
                            <tr>
                                {{--<td>{{$key + 1}}</td>--}}
                                <td>1</td>
                                <td>2020-11-30 05:42:00</td>
                                <td>Mr. Seller (Demo Seller Shop)</td>
                                <td>৳78.400</td>
                                <td>Cash</td>
                            </tr>
                            {{--@endforeach--}}
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
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
@endpush
