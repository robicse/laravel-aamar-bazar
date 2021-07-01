@extends('backend.layouts.master')
@section("title","Apps Requested Product List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>E-commerce</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">E-commerce</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{$rq_product->name}}</h3>
                            <div class="col-6">
                                <img src="{{url($rq_product->images)}}" class="" alt="Product Image" width="450" height="400">
                            </div>
{{--                            <div class="col-12 product-image-thumbs">--}}
{{--                                <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>--}}
{{--                                <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>--}}
{{--                                <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>--}}
{{--                                <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>--}}
{{--                                <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$rq_product->name}}</h3>
                            <hr>
                            <h4>Shop Name</h4>
                            <p style="color: blue">{{$rq_product->user->shop->name}}</p>
                            <h4 class="mt-3">Price</h4>
                            <p style="color: blue"> {{$rq_product->price}}</p>
                            <h4 class="mt-3 text-bold">Description</h4>
                            <p>{!! $rq_product->description !!}</p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
@endsection
