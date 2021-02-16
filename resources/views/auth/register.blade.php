@extends('frontend.layouts.master')
@section('title', 'Register')
@push('css')
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
                <form class="ps-form--account ps-tab-root" action="{{ route('user.register') }}" method="POST" style="padding: 0px;">
                    @csrf
                    <ul class="ps-tab-list">
                        <li class="active"><a href="#register">Register</a></li>
{{--                        <li><a href="#register">Register</a></li>--}}
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="register">
                            <div class="ps-form__content">
                                <h5>Register An Account</h5>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="phone" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group submtit" style="padding-bottom: 40px;">
                                    <button class="ps-btn ps-btn--fullwidth">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
