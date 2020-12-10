@extends('frontend.layouts.master')
@section('title', 'Register as Seller')
@push('css')
    <style>
        .ps-form--account {
            max-width: 600px;
            margin: 0 auto;
            padding-top: 0;
        }
        .ps-breadcrumb {
            padding: 12px 0;
            background-color: #f1f1f1;
        }
        .input-group--style-1 .input-group-addon {
            padding: 8px 5px;
        }
        .input-group-addon {
            color: #555;
            font-size: 20px;
            border: 1.5px solid #ddd;
            background-color: #FFF;
            border-color: #e6e6e6;
            -webkit-transition: background-color 0.2s linear;
            -ms-transition: background-color 0.2s linear;
            transition: background-color 0.2s linear;
        }
    </style>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/barikoi/barikoi-js@b6f6295467c19177a7d8b73ad4db136905e7cad6/dist/barikoi.min.css">
@endpush
@section('content')
    <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Register</li>
                </ul>
            </div>
        </div>
        <div class="ps-my-account">
            <div class="container">
                <form class="ps-form--account ps-tab-root" action="{{ route('user.register') }}" method="POST">
                    @csrf
                    <ul class="ps-tab-list">
                        <li class="active"><a href="#register">Be A Seller</a></li>
{{--                        <li><a href="#register">Register</a></li>--}}
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="register">
                            <div class="ps-form__content">
                                <div class="">
                                    <h5>Register An Account</h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Enter Your Name" name="name">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Enter Your Email" name="email">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="Enter Your Phone" name="phone">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" placeholder="Enter Your password" name="password">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" placeholder="Enter Your confirm password" name="password_confirmation">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <h5>Store Info</h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="text" class="form-control{{ $errors->has('shop_name') ? ' is-invalid' : '' }}" value="{{ old('shop_name') }}" placeholder="Enter Your Shop Name" name="shop_name">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-home" aria-hidden="true"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Area </label>
                                        <input type="text" class="bksearch form-control" name="bksearch"
                                               value="">
                                        <div class="bklist">
                                        </div>
                                        <input type="text" name="city">
                                        <input type="text" name="area">
                                        <input type="text" name="latitude">
                                        <input type="text" name="longitude">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" placeholder="Enter Your Shop Address" name="address">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-map" aria-hidden="true"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="logo">Shop Logo</label>
                                                <div class="input-group ">
                                                    <input type="file" class="form-control-file {{ $errors->has('logo') ? ' is-invalid' : '' }}" value="{{ old('logo') }}" placeholder="Enter Your Shop logo" name="logo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Save</button>
                                </div>

                            </div>
                           {{-- <div class="ps-form__footer">
                                <p>Connect with:</p>
                                <ul class="ps-list--social">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
