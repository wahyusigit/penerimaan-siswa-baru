@extends('layouts.siswa')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                @isset($message_pembayaran)
                <h4 class="text-center text-red text-muted"><u><b>{{ $message_pembayaran }}</b></u></h4>
                @endisset
            </div>
            <div class="box-body">
                <div class="text-center">
                    <h3>Jadwal Tes Seleksi</h3>
                    <h4>{{ date_format(date_create($jadwal_tes->tgl_mulai_tes), 'd M Y') }} s.d {{ date_format(date_create($jadwal_tes->tgl_akhir_tes), 'd M Y') }}</h4>
                </div>
                <br>
                @isset($message)
                <div class="col-md-2 col-md-offset-5">
                    <a href="{{ route($route) }}" class="btn btn-primary btn-flat btn-lg btn-block"> <b>{{ $message }}</b></a>
                </div>
                @endisset
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@endsection

