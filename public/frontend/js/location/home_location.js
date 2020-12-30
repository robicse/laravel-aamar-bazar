Bkoi.onSelect(function () {
    let selectedPlace = Bkoi.getSelectedData()
    console.log(selectedPlace)
})

$(document).ready(function(){
    var latval = sessionStorage.getItem("latitude");
    var lngval = sessionStorage.getItem("longitude");
    if(latval==null){
        geoLocationInit();
    }else{
        searchShops(latval,lngval);
    }
});

function geoLocationInit() {
    var check_session = sessionStorage.getItem("latitude");
    if(check_session==null){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
    }else{
        let sessionPos = {
            coords: {
                latitude:sessionStorage.getItem("latitude"),
                longitude:sessionStorage.getItem("longitude"),
            },
        };
        success(sessionPos);
    }
}

function success(position) {
    //console.log("in succ");
    sessionStorage.setItem("latitude", position.coords.latitude);
    sessionStorage.setItem("longitude", position.coords.longitude);

    var latval = sessionStorage.getItem("latitude");
    var lngval = sessionStorage.getItem("longitude");

    fetch(`https://barikoi.xyz/v1/api/search/reverse/MTg3NzpCRE5DQ01JSkgw/geocode?longitude=${lngval}&latitude=${latval}&district=true&post_code=true&country=true&sub_district=true&union=false&pauroshova=false&location_type=true&division=true`)
        .then(response => response.json())
        .catch(error => console.error('Error:', error))
        .then(response => $('#input-search').val(response.place.address))
}
function fail() {
    alert("Please Allow Location For Purchase");
}
$('#find').click(function (){
    var latval = sessionStorage.getItem("latitude");
    var lngval = sessionStorage.getItem("longitude");
    if(latval==null){
        return;
    }else{
        searchShops(latval,lngval);
    }

})

function searchShops(lat,lng){
    console.log(lat);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/shop/nearest/list',
        method: 'post',
        data: {
            lat:lat,
            lng:lng,
            // service_id:get_service(),
        },
        beforeSend: function(){
            $("#loader").show();
        },
        success: function(data){
            console.log(data);
            $('.shop_list').empty();
            if (data.response.length==0){
                $('.shop_list').empty();
                $('.shop_list').html(`<div class="col-md-12 py-2 px-4 text-center">
                    <img src = "http://127.0.0.1:8000/frontend/img/shop/shop-not-found.png" alt = "">
                </div>`);
            }
            else{
                var i;
                // $('.shop_list').empty();
                for(i=0;i<data.response.length;i++){
                    var gname=data.response[i].name;
                    var slug=data.response[i].slug;
                    var imag=data.response[i].logo;
                    var base_url =  window.location.origin;
                    var imgPath = base_url+'/'+imag;
                    // fetch('https://barikoi.xyz/v1/api/distance/API_KEY/90.39534587,23.86448886/90.3673,23.8340')
                    //     .then(response => response.json())
                    //     .catch(error => console.error('Error:', error))
                    //     .then(response => console.log('Success:', response))
                    $('.shop_list').append(`<div class="col-md-3 p-2">
                    <figure>
                        <a class="city-tile" data-gtm-cta="findRestaurant_dhaka" href="/shop/${slug}"><picture>
                                <div class="city-picture b-lazy b-loaded" data-src="https://images.deliveryhero.io/image/fd-bd/city-title/city-title-Dhaka.jpg?width=720" style="background-image: url(&quot;${imgPath}">
                                    &nbsp;</div>
                            </picture> <figcaption class="city-info"> <span class="city-name"> ${gname} </span> <span class="city-letter">30 meter away</span> <span class="city-cta button city__called-action js-ripple"> <svg class="svg-stroke-container mr-4" height="18" viewBox="0 0 20 18" width="20" xmlns="http://www.w3.org/2000/svg"> <g fill="none" fill-rule="evenodd" stroke="#FFFFFF" stroke-linecap="round" stroke-width="2" transform="translate(1 1)"> <path d="M0,8 L17.5,8"></path> <polyline points="4.338 13.628 15.628 13.628 15.628 2.338" stroke-linejoin="round" transform="rotate(-45 9.983 7.983)"></polyline> </g> </svg> </span> </figcaption> </a></figure>
                </div>`);
                    //For list
                }
            }
        },
        complete:function(){
            $("#loader").hide();
            $('html, body').animate({
                scrollTop: $(".jump").offset().top
            }, 500);
        }
    });
}
