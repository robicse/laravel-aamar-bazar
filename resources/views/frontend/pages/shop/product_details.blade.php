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
        /* IMAGE STYLES */
        /*[type=radio] + img {*/
        /*    cursor: pointer;*/
        /*}*/
        [type=radio] + label {
            cursor: pointer;
            padding: 10px 10px;
            background-color: #fff87a;
            color: #000000;
            border-radius: 6px;
        }

        /* CHECKED STYLES */
        /*[type=radio]:checked + img {*/
        /*    background-color: #f00;*/
        /*    outline: 2px solid #f00;*/
        /*    border-radius: 10px;*/
        /*}*/
        [type=radio]:checked + label {
            border: 2px solid #282727;
            color: #212121;
        }
    </style>
@endpush
@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                {{--                <li><a href="shop-default.html">Consumer Electrics</a></li>--}}
                {{--                <li><a href="shop-default.html">Refrigerators</a></li>--}}
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
{{--                                            <div class="item"><a href="{{asset('frontend/img/products/detail/fullwidth/2.jpg')}}"><img src="{{asset('frontend/img/products/detail/fullwidth/2.jpg')}}" alt=""></a></div>--}}
{{--                                            <div class="item"><a href="{{asset('frontend/img/products/detail/fullwidth/3.jpg')}}"><img src="{{asset('frontend/img/products/detail/fullwidth/3.jpg')}}" alt=""></a></div>--}}
                                        </div>
                                    </div>
                                </figure>
                                @endif

                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    @foreach($photos as $pht)
                                    <div class="item"><img src="{{url($pht)}}" alt=""></div>
                                    @endforeach
{{--                                    <div class="item"><img src="{{asset('frontend/img/products/detail/fullwidth/2.jpg')}}" alt=""></div>--}}
{{--                                    <div class="item"><img src="{{asset('frontend/img/products/detail/fullwidth/3.jpg')}}" alt=""></div>--}}
                                </div>

                            </div>
                            <div class="ps-product__info">
                                <h1>{{ $productDetails->name }}</h1>
                                <div class="ps-product__meta">
                                    <p>Brand:<a href="{{url('/products/'.$shop->slug.'/'.$productDetails->brand->slug)}}">{{ $productDetails->brand->name }}</a></p>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>(7 review)</span>
                                    </div>
                                </div>
                                <h4 class="ps-product__price">৳<span class="price ps-product__price">{{ $price }}</span>/{{ $productDetails->unit }}</h4>
                                <div class="ps-product__desc">

                                    <p>Sold By:<a href="{{route('shop.details',$shop->slug)}}"><strong> {{ $shop->name }}</strong></a></p>
                                    <ul class="ps-list--dot">
                                        <li>  {!!  Str::limit($productDetails->description, 40)!!}</li>
{{--                                        <li> Free from the confines of wires and chords</li>--}}
                                        {{--                                        <li> 20 hours of portable capabilities</li>--}}
                                        {{--                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>--}}
                                        {{--                                        <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>--}}
                                    </ul>
                                </div>
                                <form id="option-choice-form">
                                    @csrf
                                    <div class="ps-product__variations">
                                        @if(count($colors)!=0)
                                            <figure>
                                                <figcaption>Color</figcaption>
                                                @foreach($colors as $index=>$col)
                                                    <div class="form-check form-check-inline mr-0">
                                                        <input class="form-check-input" type="radio" name="color" id="{{$col->code}}" value="{{$col->name}}" @if($index == 0) checked @endif autocomplete="off">
                                                        <label class="form-check-label" for="{{$col->code}}" style="background-color: {{$col->code}};">
                                                            {{$col->name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                {{--                                            <div class="ps-variant ps-variant--color color--1"><span class="ps-variant__tooltip">Black</span></div>--}}
                                                {{--                                            <div class="ps-variant ps-variant--color color--2"><span class="ps-variant__tooltip"> Gray</span></div>--}}
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
                                        <a class="ps-btn ps-btn--black" href="#" id="add_to_cart">Add to cart</a>
                                        {{--                                        <a class="ps-btn" href="#">Buy Now</a>--}}
                                        {{--                                        <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>--}}
                                    </div>
                                </form>
                                <div class="ps-product__specification"><a class="report" href="#">Report Abuse</a>
                                    <p><strong>SKU:</strong> SF1133569600-1</p>
                                    <p class="categories"><strong> Categories:</strong><a href="#">Consumer Electronics</a>,<a href="#"> Refrigerator</a>,<a href="#">Babies & Moms</a></p>
                                    <p class="tags"><strong> Tags</strong><a href="#">sofa</a>,<a href="#">technologies</a>,<a href="#">wireless</a></p>
                                </div>
                                <div class="ps-product__sharing"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></div>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
{{--                                <li><a href="#tab-2">Specification</a></li>--}}
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
                                    {{--                                    <a href="#">More Products from gopro</a>--}}
                                </div>
                                <div class="ps-tab" id="tab-4">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                            <div class="ps-block--average-rating">
                                                <div class="ps-block__header">
                                                    <h3>4.00</h3>
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>1 Review</span>
                                                </div>
                                                <div class="ps-block__star"><span>5 Star</span>
                                                    <div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
                                                </div>
                                                <div class="ps-block__star"><span>4 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>3 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>2 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>1 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                            <form class="ps-form--review" action="http://nouthemes.net/html/martfury/index.html" method="get">
                                                <h4>Submit Your Review</h4>
                                                <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                                <div class="form-group form-group__rating">
                                                    <label>Your rating of this product</label>
                                                    <select class="ps-rating" data-read-only="false">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" placeholder="Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            <input class="form-control" type="email" placeholder="Your Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group submit">
                                                    <button class="ps-btn">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="ps-tab" id="tab-5">--}}
{{--                                    <div class="ps-block--questions-answers">--}}
{{--                                        <h3>Questions and Answers</h3>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input class="form-control" type="text" placeholder="Have a question? Search for answer?">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="ps-tab active" id="tab-6">--}}
{{--                                    <p>Sorry no more offers available</p>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
{{--                    <aside class="widget widget_product widget_features">--}}
{{--                        <p><i class="icon-network"></i> Shipping worldwide</p>--}}
{{--                        <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>--}}
{{--                        <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>--}}
{{--                        <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>--}}
{{--                    </aside>--}}
                    {{--                    <aside class="widget widget_sell-on-site">--}}
                    {{--                        <p><i class="icon-store"></i> Sell on Martfury?<a href="#"> Register Now !</a></p>--}}
                    {{--                    </aside>--}}
{{--                    <aside class="widget widget_ads"><a href="#"><img src="{{asset('frontend/img/ads/product-ads.png')}}" alt=""></a></aside>--}}
                    <aside class="widget widget_same-brand">
                        <h3>Same Brand</h3>
                        <div class="widget__content">
                            @foreach($brands as $brand)
                            @foreach($brand->product->where('published',1)  as $product)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt=""></a>
{{--                                    <div class="ps-product__badge">-37%</div>--}}
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('shop.details',$shop->slug)}}">{{$shop->name}}</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">৳ {{$product->unit_price}}</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                        <p class="ps-product__price sale">৳ {{$product->unit_price}} <del>$41.00 </del></p>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endforeach
{{--                            <div class="ps-product">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/shop/6.jpg')}}" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-5%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Youngshop</a>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <select class="ps-rating" data-read-only="true">--}}
{{--                                                <option value="1">1</option>--}}
{{--                                                <option value="1">2</option>--}}
{{--                                                <option value="1">3</option>--}}
{{--                                                <option value="1">4</option>--}}
{{--                                                <option value="2">5</option>--}}
{{--                                            </select><span>01</span>--}}
{{--                                        </div>--}}
{{--                                        <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>--}}
{{--                                        <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </aside>
                </div>
            </div>
            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>

                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach($categories as $Cat)
                            @foreach($Cat->product->where('published',1) as $product)
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt=""></a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
{{--                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('shop.details',$shop->slug)}}">{{$shop->name}}</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price">৳ {{$product->unit_price}}</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                                            <p class="ps-product__price">৳ {{$product->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
{{--                        <div class="ps-product">--}}
{{--                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('frontend/img/products/shop/19.jpg')}}" alt=""></a>--}}
{{--                                <ul class="ps-product__actions">--}}
{{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>--}}
{{--                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>--}}
{{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>--}}
{{--                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Robert's Store</a>--}}
{{--                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>--}}
{{--                                    <div class="ps-product__rating">--}}
{{--                                        <select class="ps-rating" data-read-only="true">--}}
{{--                                            <option value="1">1</option>--}}
{{--                                            <option value="1">2</option>--}}
{{--                                            <option value="1">3</option>--}}
{{--                                            <option value="1">4</option>--}}
{{--                                            <option value="2">5</option>--}}
{{--                                        </select><span>01</span>--}}
{{--                                    </div>--}}
{{--                                    <p class="ps-product__price">$233.28</p>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>--}}
{{--                                    <p class="ps-product__price">$233.28</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <input type = "hidden" class="base_price" value="{{$price}}" autocomplete="off">
        <input type = "hidden" class="base_qty" value="{{$avilability}}" autocomplete="off">
    </div>
@endsection
@push('js')
    <script>
        $('.qtty').val(1);
        $('#option-choice-form input').on('change', function(){
            getVariantPrice($('#option-choice-form').serializeArray());
            console.log($('#option-choice-form').serializeArray());
        });
        $('#add_to_cart').on('click', function(e){
            e.preventDefault();
            //getVariantPrice($('#option-choice-form').serializeArray());
            addtocart($('#option-choice-form').serializeArray());
        });

        $('.up').on('click', function(event){
            event.preventDefault();
            var val=$('.qtty').val();
            var price=$('.price').html();
            var base_price=$('.base_price').val();
            var base_qty=$('.base_qty').val();
            // console.log(typeof base_qty);
            // console.log(typeof val);
            if(parseInt(val)<parseInt(base_qty)){
                $('.qtty').val(parseInt(val)+1);
                $('.price').html(parseInt(base_price)*(parseInt(val)+1));
            }

        });
        $('.down').on('click', function(event){
            event.preventDefault();
            var val=$('.qtty').val();
            var price=$('.price').html();
            var base_price=$('.base_price').val();
            if(parseInt(val)>1){
                $('.qtty').val(parseInt(val)-1);
                $('.price').html(parseInt(price)-parseInt(base_price));
            }
        });

        function getVariantPrice(array){
            console.log(array);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('product.variant.price')}}",
                method: "post",
                data:{
                    variant:array,
                },
                success: function(data){
                    console.log(data.response.price)
                    $('.price').html(data.response.price);
                    $('.base_price').val(data.response.price);
                    $('.aval').html(data.response.qty+" available");
                    $('.qtty').val(1);
                    $('.base_qty').val(data.response.qty);
                    //toastr.success('Lab Test added in your cart <span style="font-size: 25px;">&#10084;&#65039;</span>');
                }
            });
        }
        function addtocart(array){
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
                    // $('.base_price').val(data.response.price);
                    // $('.aval').html(data.response.qty+" available");
                    // $('.qtty').val(1);
                    // $('.base_qty').val(data.response.qty);
                    //toastr.success('Lab Test added in your cart <span style="font-size: 25px;">&#10084;&#65039;</span>');
                }
            });
        }

    </script>
@endpush
