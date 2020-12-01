@extends('backend.layouts.master')
@section("title","Add Products")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/spectrum.css')}}">
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
                            <div class="form-group ">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control " name="name" id="name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug (SEO Url) <small class="text-danger">(requried* and unique)</small></label>
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug (e.g. this-is-test-product-title)">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control demo-select2" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_category_id">Subcategory</label>
                                <select name="sub_category_id" id="subcategory_id" class="form-control demo-select2" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sub Subcategory</label>
                                <select name="sub_sub_category_id" id="subsubcategory_id" class="form-control demo-select2" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select name="brand" id="brand" class="form-control demo-select2" required>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="name">Unit</label>
                                <input type="text" class="form-control " name="unit" id="unit" placeholder="Unit (e.g. KG, Pc etc)" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-info card-outline">
                        <div class="form-group">
                            <label class="control-label ml-3">Gallery Images</label>
                            <div class="ml-3 mr-3">
                                <div class="row" id="photos"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>
@stop
@push('js')
    <script src="{{asset('backend/dist/js/spartan-multi-image-picker-min.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            get_subcategories_by_category();
            //title to slug make
            $("#name").keyup(function () {
                var name = $("#name").val();
                console.log(name);
                $.ajax({
                    url: "{{URL('/admin/products/slug')}}/"+name,
                    method: "get",
                    success: function(data){
                        console.log(data.response)
                        $('#slug').val(data.response);
                    }
                });
            })
            $("#photos").spartanMultiImagePicker({
                fieldName:        'photos[]',
                maxCount:         10,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
            });


        });

        function get_subcategories_by_category(){
            var category_id = $('#category_id').val();
            //console.log(category_id)
            $.post('{{ route('admin.products.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id},function(data){
                $('#subcategory_id').html(null);
                //console.log(data)
                for (var i = 0; i < data.length; i++) {
                    $('#subcategory_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    $('.demo-select2').select2();
                }
                get_subsubcategories_by_subcategory();
            });
        }

        function get_subsubcategories_by_subcategory(){
            var subcategory_id = $('#subcategory_id').val();
            console.log(subcategory_id)
            $.post('{{ route('admin.products.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
                console.log(data)
                $('#subsubcategory_id').html(null);
                $('#subsubcategory_id').append($('<option>', {
                    value: null,
                    text: null
                }));
                for (var i = 0; i < data.length; i++) {
                    $('#subsubcategory_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $('.demo-select2').select2();

            });
        }

        $('#category_id').on('change', function() {
            get_subcategories_by_category();
        });
        $('#subcategory_id').on('change', function() {
            get_subsubcategories_by_subcategory();
        });

    </script>
@endpush
