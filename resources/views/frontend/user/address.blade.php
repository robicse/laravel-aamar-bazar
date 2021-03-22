@extends('frontend.layouts.master')
@section('title', 'User Address')
@push('css')
    <style>
        .form_height{
            height: 40px;
        }
    </style>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/barikoi/barikoi-js@b6f6295467c19177a7d8b73ad4db136905e7cad6/dist/barikoi.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>

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
                                    <h3>Address</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="row">
                                        @if(!empty($addresses))
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
                                                            <form action="{{route('user.address.destroy',$address->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-lg"><a class="dropdown-item"> Delete </a></button>
                                                            </form>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-text">Address: <strong>{{$address->address}}</strong></div>
                                                    <div class="card-text">Postal Code: <strong>{{$address->postal_code}}</strong></div>
                                                    <div class="card-text">City: <strong>{{$address->city}}</strong></div>
                                                    <div class="card-text">Country: <strong>{{$address->country}}</strong></div>
                                                    <div class="card-text">Phone: <strong>{{$address->phone}}</strong></div>
                                                    <div class="card-text">Type: <strong>{{$address->type}}</strong>
                                                    @if($address->set_default == 1)
                                                    <a href="#" class="btn btn-primary" style="margin-left: 180px;">Default</a>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                            <div class="col-md-6 col-12" style="padding-bottom: 15px;">
                                                <div class="card" style="width: 40rem; height: 12rem;">
                                                    <div class="card-body">
                                                        <h3 class="text-center">
                                                            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i></a>
                                                            <p>Add new Address</p>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
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
                                        @endif
                                    </div>
{{--                                            <figure class="ps-block--address">--}}
{{--                                                <figcaption>Customer address</figcaption>--}}
{{--                                                @if(!empty(Auth::User()->address))--}}
{{--                                                <div class="ps-block__content">--}}
{{--                                                    <h4>{{Auth::User()->address}}</h4>--}}
{{--                                                    <button class="ps-btn" style="padding: 7px 15px 7px 15px; font-size: 14px; margin-top: 10px;"><a href="#" data-toggle="modal" data-target="#exampleModal">Edit</a></button>--}}
{{--                                                </div>--}}
{{--                                                @else--}}
{{--                                                    <div class="ps-block__content">--}}
{{--                                                        <p>You haven't upload your address yet..</p><a href="#" data-toggle="modal" data-target="#exampleModal">Edit</a>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            </figure>--}}
{{--                                        <div class="col-md-6 col-12">--}}
{{--                                            <figure class="ps-block--address">--}}
{{--                                                <figcaption>Shipping address</figcaption>--}}
{{--                                                <div class="ps-block__content">--}}
{{--                                                    <p>You Have Not Set Up This Type Of Address Yet.</p><a href="edit-address.html">Edit</a>--}}
{{--                                                </div>--}}
{{--                                            </figure>--}}
{{--                                        </div>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Your Address</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form class="ps-form--account-setting" action="{{route('user.address.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="ps-form__content" style="padding-left: 50px; padding-top: 20px;">

                                    <div class="form-group row">
                                        <label for="bksearch" class="col-sm-2">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm bksearch {{ $errors->has('bksearch') ? ' is-invalid' : '' }}" value="{{ old('bksearch') }}" placeholder="Enter Your Address" name="bksearch">
                                            <div class="bklist"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden" name="address">
                                        <input type="hidden" name="city">
                                        <input type="hidden" name="area">
                                        <input type="hidden" name="latitude">
                                        <input type="hidden" name="longitude">
                                    </div>
                                    <div class="form-group row">
                                        <label for="country" class="col-sm-2">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="country" placeholder="Bangladesh" readonly>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="postal_code" class="col-sm-2">Postal Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="postal_code" placeholder="Your Postal Code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2">Phone</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="phone" placeholder="Your phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2">Type</label>
                                        <div class="col-sm-8">
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="Home">Home</option>
                                                <option value="Office">Office</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group submit" style="padding-left: 125px;" >
                                    <button class="ps-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/gh/barikoi/barikoi-js@b6f6295467c19177a7d8b73ad4db136905e7cad6/dist/barikoi.min.js?key:MTg3NzpCRE5DQ01JSkgw"></script>
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
