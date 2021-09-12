@php
    $quote = \App\Model\Quote::first();
@endphp


@if(Auth::check() && Auth::user()->user_type == 'customer' && Session::get('popup') != 1)
<div class="ps-popup" id="subscribe" data-time="500">
    <div class="ps-popup__content bg--cover" data-background="{{url($quote->image)}}" ><a class="ps-popup__close" href="#" onclick="notShowPopup()"><i class="icon-cross"></i></a>
        <form class="ps-form--subscribe-popup" action="" method="get">
            <div class="ps-form__content">
                <h4>Today's Quote</h4>
                @if(!empty($quote))
                <h2>{{$quote->title}}</h2>
                @endif

                <div class="ps-checkbox" style="padding-top: 10px;">
                    <input class="form-control popup" type="checkbox" id="not-show" name="not-show">
                    <label for="not-show">Don't show this popup again</label>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
<div id="back2top"><i class="icon icon-arrow-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="/" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="aroma-magnifying-glass"></i></button>
        </form>
    </div>
</div>

@push('js')
    <script>

        /*$j(document).ready(function() {
            if(localStorage.getItem('popState') != 'shown'){
                $j("#popup").delay(2000).fadeIn();
                localStorage.setItem('popState','shown')
            }

            $j('#subscribe, #subscribe').click(function(e) // You are clicking the close button
            {
                $j('#subscribe').fadeOut(); // Now the pop up is hiden.
            });
        });*/

        //popup checked
        $('.popup').click(function() {
            console.log('sassssd')
            //alert($(this).attr('id'));  //-->this will alert id of checked checkbox.
            if(this.checked){
                $.ajax({
                    type: "GET",
                    url: '{{url('/popup-dataset')}}',
                    //data: $(this).attr('id'), //--> send id of checked checkbox on other page
                    success: function(data) {
                        document.location.reload();
                    },
                    // error: function() {
                    //     alert('it broke');
                    // },

                });

            }
        });

        function notShowPopup(){
                $.ajax({
                    type: "GET",
                    url: '{{url('/popup-dataset')}}',

                    success: function(data) {
                        document.location.reload();
                    },
                });
        }

        //popup destroy
        $(window).unload(function(){
            $.ajax({
                type: "GET",
                url: '{{url('/popup-destroy')}}',
                //data: $(this).attr('id'), //--> send id of checked checkbox on other page
                success: function(data) {
                    alert(data);
                }
            });
        });


    </script>

@endpush
