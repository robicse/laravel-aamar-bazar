@extends('frontend.layouts.master')
@section('title', $subsubCategory->name)
@push('css')
    <style>
        a:hover {
            color: #F8EF18;
        }
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
{{--        <div class="ps-breadcrumb">--}}
{{--            <div class="container">--}}
{{--                <ul class="breadcrumb">--}}
{{--                    <li><a href="{{url('/')}}">Home</a></li>--}}
{{--                    <li>{{$shop->name}}</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="ps-vendor-store">
            <div class="container">
                    <div class="ps-section__right">
                        <div class="ps-block--vendor-filter">
                            <div class="ps-block__left">
                                <ul>
                                    <li class="active"><a href="#">{{$subsubCategory->name}}</a></li>
                                </ul>
                            </div>
                            <div class="ps-block__right">
                                <form class="ps-form--search text-right" action="{{route('shop.product.search')}}" method="get">
                                    {{--                                    <input class="form-control" type="text" placeholder="Search in this shop">--}}
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                    <input  class="form-control" id="searchMain" name="searchName" type="search" placeholder="Search in this shop" autocomplete="off">
                                    <button class="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>

{{--                        @if($featuredProducts->count() > 1)--}}
{{--                            {{CarouselProductComponent($featuredProduct)}}--}}
{{--                        @endif--}}

                        <div class="ps-shopping ps-tab-root">
                            <div class="ps-shopping__header">
                                <p><strong>{{count($products)}} </strong> Products found</p>
                                <div class="ps-shopping__actions">
                                </div>
                            </div>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="row">
                                        @forelse($products as $product)
                                            {{ProductComponent($product)}}
                                        @empty
                                            <div class="col-md-12 text-center" >
                                                <h2 class="p-0 m-0">Product Not Available!!</h2>
                                                <img src="{{asset('frontend/img/loader/nodata.png')}}"  class="img-fluid p-0 m-0" width="50%">
                                            </div>
                                        @endforelse
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
                    url: '/search/product?q=%QUERY%&storeId={{$shop->id}}',
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
                            '<div class="list-group search-results-dropdown"><div class="list-group-item">Products not found, please try another search.</div></div>'
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
