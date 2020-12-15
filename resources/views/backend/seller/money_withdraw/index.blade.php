@extends('backend.seller.layouts.master')
@section("title","Money Withdraw")
@push('css')
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
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
                <div class="small-box bg-success">
                    <div class="inner text-center">
                        <h4>Send Withdraw Request</h4>

                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="" class="small-box-footer" data-toggle="modal" data-target="#exampleModal">More info <i class="fas fa-plus-circle"></i></a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Send a Withdraw Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('seller.withdraw-request.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <p for="exampleFormControlInput1">Amount</p>
                                            <input type="number" name="amount" class="form-control" id="exampleFormControlInput1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Message</label>
                                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
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
    <section class="col-lg-10" >
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div>
    </section>
@stop
@push('js')
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
@endpush
