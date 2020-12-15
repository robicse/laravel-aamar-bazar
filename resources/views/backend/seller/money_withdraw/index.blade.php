@extends('backend.seller.layouts.master')
@section("title","Money Withdraw")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <h1>Money Withdraw</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Money Withdraw</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner text-center">
                        <h4>500.00</h4>

                        <p>Pending Balance</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="" class="small-box-footer" data-toggle="modal" data-target="#exampleModal">
                <div class="small-box bg-success" style="min-height: 125px; ">
                    <div class="inner text-center">
                        <h4>Send Withdraw Request</h4>
                        <h1>
                            <i class="fa fa-plus-circle"></i>
                        </h1>
                    </div>
                </div>
                </a>
            </div>
            <!-- ./col -->
        </div>
    </section>
    <section class="col-lg-12 col-md-12" >
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
{{--                    <i class="fas fa-chart-pie mr-1"></i>--}}
                    Withdraw Request History
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sdfsa</td>
                            <td>fghfg</td>
                            <td>hdfgfd</td>
                            <td>dbe</td>
                            <td>utrd</td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('seller.withdraw-request.store')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Amount</label>
                        <input type="number" name="amount" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Send</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
@endpush
