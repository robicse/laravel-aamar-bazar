@extends('backend.seller.layouts.master')
@section("title","Shop Settings")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/spectrum.css')}}">

@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Shop Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Shop Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <form role="form" id="choice_form" action="{{route('seller.shop.store')}}" method="post"
          enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="added_by" value="seller">
        <section class="content">
            <div class="row m-2">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-info card-outline">
                        <p class="pl-2 pb-0 mb-0 bg-info">Shop Settings</p>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Shop Name <small style="color: red">*</small></label>
                                <input type="text" class="form-control" name="name" value="{{ $shop_set->name }}" id="name" required>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="email">Logo <small>(size: 120 * 120 pixel)</small></label>--}}
{{--                                <input type="file" class="form-control" name="logo" id="logo" >--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="name">Address <small style="color: red">*</small></label>
                                <input type="text" class="form-control" name="address" value="{{ $shop_set->address }}" id="address" placeholder="Enter Address" required>
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Title <small style="color: red">*</small> </label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $shop_set->meta_title }}" placeholder="Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description <small style="color: red">*</small> </label>
                                <textarea name="meta_description" id="meta_description" rows="5" value="{{ $shop_set->meta_description }}"  class="form-control"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-info card-outline">
                        <p class="pl-2 pb-0 mb-0 bg-info">Slider Gallery</p>
                        <div class="form-group">
                            <label class="control-label ml-3">Slider Images</label>
                            <div class="ml-3 mr-3">
                                <div class="row" id="sliders"></div>
{{--                                <div class="row" id="photos_alt"></div>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label ml-3">Logo <small class="text-danger">(Size: 120 *
                                    120px)</small></label>
                            <div class="ml-3 mr-3">
                                <div class="row" id="logo"></div>

                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>

            </div>
        </section>
    </form>
@stop
@push('js')
    <script src="{{asset('backend/dist/js/spartan-multi-image-picker-min.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        function add_more_customer_choice_option(i, name) {
            $('#customer_choice_options').append('<div class="form-group row"><div class="col-lg-2 "><input type="hidden" name="choice_no[]" value="' + i + '"><input type="text" class="form-control" name="choice[]" value="' + name + '" placeholder="{{ 'Choice Title' }}" readonly></div><div class="col-lg-7"><input type="text" class="form-control" name="choice_options_' + i + '[]" placeholder="{{'Enter choice values' }}" data-role="tagsinput" onchange="update_sku()"></div></div>');

            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }

        $("#sliders").spartanMultiImagePicker({
                fieldName: 'sliders[]',
                maxCount: 10,
                rowHeight: '200px',
                groupClassName: 'col-md-4 col-sm-4 col-xs-6',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function (index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function (index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big');
                },
                // onAddRow:function(index){
                //     var altData = '<input type="text" placeholder="Image Alt" name="photos_alt[]" class="form-control" required=""></div>'
                //     //var index = index + 1;
                //     //$('#photos_alt').append('<h4 id="abc_'+index+'">'+index+'</h4>')
                //     //$('#photos_alt').append('<div class="col-md-4 col-sm-4 col-xs-6" id="abc_'+index+'">'+altData+'</div>')
                // },
                onRemoveRow : function(index){
                    var index = index + 1;
                    $(`#abc_${index}`).remove()
                },

        });
        $("#logo").spartanMultiImagePicker({
            fieldName: 'logo',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-md-4 col-sm-4 col-xs-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            },
            // onAddRow:function(index){
            //     var altData = '<input type="text" placeholder="Thumbnails Alt" name="thumbnail_img_alt[]" class="form-control" required=""></div>'
            //     //var index = index + 1;
            //     //$('#photos_alt').append('<h4 id="abc_'+index+'">'+index+'</h4>')
            //     //$('#thumbnail_img_alt').append('<div class="col-md-4 col-sm-4 col-xs-6" id="abc_'+index+'">'+altData+'</div>')
            // },
            onRemoveRow : function(index){
                var index = index + 1;
                $(`#abc_${index}`).remove()
            },
        });
    </script>
@endpush
