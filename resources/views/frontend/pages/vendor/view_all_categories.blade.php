@extends('frontend.layouts.master')
@section('title', $shop->name)
@push('css')
    <style>
        @media (max-width: 1440px) and (min-width: 1200px){
            .ps-shopping .row .col-xl-2 {
                max-width: 20%;
                flex-basis: 25%;
            }
        }
        @media (max-width: 1440px) and (min-width: 1200px){
            .ps-shopping .row .col-xl-2 {
                max-width: 20%;
                flex-basis: 25%;
            }
        }
    </style>
@endpush
@section('content')
    <div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>{{$shop->name}}</li>
                </ul>
            </div>
        </div>
        <div class="ps-vendor-store">
            <div class="container">
                    <div class="ps-section__right">
                        <div class="ps-block--vendor-filter">
                            <div class="ps-block__left">
                                <ul>
                                    <li class="active"><a href="#">All Categories</a></li>
                                </ul>
                            </div>
{{--                            <div class="ps-block__right">--}}
{{--                                <form class="ps-form--search" action="http://nouthemes.net/html/martfury/index.html" method="get">--}}
{{--                                    <input class="form-control" type="text" placeholder="Search in this shop">--}}
{{--                                    <button><i class="fa fa-search"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>
                        <div class="ps-shopping ps-tab-root">
{{--                            <div class="ps-shopping__header">--}}
{{--                                <p><strong>{{count($shopCategories)}} </strong> Category found</p>--}}
{{--                                <div class="ps-shopping__actions">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="row">
                                        @foreach($shopCategories as $shopCategory)
                                            @if($shopCategory->category->status !=0)
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 ">
                                                    <div class="card shadow p-3 mb-5 bg-white rounded" style="height: 182px; width: 18rem; border-radius: 0.75rem!important;" >
                                                        <div class="card-body text-center" >
                                                            <p style="color: black; font-weight: bold; font-size: 14px;">{{$shopCategory->category->name}}</p>
                                                            <a href="{{url('/shop/'.$shop->slug.'/'.$shopCategory->category->slug)}}"><img src="{{asset('uploads/categories/'.$shopCategory->category->icon)}}" alt="" width="120" height="100"></a>
                                                        </div>
                                                    </div>
{{--                                                    <div class="ps-product__thumbnail"><a href="{{url('/shop/'.$shop->slug.'/'.$shopCategory->category->slug)}}"><img src="{{asset('uploads/categories/'.$shopCategory->category->icon)}}" alt="" width="153" height="171"></a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="ps-product__container"><a class="ps-product__vendor" href=""></a>--}}
{{--                                                        <div class="ps-product__content"><a class="ps-product__title" href="{{url('/shop/'.$shop->slug.'/'.$shopCategory->category->slug)}}">{{$shopCategory->category->name}}</a>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{url('/shop/'.$shop->slug.'/'.$shopCategory->category->slug)}}">{{$shopCategory->category->name}}</a>--}}
{{--                                                            <p class="ps-product__price sale"></p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @include('frontend.includes.shop_details')
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
