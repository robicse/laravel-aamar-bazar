@extends('frontend.layouts.master')
@section('title', $productDetails->name)
@push('css')
    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        [type=radio] + label {
            cursor: pointer;
            padding: 10px 10px;
            background-color: #fff87a;
            color: #000000;
            border-radius: 6px;
        }
        [type=radio]:checked + label {
            border: 4px solid #282727;
            color: #212121;
        }
    </style>
@endpush
@section('content')

    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>{{$productDetails->name}}</li>
            </ul>
        </div>
    </div>

    @php
        $shop=\App\Model\Shop::where('user_id',$productDetails->user_id)->first();
    @endphp

    <div class="ps-page--product">
        <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">

                            <div class="ps-product__thumbnail" data-vertical="true">
                                @if(count($photos)!=0)
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            @foreach($photos as $key => $photo)
                                            <div class="item"><a href="{{url($photo)}}"><img src="{{url($photo)}}" alt=""></a></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </figure>
                                @endif

                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    @foreach($photos as $pht)
                                    <div class="item"><img src="{{url($pht)}}" alt=""></div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="ps-product__info">
                                <h1>{{ $productDetails->name }}</h1>
                                <div class="ps-product__meta">
                                    <p>Brand:<a href="{{url('/products/'.$shop->slug.'/'.$productDetails->brand->slug)}}">{{ $productDetails->brand->name }}</a></p>
                                    <p class="categories">
                                        <strong> Categories:</strong>
                                        <a href="{{url('/shop/'.$shop->slug.'/'.$productDetails->category->slug)}}">{{$productDetails->category->name}}</a>
                                    </p>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            @for ($i=0; $i < round($productDetails->rating); $i++)
                                                <option value="1">{{$i}}</option>
                                            @endfor
                                        </select><span>({{$reviews->count()}} review)</span>
                                    </div>
                                </div>
                                <h4 class="ps-product__price">৳ <span class="price ps-product__price">{{ $price }}</span></h4>
                                <div class="ps-product__price">
                                    <p class="">Unit: <strong>{{ $productDetails->unit }}</strong> </p>
                                </div>

                                <div class="ps-product__desc">
                                    <p>Sold By:<a href="{{route('shop.details',$shop->slug)}}"><strong> {{ $shop->name }}</strong></a></p>
                                </div>
                                <form id="option-choice-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $productDetails->id }}">
                                    <div class="ps-product__variations">
                                        @if(count($colors)!=0)
                                            <figure>
                                                <figcaption>Color</figcaption>
                                                @foreach($colors as $index=>$col)
                                                    <div class="form-check form-check-inline mr-0">
                                                        <input class="form-check-input" type="radio" name="color" id="{{$col->code}}" value="{{$col->name}}" @if($index == 0) checked @endif autocomplete="off">
                                                        <label class="form-check-label ps-variant ps-variant--color" for="{{$col->code}}" style="background-color: {{$col->code}}; border-radius: 50%;">
                                                            <span class="ps-variant__tooltip">{{$col->name}}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </figure>
                                        @endif
                                        @if(count($attributes)!=0)
                                            @foreach($attributes as $key=>$attr)
                                                @php
                                                    $att=\App\Model\Attribute::find($attr);
                                                @endphp
                                                <figure>
                                                    <figcaption>{{$att->name}}</figcaption>
                                                    @foreach($options[$key]->values as $index=>$val)
                                                        <div class="form-check form-check-inline mr-0">
                                                            <input class="form-check-input" type="radio" name="{{$att->name}}" id="{{$val}}" value="{{$val}}" @if($index == 0) checked @endif autocomplete="off">
                                                            <label class="form-check-label" for="{{$val}}">
                                                                {{$val}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </figure>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="ps-product__shopping">
                                        <figure>
                                            <figcaption>Quantity</figcaption>
                                            <div class="form-group--number">
                                                <button class="up"><i class="fa fa-plus"></i></button>
                                                <button class="down"><i class="fa fa-minus"></i></button>
                                                <input class="form-control qtty" name="quantity" type="text" placeholder="1" value="1" autocomplete="off">
                                            </div>
                                        </figure>
                                        <p class="aval">{{$avilability}} available</p>
                                        @if($productDetails->current_stock > 0)
                                        <a class="ps-btn ps-btn--black" href="#" id="add_to_cart">Add to cart</a>
                                        @else
                                            <a class="ps-btn ps-btn--danger bg-danger" href="#" disabled="disabled">Stock Out</a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
                                <li><a href="#tab-3">Shop</a></li>
                                <li><a href="#tab-4">Reviews</a></li>
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-document">
                                        <p>{!! $productDetails->description !!} </p>
                                    </div>
                                </div>

                                <div class="ps-tab" id="tab-3">
                                    <h4>{{ $shop->name }}</h4>
                                    <div class="address">Address: {{ $shop->address }}</div>
                                    <div>Email: {{ $shop->email }}</div>
                                    <div>Phone: {{ $shop->phone }}</div>
                                    <form action="{{route('shop.details',$shop->slug)}}" method="POST" style="padding-top: 10px">
                                        @csrf
                                        <a href="{{route('shop.details',$shop->slug)}}"> <button type="button" class="btn btn-lg btn-info">Go To Shop</button></a>
                                    </form>
                                </div>
                                <div class="ps-tab" id="tab-4">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                            <div class="ps-block--average-rating">
                                                <div class="ps-block__header">
                                                    <h3>{{number_format((float)$productDetails->rating, 1, '.', '')}}</h3>
                                                    <select class="ps-rating" data-read-only="true">
                                                        @for ($i=0; $i < round($productDetails->rating); $i++)
                                                            <option value="1">{{$i}}</option>
                                                        @endfor
                                                        @foreach($reviews as $review)
                                                        @endforeach
                                                    </select><span>{{$reviews->count()}} Review</span>
                                                </div>
                                                <div class="ps-block__star"><span>5 Star</span>
                                                    <div class="ps-progress" data-value="{{$fiveStarRev->count()}}"><span></span></div><span>{{$fiveStarRev->count()}}</span>
                                                </div>
                                                <div class="ps-block__star"><span>4 Star</span>
                                                    <div class="ps-progress" data-value="{{$fourStarRev->count()}}"><span></span></div><span>{{$fourStarRev->count()}}</span>
                                                </div>
                                                <div class="ps-block__star"><span>3 Star</span>
                                                    <div class="ps-progress" data-value="{{$threeStarRev->count()}}"><span></span></div><span>{{$threeStarRev->count()}}</span>
                                                </div>
                                                <div class="ps-block__star"><span>2 Star</span>
                                                    <div class="ps-progress" data-value="{{$twoStarRev->count()}}"><span></span></div><span>{{$twoStarRev->count()}}</span>
                                                </div>
                                                <div class="ps-block__star"><span>1 Star</span>
                                                    <div class="ps-progress " data-value="{{$oneStarRev->count()}}"><span></span></div><span>{{$oneStarRev->count()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                            @forelse($reviewsComments as $reviews)
                                                @php
                                                    $userData = App\User::find($reviews->user_id)
                                                @endphp
                                            <div class="row">
                                                <div class="col-md-1 p-0 m-0">
                                                    <div class="ps-widget__header">
                                                        <img src="{{url($userData->avatar_original)}}" alt="" width="60">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"><figcaption>{{$userData->name}}</figcaption></div>
                                                <div class="col-md-6">
                                                    <p>{{$reviews->comment}}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="ps-rating" data-read-only="true">
                                                        @for ($i=0; $i < round($reviews->rating); $i++)
                                                            <option value="1">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <span style="font-size: 12px; font-style: italic;">{{$reviews->updated_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                            <hr>
                                            @empty
                                                <div>
                                                    <h3 class="text-info">No review yet!!</h3>
                                                </div>
                                            @endforelse
                                            <div class="float-right">
                                                {{$reviewsComments->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
                    <aside class="widget widget_same-brand">
                        <h3>Same Brand</h3>
                        <div class="widget__content">
                            @foreach($relatedBrands  as $product)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="{{route('product-details',$product->slug)}}">
                                        <img src="{{url($product->thumbnail_img)}}" alt="" width="206" height="206">
                                    </a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="{{route('add.wishlist',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="{{url('/products/'.$shop->slug.'/'.$product->brand->slug)}}">{{ $product->brand->name }}</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                        Price: ৳ {{home_discounted_base_price($product->id)}}
                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <del>৳ {{home_base_price($product->id)}}</del>
                                        @endif
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                        Price: ৳ {{home_discounted_base_price($product->id)}}
                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <del>৳ {{home_base_price($product->id)}}</del>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
            @if($categories->count() > 1)
            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>

                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach($categories as $product)
                            <div class="ps-product" style="margin-bottom: 20px;">
                                    <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt="" width="191" height="198"></a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="{{route('add.wishlist',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('shop.details',$shop->slug)}}">{{$shop->name}}</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                            Price: ৳ {{home_discounted_base_price($product->id)}}
                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <del>৳ {{home_base_price($product->id)}}</del>
                                            @endif
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                            Price: ৳ {{home_discounted_base_price($product->id)}}
                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <del>৳ {{home_base_price($product->id)}}</del>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        <input type = "hidden" class="base_price" value="{{$price}}" autocomplete="off">
        <input type = "hidden" class="base_qty" value="{{$avilability}}" autocomplete="off">
    </div>
@endsection
@push('js')
    <script>
        $('#option-choice-form input').on('change', function(){
            getVariantPrice();
        });

        function getVariantPrice(){
            //alert('oh no!!')
            if($('#option-choice-form input[name=quantity]').val()){
                $.ajax({
                    type:"POST",
                    url: '{{ route('products.variant_price') }}',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data){
                        console.log(data.response.price)
                        $('.price').html(data.response.price);
                        $('.base_price').val(data.response.price);
                        $('.aval').html(data.response.qty+" available");
                        $('.qtty').val(1);
                        $('.base_qty').val(data.response.qty);

                        // $('#option-choice-form #chosen_price_div').removeClass('d-none');
                        // $('#option-choice-form #chosen_price_div #chosen_price').html('৳ ' +data.price);
                        // $('#available-quantity').html(data.quantity);
                        // $('.input-number').prop('max', data.quantity);
                        console.log(data.quantity);
                        if(parseInt(data.quantity) < 1 && data.digital  != 1){
                            $('.buy-now').hide();
                            $('.add-to-cart').hide();
                        }
                        else{
                            $('.buy-now').show();
                            $('.add-to-cart').show();
                        }
                    }
                });
            }
        }
    </script>
    <script>
{{--        $('.qtty').val(1);--}}
{{--        $('#option-choice-form input').on('change', function(){--}}
{{--            getVariantPrice($('#option-choice-form').serializeArray());--}}
{{--            console.log($('#option-choice-form').serializeArray());--}}
{{--        });--}}
        $('#add_to_cart').on('click', function(e){
            e.preventDefault();
            //getVariantPrice($('#option-choice-form').serializeArray());
            productAddtocart($('#option-choice-form').serializeArray());
        });

{{--        $('.up').on('click', function(event){--}}
{{--            event.preventDefault();--}}
{{--            var val=$('.qtty').val();--}}
{{--            var price=$('.price').html();--}}
{{--            var base_price=$('.base_price').val();--}}
{{--            var base_qty=$('.base_qty').val();--}}
{{--            // console.log(typeof base_qty);--}}
{{--            // console.log(typeof val);--}}
{{--            if(parseInt(val)<parseInt(base_qty)){--}}
{{--                $('.qtty').val(parseInt(val)+1);--}}
{{--                $('.price').html(parseInt(base_price)*(parseInt(val)+1));--}}
{{--            }--}}

{{--        });--}}
{{--        $('.down').on('click', function(event){--}}
{{--            event.preventDefault();--}}
{{--            var val=$('.qtty').val();--}}
{{--            var price=$('.price').html();--}}
{{--            var base_price=$('.base_price').val();--}}
{{--            if(parseInt(val)>1){--}}
{{--                $('.qtty').val(parseInt(val)-1);--}}
{{--                $('.price').html(parseInt(price)-parseInt(base_price));--}}
{{--            }--}}
{{--        });--}}

{{--        function getVariantPrice(array){--}}
{{--            console.log(array);--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--            $.ajax({--}}
{{--                url: "{{route('product.variant.price')}}",--}}
{{--                method: "post",--}}
{{--                data:{--}}
{{--                    variant:array,--}}
{{--                },--}}
{{--                success: function(data){--}}
{{--                    console.log(data.response.price)--}}
{{--                    $('.price').html(data.response.price);--}}
{{--                    $('.base_price').val(data.response.price);--}}
{{--                    $('.aval').html(data.response.qty+" available");--}}
{{--                    $('.qtty').val(1);--}}
{{--                    $('.base_qty').val(data.response.qty);--}}
{{--                    //toastr.success('Lab Test added in your cart <span style="font-size: 25px;">&#10084;&#65039;</span>');--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

        function productAddtocart(array){
            //console.log(array);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('product.add.cart')}}",
                method: "post",
                data:{
                    variant:array,
                    product_id: "{{$productDetails->id}}",
                    product_name:"{{$productDetails->name}}",
                    product_price:"{{$productDetails->unit_price}}",
                },
                success: function(data){
                    console.log(data.response)
                    $('.cart_count').html(data.response.countCart);
                    $('.cart_item').append(`<div class="ps-product--cart-mobile">
                                            <div class="ps-product__thumbnail"><a href="#"><img src="/${data.response['options'].image}" alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__remove" href=""><i class="icon-cross"></i></a><a href="#">${data.response.name}</a>
                                                <p><small>${data.response.qty} x ${data.response.price}</small>
                                            </div>
                                        </div>`);
                    $('.subTotal').html(data.response.subtotal);
                    toastr.success('success', 'Product added to your cart.');
                    // $('.base_price').val(data.response.price);
                    // $('.aval').html(data.response.qty+" available");
                    // $('.qtty').val(1);
                    // $('.base_qty').val(data.response.qty);
                    //toastr.success('Lab Test added in your cart <span style="font-size: 25px;">&#10084;&#65039;</span>');
                }
            });
        }
    </script>

{{--    </script>--}}
@endpush
