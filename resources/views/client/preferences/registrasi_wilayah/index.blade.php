@extends('layouts.main')

@section('content')
    @if(session()->has('sukses'))
        <div class="alert alert-success" role="alert">{{session()->get('sukses')}}</div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Wilayah Kabupaten Garut</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Wilayah ID</th>
                                <th class="text-center">Parent ID</th>
                                <th class="text-center">Nama Wilayah</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_wilayah as $wilayah)
                                <tr>
                                    <td align="center">{{$wilayah->wilayah_id}}</td>
                                    <td align="center">{{$wilayah->parent_id}}</td>
                                    <td align="center">{{$wilayah->nama}}</td>
                                    <td align="center">{!!$wilayah->registrasi()->count()>0 ? "<span class='label label-info'>Sudah Registrasi</span>" : "<span class='label label-warning'>Belum Registrasi</span>" !!}</td>
                                    <td align="center">
                                        @if($wilayah->registrasi()->count() > 0)
                                            <a href="{{url('/client/preferences/registrasi_wilayah/detile').'/'.$wilayah->wilayah_id}}" title="Lihat Detile" class="btn btn-info btn-xs"><i class="fa fa-address-card-o"></i></a>
                                        @else
                                            <a href="{{url('/client/preferences/registrasi_wilayah/registrasi').'/'.$wilayah->wilayah_id}}" title="Registrasi Wilayah" class="btn btn-info btn-xs"><i class="fa fa-address-book-o"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" align="center">Tidak Ada Data Wilayah</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <center>{{$data_wilayah->links()}}</center>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection