@extends('frontend.layouts.master')
@section('title',$subcategory->name)
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
                @include('frontend.includes.product_sidebar')
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p>Products found</p>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row found_product">
                                        @foreach($products as $product)
                                            {{ProductComponentTwo($product)}}
                                        @endforeach
                                            <div class="filter_result" id="products"></div>
                                    </div>
                                    <div class="col-md-12 text-center" id="loader" style="display: none;">
                                        <img  src="{{asset('frontend/img/loader/loding3.gif')}}"  class="img-fluid " width="10%">
                                    </div>
                                </div>
                                <div class="ps-pagination" style="padding-left: 300px;">
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
                    $('.filterdata').empty();
                    $("#loader").show()
                    $.get("{{url('/todays-deal/subcategories/filter/')}}/"+values+'/sellerId/'+'{{$shop->id}}'+'/sub/'+{{$subcategory->id}},
                        function(data){

                            console.log(data)
                            $("#loader").hide()
                            $('.found_product').html(data);

                        });
                    {{--$.ajax({--}}
                    {{--    type: 'GET', //THIS NEEDS TO BE GET--}}
                    {{--    url: '/todays-deal/subcategories/filter/'+values+'/sellerId/'+'{{$shop->id}}'+'/sub/'+{{$subcategory->id}},--}}
                    {{--    dataType: 'json',--}}
                    {{--    success: function (data) {--}}
                    {{--        console.log(data);--}}
                    {{--        $('.found_product').empty();--}}
                    {{--        if(data.length==0){--}}
                    {{--            $('.found_product').append('<h3 class="ml-5">Nothing Found</h3>');--}}
                    {{--            $('.found_product_length').html(data.length);--}}
                    {{--        }else{--}}
                    {{--            $('.found_product_length').html(data.length);--}}
                    {{--            var i=0;--}}
                    {{--            for(i=0;i<data.length;i++){--}}
                    {{--                $('.found_product').append(`<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">--}}
                    {{--                                <div class="ps-product">--}}
                    {{--                                    <div class="ps-product__thumbnail"><a href="/product/${data[i].slug}"><img src="{{url('/')}}/${data[i].thumbnail_img}" alt="" width="153" height="171"></a>--}}
                    {{--                                        <ul class="ps-product__actions">--}}
                    {{--                                            <li><a href="/product/${data[i].slug}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>--}}
                    {{--                                            <li><a href="/product/${data[i].slug}" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
                    {{--                                            <li><a href="/add/wishlist/${data[i].id}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
                    {{--                                                                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
                    {{--                </ul>--}}
                    {{--            </div>--}}
                    {{--            <div class="ps-product__container">--}}
                    {{--                                        <div class="ps-product__content"><a class="ps-product__title" href="/product/${data[i].slug}">${data[i].name}</a>--}}
                    {{--                                            <p class="ps-product__price">৳ ${data[i].unit_price}</p>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="ps-product__content hover"><a class="ps-product__title" href="/product/${data[i].slug}">${data[i].name}</a>--}}
                    {{--                                            <p class="ps-product__price">৳ ${data[i].unit_price}</p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>`);--}}
                    {{--            }--}}
                    {{--        }--}}
                    {{--    },error:function(){--}}
                    {{--        console.log(data);--}}
                    {{--    }--}}
                    {{--});--}}
                }, 1000);
            };
            function filterSlider() {
                var nonLinearSlider = document.getElementById('nonlinear');
                if (typeof nonLinearSlider != 'undefined' && nonLinearSlider != null) {
                    noUiSlider.create(nonLinearSlider, {
                        connect: true,
                        behaviour: 'tap',
                        start: [0, 100000],
                        range: {
                            min: 0,
                            '10%': 10000,
                            '20%': 20000,
                            '30%': 30000,
                            '40%': 40000,
                            '50%': 50000,
                            '60%': 60000,
                            '70%': 70000,
                            '80%': 80000,
                            '90%': 90000,
                            max: 100000,
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
            function subcatId(id){

            }
        </script>
@endpush
