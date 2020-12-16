@extends('backend.seller.layouts.master')
@section("title","On Review Order")
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
                        <li class="breadcrumb-item active">On Review Order</li>
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
                        <h3 class="card-title float-left">On Review Order</h3>
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
                                <th>Delivery Status</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($review_product as $key => $review)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{date('j-m-Y',strtotime($review->created_at))}}</td>
                                <td>{{$review->name}}</td>
                                <td>{{$review->delivery_status}}</td>
                                <td>{{$review->payment_status}}</td>
                                <td>
                                    <a class="btn btn-info waves-effect" href="{{route('seller.order-details',$review->id)}}">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Delivery Status</th>
                                <th>Payment Method</th>
                                <th>Action</th>
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
