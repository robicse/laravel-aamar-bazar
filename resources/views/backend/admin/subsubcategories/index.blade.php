@extends('backend.layouts.master')
@section("title","Sub Subcategories List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Subcategories List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sub Subcategories List</li>
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
                        <h3 class="card-title float-left">Subcategories Lists</h3>
                        <div class="float-right">
                            <a href="{{route('admin.sub-subcategories.create')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>SubSubcategory Name</th>
                                <th>Subcategory Name</th>
                                <th>Category Name</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subsubcategories as $key => $subsubcategory)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$subsubcategory->name}}</td>
                                <td>{{$subsubcategory->subcategory->name}}</td>
                                <td>{{$subsubcategory->subcategory->category->name}}</td>
                                <td>
                                    <div class="form-group col-md-2">
                                        <label class="switch" style="margin-top:40px;">
                                            <input onchange="update_status(this)" value="{{ $subsubcategory->id }}" {{$subsubcategory->status == 1? 'checked':''}} type="checkbox" >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info waves-effect" href="{{route('admin.sub-subcategories.edit',$subsubcategory->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
{{--                                    <button class="btn btn-danger waves-effect" type="button"--}}
{{--                                            onclick="deleteSubCategory({{$subsubcategory->id}})">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </button>--}}
{{--                                    <form id="delete-form-{{$subsubcategory->id}}" action="{{route('admin.sub-subcategories.destroy',$subsubcategory->id)}}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>SubSubcategory Name</th>
                                <th>Subcategory Name</th>
                                <th>Category Name</th>
                                <th>Published</th>
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

        function update_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('admin.subsubcategories.status-update') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('success', 'Subsubcategory Published updated successfully');
                }
                else{
                    toastr.danger('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endpush
