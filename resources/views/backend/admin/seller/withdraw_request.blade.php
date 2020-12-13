@extends('backend.layouts.master')
@section("title","Seller Withdraw Request List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Seller Withdraw Request List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Seller Withdraw Request List</li>
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
                        <h3 class="card-title float-left">Seller Withdraw Request List</h3>
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
                                <th>Seller Name</th>
                                <th>Total Amount to Pay</th>
                                <th>Requested Amount</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                <td>৳78.400</td>
                                <td>Do something</td>
                                <td>Pending</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <button class="bg-danger dropdown-item" type="button"
                                                    onclick="payNow({{'1'}})">
                                                <i class="fa fa-money"></i> Pay Now
                                            </button>
                                            <form id="delete-form-{{'1'}}" action="#" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a class="bg-info dropdown-item" href="{{route('admin.seller.payment.history')}}">
                                                <i class="fa fa-history"></i> Payment History
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{--@endforeach--}}
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Date</th>
                                <th>Seller Name</th>
                                <th>Total Amount to Pay</th>
                                <th>Requested Amount</th>
                                <th>Message</th>
                                <th>Status</th>
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
        //sweet alert
        function payNow(id) {
            swal({
                title: 'Are you sure to Pay?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#30a90c',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes,Pay Now!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your Data is save :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
