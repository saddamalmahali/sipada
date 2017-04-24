@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Input File</h3>
                </div>
                <form action="{{url('/client/tools/migrasi')}}" method="post">
                {{csrf_field()}}
                <div class="panel-body">                    
                    <div class="form-group">
                        <label for="file">Pilih File</label>
                        <input type="file" name="file_migrasi" class="form-control">
                    </div>                    
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-info btn-sm" value="migrasi">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection