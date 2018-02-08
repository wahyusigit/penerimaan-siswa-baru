@extends('layouts.print')
@section('htmlheader_title')
    {{ $no_qr }}
@endsection
@section('main-content')
	<div class="row">
		<div class="box">
			<div class="box-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<img src="{{ asset('img/header.jpg') }}" class="img-responsive">
						</div>
					</div>
					<hr>
					<div class="row">
						
						<div class="col-md-12 text-center">
							<h3>Tanda Bukti Tes Seleksi - PSB SMK</h3>
							<h4 class="text-capitalize">Tahun Ajaran : {{ $tesseleksi->calonsiswa->jadwal->tahunAjaran->th_ajaran }} - {{ $tesseleksi->calonsiswa->jadwal->nm_jadwal }}</h4>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<img src="{{ $img_qr }}" class="img-thumbnail img-responsive">
						</div>
						<div class="col-md-6">
							<table class="table table-bordered table-hover">
			                    <thead>
			                    	<tr>
										<th class="col-md-6">Nama Lengkap</th>
										<th class="col-md-6 text-capitalize">{{ $tesseleksi->calonsiswa->nm_cln_siswa }}</th>
									</tr>
									<tr>
										<th class="col-md-6">No. Pendaftaran</th>
										<th class="col-md-6 text-uppercase">{{ $tesseleksi->no_pendf }}</th>
									</tr>
			                        <tr>
			                            <th class="col-md-6">No. Tes Seleksi</th>
			                            <th class="col-md-6">{{ $tesseleksi->no_tes_seleksi }}</th>
			                        </tr>
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
			                    </thead>
			                </table>
						</div>
					</div>
					@include('pages.print.partials.footer')
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>

@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print-md.css') }}">
<style type="text/css">
	@media print {
		h4 {
			font-size: 14px;
		}
	    /* Your styles here */
	}
</style>
@endpush