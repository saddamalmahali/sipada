@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Konfigurasi Wilayah</h3>
                </div>
                <form action="{{url('/client/preferences/registrasi_wilayah/simpan_registrasi')}}" method="post" class="form-horizontal">
                {{csrf_field()}}
                <input type="hidden" name="wilayah_id" value="{{$wilayah->wilayah_id}}">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinsi" class="col-md-3 control-label">Provinsi</label>
                                <div class="col-md-9">
                                    <input type="text" name="provinsi" readonly value="{{$wilayah->parent->parent->nama}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kabupaten" class="col-md-3 control-label">Kabupaten</label>
                                <div class="col-md-9">
                                    <input type="text" name="kabupaten" readonly value="{{$wilayah->parent->nama}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan" class="col-md-3 control-label">Kecamatan</label>
                                <div class="col-md-9">
                                    <input type="text" name="kecamatan" readonly value="{{$wilayah->nama}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lat" class="col-md-3 control-label">Latitude</label>
                                <div class="col-md-9">
                                    <input type="text" name="lat" required placeholder="Masukan Kode Latitude" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="long" class="col-md-3 control-label">Longitude</label>
                                <div class="col-md-9">
                                    <input type="text" name="long" required placeholder="Masukan Kode Langitude" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-info btn-sm" value="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection