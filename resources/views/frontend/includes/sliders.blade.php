<div class="ps-shop-banner jump" style="padding: 10px;">
    @php
    $sliders = \App\Model\Slider::all();
    @endphp
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        @foreach($sliders as $slider)
        <a href="{{$slider->url}}"><img src="{{asset('uploads/sliders/'.$slider->image)}}" alt=""></a>
{{--        <a href="#"><img src="{{asset('frontend/img/slider/shop-default/2.jpg')}}" alt=""></a>--}}
        @endforeach
    </div>
</div>
