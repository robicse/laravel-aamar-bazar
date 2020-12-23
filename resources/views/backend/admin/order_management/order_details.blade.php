@extends('backend.layouts.master')
@section("title","Order Details")
@push('css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <div class="card card-info" style="padding: 20px 40px 40px 40px;">
                            <form role="form" action="" method="">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <label>Payment Status</label>
                                        <select name="payment_status" id="" class="form-control select2">
                                            <option value="">{{$order_details->payment_status}}</option>
                                        </select>
                                        {{--                                            <input type="text" class="form-control" placeholder="First name">--}}
                                    </div>
                                    <div class="col-4">
                                        <label>Delivery Status</label>
                                        <select name="delivery_status" id="" class="form-control select2">
                                            <option value="">{{$order_details->delivery_status}}</option>
                                        </select>
                                        {{--  <input type="text" class="form-control" placeholder="First name">--}}
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>Company Info</strong>
                                <address>
                                    <strong>{{ $order_details->name}}</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                </address>
                            </div>
                            <!-- /.col -->
                            @php
                                $shippingInfo = json_decode($order_details->shipping_address)
                            @endphp
                            <div class="col-sm-4 invoice-col">
                                <strong>Shipping Info</strong>
                                <address>
                                    <div class="name">Name: {{$shippingInfo->name}} </div>
                                    <div class="phone">Phone: <a href="">{{$shippingInfo->phone}}</a></div>
                                    <div class="email">Email: <a href="">{{$shippingInfo->email}}</a></div>
                                    <div class="address">Address: {{$shippingInfo->address}}</div>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice {{$order_details->invoice_code}}</b><br>
                                <br>
                                <b>Order ID:</b> {{$order_details->id}}<br>
                                <b>Payment Due:</b> {{date('j-m-Y',strtotime($order_details->created_at))}}<br>
                                <b>Transaction ID:</b> {{$order_details->transaction_id}}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row" style="padding: 30px 0px 10px 0px;">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>Delivery Type</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td>Gucci Shoes</td>
                                        <td>Cash</td>
                                        <td>2</td>
                                        <td>$60.50</td>
                                        <td>$121.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$121.00</td>
                                        </tr>
                                        <tr>
                                            <th>Tax </th>
                                            <td>$10.00</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$131.00</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        {{--                            <div class="row no-print">--}}
                        {{--                                <div class="col-12">--}}
                        {{--                                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>--}}
                        {{--                                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit--}}
                        {{--                                        Payment--}}
                        {{--                                    </button>--}}
                        {{--                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">--}}
                        {{--                                        <i class="fas fa-download"></i> Generate PDF--}}
                        {{--                                    </button>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('js')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        });
    </script>
@endpush
