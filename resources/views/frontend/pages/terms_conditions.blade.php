@extends('frontend.layouts.master')
@section('title','Terms and Conditions')
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
                    <li>Terms and Conditions</li>
                </ul>
            </div>
        </div>
        @php
            $terms_and_condition = \App\Model\DynamicPage::where('id',1)->first();
        @endphp
        <div class="ps-faqs">
            <div class="container">
                <div class="text-center">
                    <h3>Terms and Conditions</h3>
                </div>
                <div class="policy m-5">
                    {!!$terms_and_condition->description!!}
                </div>

            </div>
        </div>
    </div>
@endsection
