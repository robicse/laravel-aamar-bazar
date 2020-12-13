@extends('backend.seller.layouts.master')
@section("title","Manage Profile")
@push('css')
    <style>
        .bk-autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            left: 0;
            right: 0;
            z-index: 10001;
            padding: 1px!important; ;
            margin-top: 51px;
            border-radius: 0 0 5px 5px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/spectrum.css')}}">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/barikoi/barikoi-js@b6f6295467c19177a7d8b73ad4db136905e7cad6/dist/barikoi.min.css">

@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <form role="form" id="choice_form" action="{{route('seller.profile.update')}}" method="post"
          enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="added_by" value="seller">
        <section class="content">
            <div class="row m-2">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-info card-outline">
                        <p class="pl-2 pb-0 mb-0 bg-info">Manage Profile</p>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" required>
                            </div>
                            <div class="form-group">
                                <img src="{{url($shops->logo)}}">
                            </div>
{{--                            <div class="text-left">--}}
{{--                                <img class="profile-user-img img-fluid"--}}
{{--                                     src="{{asset('uploads/category/'.$serviceCat->image)}}"--}}
{{--                                     alt="Category picture">--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="logo">Photo</label>
                                <input type="file" class="form-control-file {{ $errors->has('logo') ? ' is-invalid' : '' }}" value="{{ old('logo') }}" placeholder="Enter Your Shop logo" name="logo">
{{--                                <input type="file" class="form-control" name="logo" value="{{Auth::user()->logo}}" id="logo" >--}}
                            </div>
                            <div class="form-group">
                                <label for="bksearch">Address</label>
                                <div class="form-group form-group--style-1">
                                    <input type="text" class="form-control bksearch {{ $errors->has('bksearch') ? ' is-invalid' : '' }}" value="{{Auth::user()->address}}" name="bksearch">
                                </div>
                                <div class="bklist"></div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="address">
                                <input type="hidden" name="city">
                                <input type="hidden" name="area">
                                <input type="hidden" name="latitude">
                                <input type="hidden" name="longitude">
                            </div>
                            <div class="float-center">
                                <button class="btn btn-success" type="submit">Update</button>
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
    <script src="{{asset('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/barikoi/barikoi-js@b6f6295467c19177a7d8b73ad4db136905e7cad6/dist/barikoi.min.js?key:MTg3NzpCRE5DQ01JSkgw"></script>
{{--    <script>--}}
{{--        function add_more_customer_choice_option(i, name) {--}}
{{--            $('#customer_choice_options').append('<div class="form-group row"><div class="col-lg-2 "><input type="hidden" name="choice_no[]" value="' + i + '"><input type="text" class="form-control" name="choice[]" value="' + name + '" placeholder="{{ 'Choice Title' }}" readonly></div><div class="col-lg-7"><input type="text" class="form-control" name="choice_options_' + i + '[]" placeholder="{{'Enter choice values' }}" data-role="tagsinput" onchange="update_sku()"></div></div>');--}}

{{--            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();--}}
{{--        }--}}
{{--        --}}
{{--        $("#logo").spartanMultiImagePicker({--}}
{{--            fieldName: 'logo',--}}
{{--            maxCount: 1,--}}
{{--            rowHeight: '200px',--}}
{{--            groupClassName: 'col-md-4 col-sm-4 col-xs-6',--}}
{{--            maxFileSize: '',--}}
{{--            dropFileLabel: "Drop Here",--}}
{{--            onExtensionErr: function (index, file) {--}}
{{--                console.log(index, file, 'extension err');--}}
{{--                alert('Please only input png or jpg type file')--}}
{{--            },--}}
{{--            onSizeErr: function (index, file) {--}}
{{--                console.log(index, file, 'file size too big');--}}
{{--                alert('File size too big');--}}
{{--            },--}}
{{--            // onAddRow:function(index){--}}
{{--            //     var altData = '<input type="text" placeholder="Thumbnails Alt" name="thumbnail_img_alt[]" class="form-control" required=""></div>'--}}
{{--            //     //var index = index + 1;--}}
{{--            //     //$('#photos_alt').append('<h4 id="abc_'+index+'">'+index+'</h4>')--}}
{{--            //     //$('#thumbnail_img_alt').append('<div class="col-md-4 col-sm-4 col-xs-6" id="abc_'+index+'">'+altData+'</div>')--}}
{{--            // },--}}
{{--            onRemoveRow : function(index){--}}
{{--                var index = index + 1;--}}
{{--                $(`#abc_${index}`).remove()--}}
{{--            },--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        Bkoi.onSelect(function () {
            // get selected data from dropdown list
            let selectedPlace = Bkoi.getSelectedData()
            console.log(selectedPlace)
            // center of the map
            document.getElementsByName("address")[0].value = selectedPlace.address;
            document.getElementsByName("city")[0].value = selectedPlace.city;
            document.getElementsByName("area")[0].value = selectedPlace.area;
            document.getElementsByName("latitude")[0].value = selectedPlace.latitude;
            document.getElementsByName("longitude")[0].value = selectedPlace.longitude;

        })

    </script>
@endpush
