var map;
var myLatLng;

// $(document).ready(function() {
//     //geoLocationInit();
// });
function geoLocationInit() {

    var check_session = sessionStorage.getItem("latitude");
    //console.log(session);
    if (check_session == null) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
    } else {
        let sessionPos = {
            coords: {
                latitude: sessionStorage.getItem("latitude"),
                longitude: sessionStorage.getItem("longitude"),
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

    /*createMap(myLatLng);
    searchVendors(latval,lngval);*/
}

function fail() {
    alert("Please Allow Location Access To Take Service");
}


