@extends('frontend.layouts.master')
@section('title', 'Shop List')
@push('css')
@endpush
@section('content')
    <div class="ps-page--single ps-page--vendor">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Shop List</li>
                </ul>
            </div>
        </div>
        <section class="ps-store-list">
            <div class="container">
                <div class="ps-section__header">
                    @include('frontend.includes.sliders')
{{--                    <h3>Store list</h3>--}}
                </div>
                <div class="ps-section__wrapper">
                    <div class="ps-section__left">
                        <aside class="widget widget--vendor">
                            <h3 class="widget-title">Search</h3>
{{--                            <input class="form-control" type="text" placeholder="Search...">--}}
                            <input  class="form-control" id="searchMain" name="searchName" type="search" placeholder="Search..." autocomplete="off">
                        </aside>
{{--                        <aside class="widget widget--vendor">--}}
{{--                            <h3 class="widget-title">Filter by Category</h3>--}}
{{--                            <div class="form-group">--}}
{{--                                <select class="ps-select">--}}
{{--                                    <option>Lighting</option>--}}
{{--                                    <option>Exterior</option>--}}
{{--                                    <option>Custom Grilles</option>--}}
{{--                                    <option>Wheels & Tires</option>--}}
{{--                                    <option>Performance</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </aside>--}}
{{--                        <aside class="widget widget--vendor">--}}
{{--                            <h3 class="widget-title">Filter by Location</h3>--}}
{{--                            <div class="form-group">--}}
{{--                                <select class="ps-select">--}}
{{--                                    <option>Chooose Location</option>--}}
{{--                                    <option>Exterior</option>--}}
{{--                                    <option>Custom Grilles</option>--}}
{{--                                    <option>Wheels & Tires</option>--}}
{{--                                    <option>Performance</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <select class="ps-select">--}}
{{--                                    <option>Chooose State</option>--}}
{{--                                    <option>Exterior</option>--}}
{{--                                    <option>Custom Grilles</option>--}}
{{--                                    <option>Wheels & Tires</option>--}}
{{--                                    <option>Performance</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input class="form-control" type="text" placeholder="Search by City">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input class="form-control" type="text" placeholder="Search by ZIP">--}}
{{--                            </div>--}}
{{--                        </aside>--}}
                    </div>
                    <div class="ps-section__right">
                        <section class="ps-store-box">
                            <div class="ps-section__header">
                                <p>Showing 1 -8 of 22 results</p>
                                <select class="ps-select" name="sortby">
                                    <option value="1">Sort by Newest: old to news</option>
                                    <option value="2">Sort by Newest: New to old</option>
                                    <option value="3">Sort by average rating: low to hight</option>
                                </select>
                            </div>
                            <div class="ps-section__content">
                                <div class="row">
                                    @foreach($shops as $shop)
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                        <article class="ps-block--store">
                                            <div class="ps-block__thumbnail bg--cover" data-background="{{url($shop->logo)}}"></div>
                                            <div class="ps-block__content">
                                                <div class="ps-block__author"><a class="ps-block__user" href="#"><img src="{{url($shop->logo)}}" alt=""></a><a class="ps-btn" href="{{route('shop.details',$shop->slug)}}">Visit Store</a></div>
                                                <h4>{{$shop->name}}</h4>
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                                <p>{{$shop->address}}</p>
{{--                                                <ul class="ps-block__contact">--}}
{{--                                                    <li><i class="icon-envelope"></i><a href="http://nouthemes.net/cdn-cgi/l/email-protection#7a1915140e1b190e3a021215171f54191517"><span class="__cf_email__" data-cfemail="9cfff3f2e8fdffe8dce4f4f3f1f9b2fff3f1">[email&#160;protected]</span></a></li>--}}
{{--                                                    <li><i class="icon-telephone"></i> (+093) 77-637-3300</li>--}}
{{--                                                </ul>--}}
{{--                                                <div class="ps-block__inquiry"><a href="#"><i class="icon-question-circle"></i> inquiry</a></div>--}}
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script !src = "">
        jQuery(document).ready(function($) {
            var shop = new Bloodhound({
                remote: {
                    url: '/search/shop?q=%QUERY%',
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
                    source: shop.ttAdapter(),
                    // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                    name: 'serviceList',
                    display: 'name',
                    // the key from the array we want to display (name,id,email,etc...)
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown"><div class="list-group-item">Sorry,We could not find any Shop.</div></div>'
                        ],
                        header: [
                            // '<div class="list-group search-results-dropdown"><div class="list-group-item custom-header">Shop</div>'
                        ],
                        suggestion: function (data) {
                            return '<a href="/shop/'+data.slug+'" class="list-group-item custom-list-group-item">'+data.name+'</a>'
                        }
                    }
                },
            );
        });
    </script>
@endpush
