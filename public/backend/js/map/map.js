var map;
var myLatLng;

// $(document).ready(function() {
//     //geoLocationInit();
// });
function geoLocationInit() {

    var check_session = sessionStorage.getItem("latitude");
    //console.log(session);
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
    //console.log(position);
    sessionStorage.setItem("latitude", position.coords.latitude);
    sessionStorage.setItem("longitude", position.coords.longitude);

    var latval = position.coords.latitude;
    var lngval = position.coords.longitude;
    console.log(latval)
    myLatLng = new google.maps.LatLng(latval, lngval);

   /* createMap(myLatLng);
    searchVendors(latval,lngval);*/
}

function fail() {
    alert("Please Allow Location Access To Take Service");
}
//Create Map
function createMap(myLatLng) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 13,
    });
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/64/Map-Marker-Marker-Inside-Pink-icon.png',
        title: "Current Location"
    });
}
//Create marker
function createMarker(latlng, icn, name,content) {
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: icn,
        title: name
    });

    var infoWindow = new google.maps.InfoWindow({
        content:content,
    });

    marker.addListener('click', function(){
        infoWindow.open(map, marker);
    });
}

function searchVendors(lat,lng){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/shop/location/near/list',
        method: 'post',
        data: {
            lat:lat,
            lng:lng,
            // service_id:get_service(),
        },
        success: function(data){
            //console.log(data);


            if (data.response.length==0){
                $('.near_shop_list').html(`<div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="font-weight-light p-5">Empty Location List</p>
                                            </div>
                                        </div>`);
            }
            else{
                var i;
                 $('.near_shop_list').empty();
                for(i=0;i<data.response.length;i++){
                    var glatval=data.response[i].lat;
                    var glngval=data.response[i].lng;
                    var gname=data.response[i].location_title;
                    var gaddress=data.response[i].address;

                    var gcontent= `<div class="row mx-1">
                        <p>love</p>
                    </div>`;

                    var gicn= window.location.origin+'/frontend/img/pins/map-marker-sub.png'
                    var GLatLng = new google.maps.LatLng(glatval, glngval);
                    createMarker(GLatLng,gicn,gname,gcontent);
                    // console.log(GLatLng);

                }
            }
        }
    });
}


