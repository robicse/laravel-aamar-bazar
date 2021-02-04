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

    myLatLng = new google.maps.LatLng(latval, lngval);

    createMap(myLatLng);
    searchVendors(latval,lngval);
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
                    var pick_up = data.response[i].pick_up;
                    var delivery = data.response[i].delivery;

                    // both pick up and delivery
                    if(pick_up === 1 && delivery === 1){
                        var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                                <button id="p_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Picked" onclick="picked(`+data.response[i].id+`)">Pick Up<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                                <button id="d_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Click To Take This Service" onclick="delivery(`+data.response[i].id+`)">Delivery<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                            </div>
                        </div>`;
                    }
                    // only pick up and no delivery
                    if(pick_up === 1 && delivery === 0){
                        var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                                <button id="p_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Picked" onclick="picked(`+data.response[i].id+`)">Pick Up<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                            </div>
                        </div>`;
                    }
                    // no pick up and only delivery
                    if(pick_up === 0 && delivery === 1){
                        var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                                <button id="d_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Click To Take This Service" onclick="delivery(`+data.response[i].id+`)">Delivery<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                            </div>
                        </div>`;
                    }
                    // no pick up and no delivery
                    if(pick_up === 0 && delivery === 0){
                        var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                            </div>
                        </div>`;
                    }


                    var gicn= window.location.origin+'/frontend/img/pins/map-marker-sub.png'
                    var GLatLng = new google.maps.LatLng(glatval, glngval);
                    createMarker(GLatLng,gicn,gname,gcontent);
                    // console.log(GLatLng);
                    $('.near_shop_list').append(`<div class="row px-1 mb-3">

                                                <div class="col-md-12 ">
                                                     <div class="strip_list">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <h5 class="mb-1 p-0 pr-2" style="font-size: 22px;line-height: 19px;font-weight: bold;">`+data.response[i].location_title+`</h5>
                                                                <p class="m-0 mb-1 pr-2" style="font-size: 14px;line-height: 15px;display:inline;">`+data.response[i].address+`</p><br>
                                                                <p class="m-0 mb-1 pr-2" style="font-size: 14px;line-height: 15px;display:inline;">`+data.response[i].phn_no+`</p><br>
                                                                <p class="m-0 mb-1 pr-2" style="font-size: 14px;line-height: 15px;display:inline;">`+data.response[i].open_close_time+`</p><br>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div style="margin: 5px;" id="p_id_`+data.response[i].id+`"><button style="width: 100%;" onclick="picked(`+data.response[i].id+`)" class="btn btn-success">Pick Up</button></div>
                                                                <div style="margin: 5px;" id="d_id_`+data.response[i].id+`"><button style="width: 100%;" onclick="delivery(`+data.response[i].id+`)" class="btn btn-success">delivery</button></div>
                                                                <div style="margin: 5px;"><button style="width: 100%;" onclick="shopLocation(`+data.response[i].id+`)"  class="btn btn-success">Location page</button></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`
                    );
                    if(pick_up === 0){
                        //console.log("pick_up");
                        $("#p_id_"+data.response[i].id).addClass("pickUpButtonHide");
                    }
                    if(delivery === 0){
                        //console.log(delivery);
                        $("#d_id_"+data.response[i].id).addClass("deliveryButtonHide");
                    }
                    //For list
                }
            }
        }
    });
}

function shopLocation(id) {
     window.location.href = window.location.origin+'/location/'+id;
}

function picked(id){
    console.log( window.location.origin+'/frontend/img/pins/map-marker-sub.png')

    var pickedOrDeliveredValue = 'picked';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/shop/location/picked-or-delivered',
        method: 'post',
        data: {
            id:id,
            pickedOrDeliveredValue:pickedOrDeliveredValue,
        },
        success: function(data){
            console.log(data);
            window.location.href = window.location.origin+'/menu';
        }
    });
}

function delivery(id){
    console.log(id)
    var pickedOrDeliveredValue = 'delivered';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/shop/location/picked-or-delivered',
        method: 'post',
        data: {
            id:id,
            pickedOrDeliveredValue:pickedOrDeliveredValue,
        },
        success: function(data){
            console.log(data);
            window.location.href = window.location.origin+'/menu';
        }
    });


}
