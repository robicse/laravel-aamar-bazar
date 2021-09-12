@extends('frontend.layouts.master')
@section('title', 'Contact')
@section('content')
    <div class="ps-page--single" id="contact-us">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Contact Us</li>
                </ul>

            </div>
        </div>
        {{--        <div id="contact-map" data-address="17 Queen St, Southbank, Melbourne 10560, Australia" data-title="Funiture!" data-zoom="17"></div>--}}
        {{--        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14604.557245622878!2d90.360452!3d23.778053!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x14c0ec04f1828c03!2saccounting%20software%20in%20bangladesh%20-%20Staritltd!5e0!3m2!1sen!2sbd!4v1610961117516!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>--}}
        <div class="ps-contact-info">
            <div class="container row">
                <div class="col-6">
                    <form class="ps-form--contact-us" action="{{route('contact.store')}}" method="POST">
                        @csrf
                        <h4 class="text-center pb-2">Get In Touch</h4>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" placeholder="Name *">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email *">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="subject" placeholder="Subject *">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group submit">
                            <button class="ps-btn">Send message</button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <div class="pb-2">
                        <h4 class="text-center">Contact Us For Any Questions</h4>
                    </div>
                    <div class="ps-section__content">
                        <div class="m-4">
                            <div><b>Address:</b> 707/1, Ashidag, West Ibrahimpur, Kafrul, Dhaka - 1206</div>
                            <div><b>Phone:</b> 01820001999</div>
                            <div><b>Email:</b> info@mudihat.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-contact-form">
            <div class="container">

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('frontend/plugins/gmap3.min.js')}}"></script>
@endpush
