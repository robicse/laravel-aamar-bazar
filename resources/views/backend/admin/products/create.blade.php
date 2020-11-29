@extends('backend.layouts.master')
@section("title","Add Products")
@push('css')

@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <form role="form" action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="row m-2">
                <div class="col-md-6">
                <!-- general form elements -->
                    <div class="card card-info card-outline">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_category_id">Subcategory</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-info card-outline">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@stop
@push('js')

@endpush
