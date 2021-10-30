<div class="ps-layout__left">
    <aside class="widget widget_shop">
        <h4 class="widget-title">Categories</h4>
        <ul class="ps-list--categories">
            @foreach($shopCategories as $Cat)
                @if($Cat->category->status != 0)
                    <li class="current-menu-item menu-item-has-children"><a href="#"> {{$Cat->category->name}} </a><span class="sub-toggle {{(Request::is('products/'.$shop->slug.'/'.$Cat->category->slug.'*'))
                        ? 'active' : ''}}"><i class="fa fa-angle-down"></i></span>
                        @php
                            $subcategories = \App\Model\ShopSubcategory::where('category_id',$Cat->category_id)->where('shop_id',$shop->id)->latest()->get();
                        @endphp
{{--                        @dd('/products/'.$shop->slug.'/'.$Cat->category->slug.'*')--}}
                        <ul class="sub-menu" style="display: {{(Request::is('/products/'.$shop->slug.'/'.$Cat->category->slug.'*'))
                        ? 'block' : ''}}">
                            @foreach($subcategories as $subCat)
                                <li class="current-menu-item "><a href="{{url('/products/'.$shop->slug.'/'.$Cat->category->slug.'/'.$subCat->subcategory->slug)}}">{{$subCat->subcategory->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </aside>
    <aside class="widget widget_shop">
        <h4 class="widget-title">BY BRANDS</h4>
        <ul class="ps-list--categories">
            @foreach($shopBrands as $brand)
                @if($brand->brand->status != 0)
                    <li class="current-menu-item menu-item-has-children"><a href="{{url('/products/'.$shop->slug.'/'.$brand->brand->slug)}}"> {{ $brand->brand->name }} </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </aside>
{{--    <aside class="widget widget_shop">--}}
{{--        <figure style="margin-top: -20px;">--}}
{{--            <h4 class="widget-title">By Price</h4>--}}
{{--            <div id="nonlinear"></div>--}}
{{--            <p class="ps-slider__meta">Price:<span class="ps-slider__value">$<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">$<span class="ps-slider__max"></span></span></p>--}}
{{--        </figure>--}}
{{--    </aside>--}}
</div>
