<aside class="ps-block--store-banner " style="margin-top: 80px;">
    <div class="ps-block__user">
        <div class="row">
            <div class="col-3">
                <img src="{{asset($shop->logo)}}" alt="" class="rounded-circle" height="150" width="150">
                <p class="float-left pt-3 pr-2">Rating: <strong style="font-size: 30px; ">{{$totalRatingCount}}</strong></p><br>
                <select class="ps-rating" data-read-only="true" style="margin-top: 7px;">
                    @for ($i=0; $i < round($totalRatingCount); $i++)
                        <option value="1">{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4 style="color:#fff;"><a href="{{route('shop.details',$shop->slug)}}">{{$shop->name}} </a></h4>
                    </div>
                    @if(empty($favoriteShop))
                        <div class="col-md-6 pull-right">
                            <button class="ps-btn" style="padding: 7px 20px 7px 20px; font-size: 14px;"><a href="{{route('add.favorite-shop',$shop->id)}}">Follow</a></button>
                        </div>
                    @else
                        <div class="col-md-6 pull-right">
                            <button class="ps-btn" style="padding: 7px 20px 7px 20px; font-size: 14px;"><a href="{{route('remove.favorite-shop',$shop->id)}}">Unfollow</a></button>
                        </div>
                    @endif
                </div>
                <p><i class="icon-map-marker"></i> {{$shop->address}}</p>
                @if($shop->about != null)
                <p><i class="icon-store"></i> {{$shop->about}}</p>
                @endif
            </div>

        </div>
    </div>
</aside>
