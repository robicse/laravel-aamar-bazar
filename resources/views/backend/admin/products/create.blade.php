@extends('backend.layouts.master')
@section("title","Add Products")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/spectrum.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/custome-style.css')}}">
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
                                <input type="text" class="form-control " name="name" id="name" placeholder="Enter Name" onchange="update_sku()" required>
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
                        <div class="form-group">
                            <label class="control-label ml-3">Thumbnail Images <small class="text-danger">(Size: 290 * 300px)</small></label>
                            <div class="ml-3 mr-3">
                                <div class="row" id="thumbnail_img"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <p class="pl-2 pb-0 mb-0 bg-info">Product Inventory And Variation</p>
                        <div class="card-body pt-0 mt-1">
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid #ddd;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="unit_price">Unit price</label>
                                        <input type="number" class="form-control " name="unit_price" id="unit_price" placeholder="Enter Unit price" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="purchase_price">Unit price</label>
                                        <input type="number" min="0" value="0" step="0.01" placeholder="Purchase price" name="purchase_price" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <label for="discount">Discount</label>
                                        <input type="number" min="0" value="0" step="0.01" placeholder="Discount" name="discount" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="discount">Discount Type</label>
                                        <select class="form-control " name="discount_type" tabindex="-1" aria-hidden="true">
                                            <option value="amount">Flat</option>
                                            <option value="percent">Percent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <label for="discount">Colors</label>
                                        <select class="form-control color-var-select" name="colors[]" id="colors" multiple disabled>
                                            @foreach (\App\Model\Color::orderBy('name', 'asc')->get() as $key => $color)
                                                <option value="{{ $color->code }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="switch" style="margin-top:40px;">
                                            <input value="1" type="checkbox" name="colors_active">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <label for="attribute">Attribute</label>
                                        <select name="choice_attributes[]" id="choice_attributes" class="form-control demo-select2" multiple data-placeholder="Choose Attributes">
                                            @foreach (\App\Model\Attribute::all() as $key => $attribute)
                                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="customer_choice_options" id="customer_choice_options">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sku_combination" id="sku_combination">

                                        </div>
                                    </div>
                                </div>
                            </div>
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
        function add_more_customer_choice_option(i, name){
            $('#customer_choice_options').append('<div class="form-group"><div class="col-lg-2"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="Choice Title" readonly></div><div class="col-lg-7"><input type="text" class="form-control" name="choice_options_'+i+'[]" placeholder="Enter choice values" data-role="tagsinput" onchange="update_sku()"></div></div>');

            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }

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

            $("#thumbnail_img").spartanMultiImagePicker({
                fieldName:        'thumbnail_img',
                maxCount:         1,
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

            $(".color-var-select").select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                },
            });
            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return (
                    "<span class='color-preview' style='background-color:" +
                    colorCode +
                    ";'></span>" +
                    state.text
                );
            }


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
                $('.color-var-select').select2();

            });
        }

        $('#category_id').on('change', function() {
            get_subcategories_by_category();
        });
        $('#subcategory_id').on('change', function() {
            get_subsubcategories_by_subcategory();
        });

        //colors
        $('input[name="colors_active"]').on('change', function() {
            if(!$('input[name="colors_active"]').is(':checked')){
                $('#colors').prop('disabled', true);
            }
            else{
                $('#colors').prop('disabled', false);
            }
            //update_sku();
        });
        $('#colors').on('change', function() {
            update_sku();
        });

        $('input[name="unit_price"]').on('keyup', function() {
            update_sku();
        });

        $('input[name="name"]').on('keyup', function() {
            update_sku();
        });

        function delete_row(em){
            $(em).closest('.form-group').remove();
            update_sku();
        }

        function update_sku(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:'{{ route('admin.products.sku_combination') }}',
                data:$('#choice_form').serialize(),
                success: function(data){
                    $('#sku_combination').html(data);
                    if (data.length > 1) {
                        $('#quantity').hide();
                    }
                    else {
                        $('#quantity').show();
                    }
                }
            });
        }


    </script>
@endpush
