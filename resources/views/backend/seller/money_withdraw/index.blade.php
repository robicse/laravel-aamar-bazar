@extends('backend.seller.layouts.master')
@section("title","Money Withdraw")
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
                <div class="small-box bg-success">
                    <div class="inner text-center">
                        <h4>0</h4>

                        <p>Total Sale</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="" class="small-box-footer" data-toggle="modal" data-target="#exampleModal">More info <i class="fas fa-arrow-circle-right"></i></a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#exampleModal">--}}
{{--                        More--}}
{{--                    </button>--}}
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
    <section class="col-lg-10 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
{{--                    <i class="fas fa-chart-pie mr-1"></i>--}}
                    Withdraw Request History
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Message</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>14-12-2020</td>
                        <td>500</td>
                        <td>Pending</td>
                        <td>I'd like to withdraw my money</td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div>
    </section>
@endsection
