@extends('frontend.layouts.master')
@section('title', $subCategory->name)
@push('css')
    <style>
        a:hover {
            color: #F8EF18;
        }
        .btn-new{
            border-radius: 2.50rem;
            font-size: 1.50rem;
            background: #A61E22;
            border-color: #A61E22;
            color: white;
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
                                    <li class="active"><a href="#">{{$subCategory->name}}</a></li>
                                </ul>
                            </div>
                            <div class="ps-block__right">
                                <form class="ps-form--search text-right" action="{{route('subcategory.product.search')}}" method="get">
{{--                                    <input class="form-control" type="text" placeholder="Search in this shop">--}}
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                    <input type="hidden" name="subcategory_id" value="{{ $subCategory->id }}">
                                    <input  class="form-control" id="searchMain" name="searchName" type="search" placeholder="Search in this shop" autocomplete="off">
                                    <button class="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        @if($subSubCategories->count() > 0)
                        <div class="ps-deal-of-day">
                            <div class="ps-container">
                                <div class="ps-section__header">
                                    <div class="ps-block--countdown-deal">
                                        <div class="ps-block__left">
                                            <h4>Featured Sub-child Category</h4>
                                        </div>
                                        <div class="ps-block__right">
                                        </div>
                                    </div>

                                </div>
                                <div class="ps-section__content mb-5" style="margin-top: -30px">
                                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="5000" data-owl-mousedrag="on">
                                        @foreach($subSubCategories as $subSubCategory)
                                            @if($subSubCategory->subsubcategory->status !=0)
                                        <a class="btn btn-new" href="{{url('/shop'.'/'.$shop->slug.'/'.$category->slug.'/'.$subCategory->slug.'/'.$subSubCategory->subsubcategory->slug)}}">{{$subSubCategory->subsubcategory->name}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
{{--                        @if($featuredProducts->count() > 1)--}}
{{--                            <div class="ps-vendor-best-seller">--}}
{{--                                <div class="ps-section__header">--}}
{{--                                    <h3>Featured Products</h3>--}}
{{--                                    <div class="ps-section__nav"><a class="ps-carousel__prev" href="#vendor-bestseller"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#vendor-bestseller"><i class="icon-chevron-right"></i></a></div>--}}
{{--                                </div>--}}
{{--                                <div class="ps-section__content">--}}
{{--                                    <div class="owl-slider" id="vendor-bestseller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">--}}
{{--                                        @foreach($featuredProducts as $featuredProduct)--}}
{{--                                            {{CarouselProductComponent($featuredProduct)}}--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
                                        @foreach($products as $product)
                                            {{ProductComponent($product)}}
                                        @endforeach
                                    </div>
                                    {{--                                    <div class="ps-pagination">--}}
                                    {{--                                        <ul class="pagination">--}}
                                    {{--                                            <li class="active"><a href="#">1</a></li>--}}
                                    {{--                                            <li><a href="#">2</a></li>--}}
                                    {{--                                            <li><a href="#">3</a></li>--}}
                                    {{--                                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </div>--}}
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
                    url: '/search/subcategory/product?q=%QUERY%&storeId={{$shop->id}}&CatId={{$category->id}}&subCatId={{$subCategory->id}}',
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

        $(document).ready(function() {
            $(".owl-item").css("width", "");
        });
    </script>
@endpush
