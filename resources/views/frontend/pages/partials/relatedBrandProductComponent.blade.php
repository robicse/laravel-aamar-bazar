@if($product->category->status !=0 || $product->subCategory->status !=0 || $product->subSubCategory->status !=0 || $product->brand->status !=0)
<div class="ps-product" style="margin-top: -20px;">
    <div class="ps-product__thumbnail">
        <a href="{{route('product-details',$product->slug)}}">
            <img src="{{url($product->thumbnail_img)}}" alt="" width="206" height="206">
        </a>
        <ul class="ps-product__actions">
            @if($product->variant_product != 0)
                <li><a href="{{route('product-details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
            @else
                <li><a data-toggle="tooltip" data-placement="top" title="Add To Cart" onclick="addToCart('{{$product->id}}',0)"><i class="icon-bag2"></i></a></li>
            @endif
            <li><a href="{{route('product-details',$product->slug)}}" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
            <li><a href="{{route('add.wishlist',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
        </ul>
    </div>

    <div class="ps-product__container"><a class="ps-product__vendor" href="{{url('/products/'.$product->user->shop->slug.'/'.$product->brand->slug)}}">{{ $product->brand->name }}</a>

        <div class="ps-product__content"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
            <div>
                Unit: {{ProductUnit($product->id)}}
            </div>
            Price: ৳ {{home_discounted_base_price($product->id)}}
            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                <del>৳ {{home_base_price($product->id)}}</del>
            @endif
        </div>
        <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
            <div>
                Unit: {{ProductUnit($product->id)}}
            </div>
            Price: ৳ {{home_discounted_base_price($product->id)}}
            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                <del>৳ {{home_base_price($product->id)}}</del>
            @endif
        </div>
    </div>
</div>
@endif
