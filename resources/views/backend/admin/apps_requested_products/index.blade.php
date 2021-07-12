@extends('backend.layouts.master')
@section("title","Apps Requested Product List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Apps Requested Product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Apps Requested Product List</li>
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
                        <h3 class="card-title float-left">Apps Requested Product List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rq_products as $key => $product)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        <img src="{{url($product->images)}}" width="32" height="32" alt="">
                                    </td>
                                    <td>{{$product->name}}</td>
{{--                                    <td class="{{$product->current_stock == 0 ? 'badge badge-danger' : 'badge badge-success'}}">{{$product->current_stock == 0 ? 'Not Available': 'Available'}}</td>--}}
                                    <td>{{$product->price}}</td>
                                    @if($product->status == 0)
                                    <td>
                                        <div class="form-group col-md-2">
                                            <label class="switch" >
                                                <input onchange="update_status(this)" value="{{ $product->id }}" {{$product->status == 1? 'checked':''}} type="checkbox" >
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </td>
                                    @else
                                        <td class="badge badge-success">Done</td>
                                    @endif

                                    <td>
                                        <a class="btn btn-secondary bg-info" href="{{route('admin.apps-requested-products.show',encrypt($product->id))}}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Image</th>
                                <th>Shop Name</th>
                                <th>Price</th>
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
        //product published
        function update_status(el){
            if(el.checked){
                //alert('if')
                var status = 1;
            }
            else{
                //alert('else')
                var status = 0;
            }
            $.post('{{ route('admin.apps.requested-products.status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('success', 'Product status updated successfully');
                }
                else{
                    toastr.danger('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endpush

