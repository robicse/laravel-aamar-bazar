@extends('frontend.layouts.master')
@section('title', 'User Address')
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{('/')}}">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li>Addresses</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    @include('frontend.user.includes.user_sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Address</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <figure class="ps-block--address">
                                                <figcaption>Customer address</figcaption>
                                                @if(!empty(Auth::User()->address))
                                                <div class="ps-block__content">
                                                    <h4>{{Auth::User()->address}}</h4>
                                                    <button class="ps-btn" style="padding: 7px 15px 7px 15px; font-size: 14px; margin-top: 10px;"><a href="#" data-toggle="modal" data-target="#exampleModal">Edit</a></button>
                                                </div>
                                                @else
                                                    <div class="ps-block__content">
                                                        <p>You haven't upload your address yet..</p><a href="#" data-toggle="modal" data-target="#exampleModal">Edit</a>
                                                    </div>
                                                @endif
                                            </figure>
                                        </div>
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
                        <form class="ps-form--account-setting" action="{{route('user.address-update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="ps-form__content">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address"></textarea>
                                        {{--                                    <input class="form-control" type="text" name="name" value="{{ Auth::User()->name }}" placeholder="Please enter your name...">--}}
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn">Update</button>
                                </div>
                            </div>

                        </form>
{{--                        <form class="form-horizontal" action="{{route('career.store',$jobDetails->id)}}" method="post" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <fieldset class="modal-body">--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-sm-6">--}}
{{--                                        <label>Your Name</label>--}}
{{--                                        <input class="form-control" placeholder="Enter your name" id="name" value="" name="name" required="" type="text">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-6">--}}
{{--                                        <label>Your Email</label>--}}
{{--                                        <input class="form-control" id="email" placeholder="you@yourdomain.com" value="" name="email" required="" type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-sm-6">--}}
{{--                                        <label>Your Phone</label>--}}
{{--                                        <input class="form-control" placeholder="Enter your Phone number" id="contact_number" value="" name="contact_number" required="" type="text">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-6">--}}
{{--                                        --}}{{--                                <input class="form-control" id="input-email" placeholder="you@yourdomain.com" value="" name="email" required="" type="text">--}}
{{--                                        <label for="CV">Upload your CV</label>--}}
{{--                                        <input type="file" name="cv" placeholder="CV" required="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                --}}{{--                        <div class="form-group">--}}
{{--                                --}}{{--                            <div class="col-sm-12">--}}
{{--                                --}}{{--                                <label>Subject</label>--}}
{{--                                --}}{{--                                <input class="form-control" id="input-subject" placeholder="" value="" name="email" required="" type="text">--}}
{{--                                --}}{{--                            </div>--}}
{{--                                --}}{{--                        </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-sm-12">--}}
{{--                                        <label>Message</label>--}}
{{--                                        <textarea class="form-control" id="msg" rows="10" name="msg" placeholder="Enter Message" required=""></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="button">--}}
{{--                                    <button type="submit" value="Submit" class="btn btn-primary btnus">SUBMIT</button>--}}
{{--                                </div>--}}
{{--                            </fieldset>--}}
{{--                        </form>--}}
                        {{--                <form action="" method="post">--}}
                        {{--                    <div class="row" style="padding: 10px 0px 0px 150px;">--}}
                        {{--                        <div class="col-lg-8 col-6">--}}
                        {{--                            <div class="small-box bg-info">--}}
                        {{--                                <div class="inner text-center">--}}
                        {{--                                    <p>Pending Balance</p>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="modal-body">--}}
                        {{--                        @csrf--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleFormControlInput1">Amount</label>--}}
                        {{--                            <input type="number" name="amount" class="form-control" id="exampleFormControlInput1">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleFormControlTextarea1">Message</label>--}}
                        {{--                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"></textarea>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="modal-footer">--}}
                        {{--                        <button type="submit" class="btn btn-success">Send</button>--}}
                        {{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                        {{--                    </div>--}}
                        {{--                </form>--}}
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
