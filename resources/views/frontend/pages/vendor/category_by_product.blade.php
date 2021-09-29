@extends('frontend.layouts.master')
@section('title', $category->name)
@push('css')
    <style>
        a:hover {
            color: #fff;
        }
        .btn-new{
            border-radius: 2.50rem;
            padding: 10px 20px;
            font-size: 1.50rem;
            background: #A61E22;
            border-color: #A61E22;
            color: white;
        }
        /*.owl-item {*/
        /*    width: 110px!important;*/
        /*    margin-right: 0!important;*/
        /*}*/
        @media (max-width: 1440px) and (min-width: 1200px){
            .ps-shopping .row .col-xl-2 {
                max-width: 20%;
                flex-basis: 25%;
            }
        }

        @media only screen and (max-width: 700px) {
            .mobile_view{
                display: none;
            }
        }
        @media only screen and (min-width: 600px) {
            .web_view{
                display: none;
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
                                <li class="active"><a href="#">{{$category->name}} Products</a></li>
                            </ul>
                        </div>
                        <div class="ps-block__right">
                            <form class="ps-form--search text-right" action="" method="get">
                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                <input  class="form-control" id="searchMain" name="searchName" type="search" placeholder="Search in this shop" autocomplete="off">
                            </form>
                        </div>
                    </div>
                    <div class="ps-deal-of-day">
                        <div class="ps-container">
                            <div class="ps-section__header">
                                <div class="ps-block--countdown-deal">
                                    <div class="ps-block__left">
                                        <h4>Featured SubCategory</h4>
                                    </div>
                                    <div class="ps-block__right">
                                    </div>
                                </div>
                            </div>
                            <div class="ps-section__content mb-5" style="margin-top: -30px">
                                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="8" data-owl-item-lg="8" data-owl-item-xl="9" data-owl-duration="5000" data-owl-mousedrag="on" >
                                    @foreach($shopSubcategories as $shopSubcategory)
                                        @if($shopSubcategory->subcategory->status !=0)
                                            <button class="btn btn-lg btn-new"><a href="{{url('/shop'.'/'.$shop->slug.'/'.$category->slug.'/'.$shopSubcategory->subcategory->slug)}}">{{$shopSubcategory->subcategory->name}}</a></button>
                                            {{--                                                <div class="ps-product--inner" style=" margin-bottom: 40px;">--}}
                                            {{--                                                    <div class="card rounded-circle" style=" width:100px; height:100px; background: #fcb800;">--}}
                                            {{--                                                        <div class="card-body text-center">--}}
                                            {{--                                                            <h5 class="card-title text-center" style="margin-top: 30px" data-toggle="tooltip" title="{{$shopSubcategory->subcategory->name}}">--}}
                                            {{--                                                                <a href="{{url('/shop'.'/'.$shop->slug.'/'.$category->slug.'/'.$shopSubcategory->subcategory->slug)}}"> {!! Str::limit($shopSubcategory->subcategory->name,9) !!}</a>--}}
                                            {{--                                                            </h5>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($featuredProducts->count() > 1)
                        <div class="ps-vendor-best-seller">
                            <div class="ps-section__header">
                                <h3>Featured Products</h3>
                                <div class="ps-section__nav"><a class="ps-carousel__prev" href="#vendor-bestseller"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#vendor-bestseller"><i class="icon-chevron-right"></i></a></div>
                            </div>
                            <div class="ps-section__content" style="">
                                <div class="owl-slider" id="vendor-bestseller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="5000" data-owl-mousedrag="on">
                                    @foreach($featuredProducts as $featuredProduct)
                                        {{CarouselProductComponent($featuredProduct)}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p>All Products</p>
                            <div class="ps-shopping__actions">
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="row">
                                    @foreach($products as $product)
                                        {{ProductComponent($product)}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script !src = "">
        jQuery(document).ready(function($) {
            var product = new Bloodhound({
                remote: {
                    url: '/search/category/product?q=%QUERY%&storeId={{$shop->id}}&catId={{$category->id}}',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('searchName'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $("#searchMain").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 3
                }, {
                    source: product.ttAdapter(),
                    // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                    name: 'serviceList',
                    display: 'name',
                    // the key from the array we want to display (name,id,email,etc...)
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown"><div class="list-group-item">Sorry,We could not find any Product.</div></div>'
                        ],
                        header: [
                            // '<div class="list-group search-results-dropdown"><div class="list-group-item custom-header">Product</div>'
                        ],
                        suggestion: function (data) {
                            return '<a href="/product/'+data.slug+'" class="list-group-item custom-list-group-item">'+data.name+'</a>'
                        }
                    }
                },
            );
        });
    </script>
@endpush
