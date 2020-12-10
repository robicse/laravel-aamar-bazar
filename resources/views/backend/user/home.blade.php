@extends('frontend.layouts.master')
@section('title', 'User Dashboard')
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>User Information</li>
                </ul>
{{--                <div class="text-right">Logout</div>--}}
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    @include('backend.user.includes.user_sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="{{route('user.profile-update')}}" method="POST">
                                @csrf
                                <div class="ps-form__header">
                                    <h3> User Information</h3>
                                </div>
                                <div class="ps-form__content">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name" value="{{ Auth::User()->name }}" placeholder="Please enter your name...">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control" type="number" name="phone" value="{{ Auth::User()->phone }}" placeholder="Please enter phone number...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" value="{{ Auth::User()->email }}" placeholder="Please enter your email...">
                                            </div>
                                        </div>
{{--                                        <div class="col-sm-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Birthday</label>--}}
{{--                                                <input class="form-control" type="text" placeholder="Please enter your birthday...">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Gender</label>--}}
{{--                                                <select class="form-control">--}}
{{--                                                    <option value="1">Male</option>--}}
{{--                                                    <option value="2">Female</option>--}}
{{--                                                    <option value="3">Other</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="ps-newsletter">
            <div class="ps-container">
                <form class="ps-form--newsletter" action="http://nouthemes.net/html/martfury/do_action" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" placeholder="Email address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
