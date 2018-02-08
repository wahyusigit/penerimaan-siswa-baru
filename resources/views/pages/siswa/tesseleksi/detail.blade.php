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
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">Hasil Tes Seleksi</div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailtes as $no => $detail)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{!! $detail->pertanyaan->isi_pertanyaan !!}</td>
                            <td>{{ $detail->pilihanjawaban->isi_jawaban }}</td>
                            <td>
                                @if($detail->pilihanjawaban->status_jawaban == 'benar')
                                    <span class="badge bg-green">Benar</span>
                                @else
                                    <span class="badge bg-red">Salah</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@endsection

