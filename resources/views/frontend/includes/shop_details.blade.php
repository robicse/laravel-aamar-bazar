<style>
    @media only screen and  (min-width: 1000px){
        .web_view{
            width: 60%;
            margin-left: 235px;
        }
    }
    .owl-carousel .owl-item img {
        width: -webkit-fill-available;
        width: -moz-available;

    }
</style>
<aside class="ps-block--store-banner " style="margin-top: 50px;">
    <div class="ps-block__user web_view" style="background-color: #7c4d4d; ">
        <div class="row" style="margin-top: -5px">
            <div class="col-7">
                <h4 style="color:#fff;"><a href="{{route('shop.details',$shop->slug)}}">{{$shop->name}} </a></h4>
                <div>
                <p class="float-left pt-3 pr-2" style="font-size: 14px;">Rating: <strong style="font-size: 16px; ">{{$totalRatingCount}}/5</strong></p><br>
                </div>

            </div>
            <div class="col-5">
                <div class="row mb-3">
                    <div class="col-6">

                    </div>
                    @if(empty($favoriteShop))
                        <div class="col-md-6 pull-right">
                            <button class="ps-btn" style="padding: 10px 30px 10px 30px; font-size: 18px;"><a href="{{route('add.favorite-shop',$shop->id)}}">Follow</a></button>
                        </div>
                    @else
                        <div class="col-md-6 pull-right">
                            <button class="ps-btn" style="padding: 10px 30px 10px 30px; font-size: 18px;"><a href="{{route('remove.favorite-shop',$shop->id)}}">Unfollow</a></button>
                        </div>
                    @endif
                </div>

            </div>
            <div class="col-12">
                <p><i class="icon-map-marker"></i> {{$shop->address}}</p>
                @if($shop->about != null)
                    <p><i class="icon-store"></i> {{$shop->about}}</p>
                @endif
            </div>

        </div>
    </div>
</aside>
