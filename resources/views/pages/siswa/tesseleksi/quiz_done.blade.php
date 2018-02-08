@extends('layouts.siswa')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body text-center">
                <h4>{{ $message }}</h4>
                <button type="button" class="btn btn-default">Lihat Hasil Tes</button>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@endsection
