@extends('layouts.siswa')
@section('main-content')
<div class="row">
    <div class="col-md-11">
        <div class="callout callout-info">
            <h4>Cetak Bukti Tes Seleksi</h4>
            <p>Silahkan Cetak Bukti Tes Seleksi</p>
        </div>
    </div>
    <div class="col-md-1">
        <a href="{{ route('printBukti',['jenis'=>'tesseleksi','id'=> Auth::user()->calonsiswa->tesseleksi->no_tes_seleksi ]) }}" target="_blank" class="btn btn-app pull-right" style="height: 80px">
            <i class="fa fa-print"></i>   Cetak Bukti<br>Tes Seleksi
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">Hasil Tes Seleksi</div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-6">No. Tes Seleksi</th>
                            <th class="col-md-6">{{ $tesseleksi->no_tes_seleksi }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Tanggal Tes</th>
                            <th>{{ $tesseleksi->tgl_tes_akad }}</th>
                        </tr>
                        <tr>
                            <th>Waktu Mulai</th>
                            <th>{{ $tesseleksi->waktu_mulai }}</th>
                        </tr>
                        <tr>
                            <th>Waktu Selesai</th>
                            <th>{{ $tesseleksi->waktu_selesai }}</th>
                        </tr>
                        <tr>
                            <th>Jumlah Soal</th>
                            <th>30</th>
                        </tr>
                        <tr>
                            <th>Jumlah Tidak Dikerjakan</th>
                            <th>{{ 30 - ($tesseleksi->jumlah_benar + $tesseleksi->jumlah_salah) }}</th>
                        </tr>
                        <tr>
                            <th>Jumlah Benar</th>
                            <th>{{ $tesseleksi->jumlah_benar }}</th>
                        </tr>
                        <tr>
                            <th>Jumlah Salah</th>
                            <th>{{ $tesseleksi->jumlah_salah }}</th>
                        </tr>
                        <tr>
                            <th>nilai_tes_seleksi</th>
                            <th>{{ $tesseleksi->nilai_tes_seleksi }}</th>
                        </tr>
                        <tr>
                            <th>status_tes_seleksi</th>
                            <th>
                                @if($tesseleksi->status_tes_seleksi == 'lulus')
                                    <span class="badge bg-green">Lulus</span>
                                @else
                                    <span class="badge bg-red">Tidak Lulus</span>
                                @endif
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@endsection

