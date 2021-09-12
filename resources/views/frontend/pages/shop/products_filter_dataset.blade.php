@forelse($products as $product)
    @if($product->category->status !=0 || $product->subCategory->status !=0 || $product->subSubCategory->status !=0)
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
        <div class="ps-product">
            <div class="ps-product__thumbnail"><a href="{{route('product-details',$product->slug)}}"><img src="{{url($product->thumbnail_img)}}" alt="" width="153" height="171"></a>
                <ul class="ps-product__actions">
                    <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                    <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                    <li><a href="{{route('add.wishlist',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                    {{--                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
                </ul>
            </div>
            <div class="ps-product__container">
                <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                    <div>
                        Unit: {{ProductUnit($product->id)}}
                    </div>
                    @if($product->variant_product != 0)
                        Price:৳ {{VariantPrice($product->id)}}
                    @else
                        Price: ৳ {{home_discounted_base_price($product->id)}}
                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                            <del>৳ {{home_base_price($product->id)}}</del>
                        @endif
                    @endif

                </div>
                <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                    <div>
                        Unit: {{ProductUnit($product->id)}}
                    </div>
                    @if($product->variant_product != 0)
                        Price:৳ {{VariantPrice($product->id)}}
                    @else
                        Price: ৳ {{home_discounted_base_price($product->id)}}
                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                            <del>৳ {{home_base_price($product->id)}}</del>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
@empty
    <div class="col-md-12 text-center" >
        <h2 class="p-0 m-0">Data Not found!!</h2>
        <img src="{{asset('frontend/img/loader/nodata.png')}}"  class="img-fluid p-0 m-0" width="50%">
    </div>
@endforelse
