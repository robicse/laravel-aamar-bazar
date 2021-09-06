@extends('frontend.layouts.master')
@section('title','Privacy Policy')
@push('css')
    <style>
        strong{
            color: black;
            font-weight: bolder;
        }
        p{
            color: black;
            font-size: 16px;

        }
    </style>
@endpush
@section('content')
    <div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
        @php
            $privacy_policy = \App\Model\DynamicPage::where('id',2)->first();
        @endphp
        <div class="ps-faqs">
            <div class="container">
                <div class="text-center">
                    <h3>PRIVACY POLICY</h3>
                </div>
                <div class="m-5">
                    {!!$privacy_policy->description!!}
                </div>

            </div>
        </div>
    </div>
@endsection
