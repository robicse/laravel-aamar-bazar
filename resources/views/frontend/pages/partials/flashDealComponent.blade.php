<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
    <div class="ps-product">
        <div class="ps-product__thumbnail"><a href="{{route('product-details',$flashDealProduct->product->slug)}}"><img src="{{asset($flashDealProduct->product->thumbnail_img)}}" alt="" width="153" height="171"></a>
            <ul class="ps-product__actions">
                <li><a href="{{route('product-details',$flashDealProduct->product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                <li><a href="{{route('product-details',$flashDealProduct->product->slug)}}" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                <li><a href="{{route('add.wishlist',$flashDealProduct->product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
            </ul>
        </div>
        <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('product-details',$flashDealProduct->product->slug)}}"></a>
            <div class="ps-product__content"><a class="ps-product__title" href="">{{$flashDealProduct->product->name}}</a>
                <div>
                    Unit: {{ProductUnit($flashDealProduct->product->id)}}
                </div>
                <p class="ps-product__price sale">
                    ৳{{home_discounted_base_price($flashDealProduct->product_id)}}
                    @if(home_base_price($flashDealProduct->product_id) != home_discounted_base_price($flashDealProduct->product_id))
                        <del>৳{{home_base_price($flashDealProduct->product_id)}}</del>
                    @else
                        ৳{{home_discounted_base_price($flashDealProduct->product_id)}}
                    @endif
                </p>
            </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$flashDealProduct->product->slug)}}">{{$flashDealProduct->product->name}}</a>
                <div>
                    Unit: {{ProductUnit($flashDealProduct->product->id)}}
                </div>
                <p class="ps-product__price sale">
                    ৳{{home_discounted_base_price($flashDealProduct->product_id)}}
                    @if(home_base_price($flashDealProduct->product_id) != home_discounted_base_price($flashDealProduct->product_id))
                        <del>৳{{home_base_price($flashDealProduct->product_id)}}</del>
                    @else
                        ৳{{home_discounted_base_price($flashDealProduct->product_id)}}
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
