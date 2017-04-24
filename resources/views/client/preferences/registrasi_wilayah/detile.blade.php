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
                        <div class="col-md-6">
                            <table class="table">
                                <tr class="bg-info">
                                    <th colspan="3">Info Lokasi</th>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <td>:</td>
                                    <td>{{$wilayah->parent->parent->nama}}</td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <td>:</td>
                                    <td>{{$wilayah->parent->nama}}</td>
                                </tr>
                                <tr>
                                    <th>Nama wilayah</th>
                                    <td>:</td>
                                    <td>{{$wilayah->nama}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <a href="{{url('/client/preferences/registrasi_wilayah')}}" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection

@section('script')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBkZleJ-x0tr989cTnKw5jXd3TO_A2E-M"></script>
    <script type="text/javascript" src="{{url('/js/jquery.googlemap.js')}}"></script>   
    <script type="text/javascript" src="{{url('/js/gmap3.min.js')}}"></script>  
    <script type="text/javascript">
        $(function() {
            var lat = "{{$wilayah->registrasi->lat}}";
            var long = "{{$wilayah->registrasi->long}}";
            var nama = "{{$wilayah->nama}}";
            var map = $("#map").googleMap({
                zoom: 9, // Initial zoom level (optional)
                coords: [-7.3432407, 107.4979498], // Map center (optional)
                type: "ROADMAP" // Map type (optional)
            });
            map.addMarker({
                coords: [lat, long], // GPS coords
                title: nama, // Title
                text:  '<b>Kecamatan '+nama+'</b> .'
            });
        });
    </script>
@endsection