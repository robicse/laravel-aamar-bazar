@extends('frontend.layouts.master')
@section('title', 'Login')
@section('content')
    <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
        <div class="ps-my-account" >
            <div class="container">
                <form class="ps-form--account ps-tab-root" action="{{ route('login') }}" method="POST" style="padding: 0px;">
                    @csrf
                    <ul class="ps-tab-list">
                        <li class="active"><a href="#sign-in">Login</a></li>
{{--                        <li><a href="#register">Register</a></li>--}}
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="sign-in">
                            <div class="ps-form__content">
                                <h5>Log In Your Account</h5>
                                <div class="form-group">
                                    <input id="phone" type="text" placeholder="Enter your Phone Number"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
{{--                                    <input class="form-control" id="email" type="email" placeholder="Email address">--}}
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <input type="number" name="phone" id="phone" class="form-control floating" placeholder="Enter your Phone Number" required>--}}
{{--                                    --}}{{--                                    <input class="form-control" id="email" type="email" placeholder="Email address">--}}
{{--                                </div>--}}
                                <div class="form-group form-forgot">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
{{--                                    <input class="form-control" type="text" placeholder="Password"><a href="#">Forgot?</a>--}}
                                </div>
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="remember-me" name="remember-me">
                                        <label for="remember-me">Rememeber me</label>
                                    </div>
                                </div>
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Login</button>
                                </div>
                            </div>
                            <div class="ps-form__footer">
                                <p>Connect with:</p>
                                <ul class="ps-list--social">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
{{--                        <div class="ps-tab" id="register">--}}
{{--                            <div class="ps-form__content">--}}
{{--                                <h5>Register An Account</h5>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" type="text" placeholder="Username or email address">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" type="text" placeholder="Password">--}}
{{--                                </div>--}}
{{--                                <div class="form-group submtit">--}}
{{--                                    <button class="ps-btn ps-btn--fullwidth">Login</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ps-form__footer">--}}
{{--                                <p>Connect with:</p>--}}
{{--                                <ul class="ps-list--social">--}}
{{--                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

