@extends('frontend.layouts.master')
@section('title', 'Customer Address')
@push('css')
    <style>
        .form_height{
            height: 40px;
        }
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            height: 50px!important;
        }
        .select2-search--dropdown .select2-search__field {
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
            height: 40px!important;
        }
        .select2 .select2-selection--single .select2-selection__arrow:before {
            content: '\f107';
            font-family: FontAwesome;
            position: absolute;
            top: 150%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            display: block;
            margin-left: 15px;
            padding-right: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .select2-container .select2-results li {
            color: #212529;
        }
    </style>
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">

@endpush
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{('/')}}">Home</a></li>
                    <li>Addresses</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    @include('frontend.user.includes.user_sidebar')
                    <div class="col-lg-9">
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Shipping Address</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="row">
                                        @if($addresses->count() != 0)
                                            @foreach($addresses as $address)
                                                <div class="col-md-6 col-12" style="padding-bottom: 15px;">
                                                    <div class="card" style="width: 40rem;">
                                                        <div class="text-right dropdown">
                                                            <button class="btn bg-black" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="background: #f1f1f1;">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: 14px;">
                                                                @if($address->set_default == 0)
                                                                    <form action="{{route('user.update.status',$address->id)}}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-lg"> <a class="dropdown-item">Make Default</a></button>
                                                                    </form>
                                                                @endif
{{--                                                                <form action="{{route('user.address.destroy',$address->id)}}" method="POST">--}}
{{--                                                                    @csrf--}}
{{--                                                                    @method('DELETE')--}}
{{--                                                                    <button class="btn btn-lg"><a class="dropdown-item"> Delete </a></button>--}}
{{--                                                                </form>--}}
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="margin-top: -10px">
                                                            <div class="card-text">Area: <strong>{{$address->Area->name}}</strong></div>
                                                            <div class="card-text">Address: <strong>{{$address->address}}</strong></div>
                                                            <div class="card-text">City: <strong>{{$address->district->name}}</strong></div>
                                                            <div class="card-text">Phone: <strong>{{$address->phone}}</strong>  </div>
                                                            <div class="card-text">Address Type: <strong>{{$address->type}}</strong> </div>

                                                            <div class="row mt-3">
                                                                <div class="col-4">
                                                                @if($address->set_default == 1)
                                                                    <a href="#" class="btn btn-lg btn-success">Default</a>
                                                                @else
                                                                    <form action="{{route('user.update.status',$address->id)}}" method="POST">
                                                                        @csrf
                                                                        <button class="btn " style="background: purple; color: white"> <a class="dropdown-item">Make Default</a></button>
                                                                    </form>
                                                                @endif
                                                                </div>
                                                                <div class="col-4">
                                                                <a class="btn btn-lg btn-info" href="#" onclick="edit_address('{{$address->id}}');" data-toggle="modal" data-target="#exampleModal-2">Edit</a>
                                                                </div>
                                                                <div class="col-4">
                                                                    <form action="{{route('user.address.destroy',$address->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-lg btn-danger"> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="col-md-6 col-12">
                                            <div class="card" style="width: 40rem; height: 12rem;">
                                                <div class="card-body">
                                                    <h3 class="text-center">
                                                        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i></a>
                                                        <p>Add new Address</p>
                                                    </h3>
                                                </div>
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
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Shipping Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="ps-form--account-setting" id="bk_address" action="{{route('user.address.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @php
                            $districts = \App\Model\District::all();
                        @endphp
                        <div class="form-group m-2">
                            <label for="district_id" class="">District</label>
                            <select name="district_id" id="district_id" class="form_height form-control select2" style="width: 100%;" required>
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group m-2">
                            <label for="area" class="">Area</label>
                            <select name="area_id" id="area" class="form_height form-control select2" style="width: 100%;" required>
                                <option value="">Select Area</option>

                            </select>
                        </div>
                        <div class="form-group m-2">
                            <label for="phone" class="">Phone</label>
                            <input type="text" class="form-control form_height form-control-sm" name="phone" placeholder="Your phone">
                        </div>
                        <div class="form-group m-2">
                            <label for="phone" class="">Address</label>
                            <textarea name="address" id="address" rows="3" placeholder="Enter Your Address" class="form-control"></textarea>
                            <small class="text-info"><i class="fa fa-info-circle"></i> e.g. 4th Floor, BBTOA Building,9 No South, Mirpur Rd</small>
                        </div>
                        <div class="form-group m-2">
                            <label for="phone" class="">Address Type</label>
                            <select name="type" id="type" class="form_height form-control select2" style="width: 100%;" required>
                                <option value="Home">Home</option>
                                <option value="Office">Office</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group submit text-center">
                        <button class="ps-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_address_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

    </script>

    <script>
        function edit_address(id){
            $.post('{{ route('user.address-edit.modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#edit_address_modal #modal-content').html(data);
                $('#edit_address_modal').modal('show', {backdrop: 'static'});
            });
        }

    </script>
@endpush
