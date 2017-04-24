@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="map" style="height:500px;"></div>    
        </div>
    </div>
    
@endsection

@section('script')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBkZleJ-x0tr989cTnKw5jXd3TO_A2E-M"></script>
    <script type="text/javascript" src="{{url('/js/jquery.googlemap.js')}}"></script>   
    <script type="text/javascript" src="{{url('/js/gmap3.min.js')}}"></script>   
    
@endsection

