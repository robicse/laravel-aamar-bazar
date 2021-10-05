@extends('frontend.layouts.master')
@section('title','Best Selling Product List')
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
{{--                                <div class="ps-pagination" style="padding-left: 300px;">--}}
{{--                                    <ul class="ps-content-pagination ps-theme">--}}
{{--                                        {{$products->links()}}--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
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
                $.get("{{url('/best-selling/product/filter/')}}/"+values+'/shopId/'+{{$shop->id}},
                    function(data){

                        console.log(data)
                        $("#loader").hide()
                        $('.found_product').html(data);

                    });
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
    </script>
@endpush
