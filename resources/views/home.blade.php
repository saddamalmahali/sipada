@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Pemilih</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="map" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    
@endsection

@section('script')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBkZleJ-x0tr989cTnKw5jXd3TO_A2E-M"></script>
    <script type="text/javascript" src="{{url('/js/jquery.googlemap.js')}}"></script>   
    <script type="text/javascript" src="{{url('/js/gmap3.min.js')}}"></script>   
    <script type="text/javascript">
        
        $(function() {
            var map = $("#map").googleMap({
                zoom: 9, // Initial zoom level (optional)
                coords: [-7.3432407, 107.4979498], // Map center (optional)
                type: "ROADMAP" // Map type (optional)
            });
            map.addMarker({
                coords: [-7.1450352, 107.9835833], // GPS coords
                title: 'Sukawening', // Title
                text:  '<b>Kecamatan Sukawening</b> .'
            });
            map.addMarker({
                coords: [-7.6213111, 107.6938973],
                title: 'Pameungpeuk', // Title
                text:  '<b>Kecamatan Pameungpeuk</b> .'
            });
            map.addMarker({
                coords: [-7.4006525, 107.8100919],
                title: 'Banjarwangi', // Title
                text:  '<b>Kecamatan Banjarwangi</b> .'
            });
        });
    </script>
@endsection