@extends('backend.layouts.master')
@section('title','Get All Vendors')
@section('content')
    @extends('backend.layouts.master')
@section("title","Offer List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
{{--    <script type="text/javascript"--}}
{{--            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqEEDdypCvLeSVWqN2JGlQ2pMvCCQKG24&libraries=places">--}}
{{--    </script>--}}
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Offer List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Offer List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Offer Lists</h3>
                        <div class="float-right">
                            <a href="{{route('admin.offers.create')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>





@stop
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
   {{-- <script src="{{asset('backend/js/map.js')}}"></script>--}}

    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(document).ready(function (){
            geoLocationInit();
        })

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

           /* myLatLng = new google.maps.LatLng(latval, lngval);*/

            /*createMap(myLatLng);
            searchVendors(latval,lngval);*/
        }

        function fail() {
            alert("Please Allow Location Access To Take Service");
        }

    </script>
@endpush

@stop
