@extends('frontend.layouts.master')
@section('title',$category->name)
@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Products</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
                            @foreach($shopCat as $Cat)
                                <li class="current-menu-item menu-item-has-children"><a href="#"> {{$Cat->category->name}} </a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    @php
                                        $subcategories = \App\Model\ShopSubcategory::where('category_id',$Cat->category_id)->latest()->get();
                                    @endphp
                                    <ul class="sub-menu">
                                        @foreach($subcategories as $subCat)
                                            <li class="current-menu-item "><a href="{{url('/products/'.$shop->slug.'/'.$Cat->category->slug.'/'.$subCat->subcategory->slug)}}">{{$subCat->subcategory->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">BY BRANDS</h4>
                        <form class="ps-form--widget-search" action="http://nouthemes.net/html/martfury/do_action" method="get">
                            <input class="form-control" type="text" placeholder="">
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                        <figure class="ps-custom-scrollbar" data-height="250">
                            @foreach($shopBrand as $Brand)
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="{{$Brand->brand_id}}" name="brand">
                                    <label for="{{$Brand->brand_id}}">{{$Brand->brand->name}}</label>
                                </div>
                            @endforeach
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div id="nonlinear"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value">৳<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">৳<span class="ps-slider__max"></span></span></p>
                        </figure>
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong>{{ count($products) }}</strong> Products found</p>
                            {{--                            <div class="ps-shopping__actions">--}}
                            {{--                                <select class="ps-select" data-placeholder="Sort Items">--}}
                            {{--                                    <option>Sort by latest</option>--}}
                            {{--                                    <option>Sort by popularity</option>--}}
                            {{--                                    <option>Sort by average rating</option>--}}
                            {{--                                    <option>Sort by price: low to high</option>--}}
                            {{--                                    <option>Sort by price: high to low</option>--}}
                            {{--                                </select>--}}
                            {{--                                <div class="ps-shopping__view">--}}
                            {{--                                    <p>View</p>--}}
                            {{--                                    <ul class="ps-tab-list">--}}
                            {{--                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>--}}
                            {{--                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row found_product">
                                        @foreach($products as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                <div class="ps-product">
                                                    <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt=""></a>
                                                        <ul class="ps-product__actions">
                                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                            <li><a href="{{route('add.wishlist',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                            {{--                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
                                                        </ul>
                                                    </div>
                                                    <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('shop.details',$shop->slug)}}">{{ $shop->name }}</a>
                                                        <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                                            <p class="ps-product__price">৳ {{$product->unit_price}}</p>
                                                        </div>
                                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                                            <p class="ps-product__price">৳ {{$product->unit_price}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="ps-pagination">
                                    <ul class="ps-content-pagination ps-theme">
                                        {{$products->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var timeout = 0;
        var update = function (values) {
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '/product/filter/'+values+'/sellerId/'+{{$shop->user_id}},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('.found_product').empty();
                        if(data.length==0){
                            $('.found_product').append('<h3 class="ml-5">Nothing Found</h3>');
                            $('.found_product_length').html(data.length);
                        }else{
                            $('.found_product_length').html(data.length);
                            var i=0;
                            for(i=0;i<data.length;i++){
                                $('.found_product').append(`<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                <div class="ps-product">
                                                    <div class="ps-product__thumbnail"><a href="/product/${data[i].slug}"><img src="{{url('/')}}/${data[i].thumbnail_img}" alt=""></a>
                                                        <ul class="ps-product__actions">
                                                            <li><a href="/product/${data[i].slug}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                            <li><a href="/product/${data[i].slug}" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                            <li><a href="/add/wishlist/${data[i].id}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                            {{--                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                                        <div class="ps-product__content"><a class="ps-product__title" href="/product/${data[i].slug}">${data[i].name}</a>
                                                            <p class="ps-product__price">৳ ${data[i].unit_price}</p>
                                                        </div>
                                                        <div class="ps-product__content hover"><a class="ps-product__title" href="/product/${data[i].slug}">${data[i].name}</a>
                                                            <p class="ps-product__price">৳ ${data[i].unit_price}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`);
                            }
                        }
                    },error:function(){
                        console.log(data);
                    }
                });
            }, 1000);
        };
        function filterSlider() {
            var nonLinearSlider = document.getElementById('nonlinear');
            if (typeof nonLinearSlider != 'undefined' && nonLinearSlider != null) {
                noUiSlider.create(nonLinearSlider, {
                    connect: true,
                    behaviour: 'tap',
                    start: [0, 1000],
                    range: {
                        min: 0,
                        '10%': 100,
                        '20%': 200,
                        '30%': 300,
                        '40%': 400,
                        '50%': 500,
                        '60%': 600,
                        '70%': 700,
                        '80%': 800,
                        '90%': 900,
                        max: 1000,
                    },
                });
                var nodes = [
                    document.querySelector('.ps-slider__min'),
                    document.querySelector('.ps-slider__max'),
                ];

                nonLinearSlider.noUiSlider.on('update', function(values, handle) {
                    //console.log(values)
                    var wto;
                    nodes[handle].innerHTML = Math.round(values[handle]);
                    var filter_price = Math.round(values[handle]);
                    /*clearTimeout(wto);
                    wto  = setTimeout(function() {
                        $.ajax({
                            type: 'GET', //THIS NEEDS TO BE GET
                            url: '/product/filter/'+values,
                            dataType: 'json',
                            success: function (data) {
                                console.log(data);
                            },error:function(){
                                console.log(data);
                            }
                        });
                    }, 5000);*/

                    update(values);
                });
            }
        }
    </script>
@endpush
