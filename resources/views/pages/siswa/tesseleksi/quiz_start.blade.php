@extends('layouts.siswa_quiz')
@section('main-content')
<div class="row">
    <div class="col-md-12 pull-right">
        <div class="box">
            <div class="box-body text-center">
                <h3>Tes Seleksi Sudah Dapat Dimulah</h3>
                <a href="{{ route('startQuizTesSeleksiAkademikSiswa') }}" class="btn btn-info">Mulai</a>
            </div>
        </div>
    </div>
</div>
@endsection
