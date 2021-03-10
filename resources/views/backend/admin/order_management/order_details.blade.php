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
                                        <input type="text" value="{{$order->payment_status}}" class="form-control" id="inputName" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label>Delivery Status</label>
                                        <input type="text" value="{{$order->delivery_status}}" class="form-control" id="inputName" readonly>
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
                                <strong>Shop Info</strong>
                                <address>
                                    <br>
                                    <div>Shop Name: {{ $shop->name}}</div>
                                    <div>Shop Address: {{ $shop->address}}</div>
                                </address>
                            </div>
                            <!-- /.col -->
                            @php
                                $shippingInfo = json_decode($order->shipping_address)
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
                                <b>Invoice {{$order->invoice_code}}</b><br>
                                <br>
                                <b>Order ID:</b> {{$order->id}}<br>
                                <b>Payment Due:</b> {{date('j-m-Y',strtotime($order->created_at))}}<br>
                                <b>Transaction ID:</b> {{$order->transaction_id}}
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
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Payment Type</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Print</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetails as $key=>$orderDetail)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <img src="{{url($orderDetail->product->thumbnail_img)}}" width="100" height="80">
                                            </td>
                                            <td>{{$orderDetail->name}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td>{{$orderDetail->quantity}}</td>
                                            <td>{{$orderDetail->price}}</td>
                                            <td>{{$orderDetail->price * $orderDetail->quantity }}</td>
                                            <td>
                                                <a href="{{ route('admin.invoice.print',encrypt($order->id)) }}" target="_blank" class="btn btn-default" style="background: green;"><i class="fa fa-print"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                            <td>{{$order->grand_total}}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <th>Tax (9.3%)</th>--}}
{{--                                            <td>$10.34</td>--}}
{{--                                        </tr>--}}
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>{{$order->delivery_cost}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{$order->grand_total + $order->delivery_cost}}</td>
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
