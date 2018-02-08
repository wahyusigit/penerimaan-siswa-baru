@extends('layouts.qr')
@section('htmlheader_title')
    {{ $qr->qr_code }}
@endsection
@section('main-content')
	<div class="row">
		<div class="col-md-9">
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
								<h3>Tanda Bukti Pembayaran Registrasi / Pendaftaran Online - PSB SMK</h3>
								{{-- <h4 class="text-capitalize">Tahun Ajaran : {{ $calonsiswa->pembayaran->calonsiswa->jadwal->tahunAjaran->th_ajaran }} - {{ $calonsiswa->pembayaran->calonsiswa->jadwal->nm_jadwal }}</h4> --}}
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-2">
										<img src="{{ asset($qr->qr_code_image) }}" class="img-thumbnail img-responsive">
									</div>	
									<div class="col-md-10">
										<h4>No. QR :<br>
											<b>{{ $qr->qr_code }}</b>
										</h4>
										<h4>Jenis QR :<br>
											<b class="text-capitalize">{{ $qr->jenis }}</b>
										</h4>
									</div>
								</div>
								
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th class="col-md-6">Nama Lengkap</th>
											<th class="col-md-6 text-capitalize">{{ $calonsiswa->pembayaran->calonsiswa->nm_cln_siswa }}</th>
										</tr>
										<tr>
											<th class="col-md-6">No. Pendaftaran</th>
											<th class="col-md-6 text-uppercase">{{ $calonsiswa->pembayaran->no_pendf }}</th>
										</tr>
										<tr>
											<th class="col-md-6">No. Pembayaran</th>
											<th class="col-md-6 text-uppercase">{{ $calonsiswa->pembayaran->no_pemb }}</th>
										</tr>
										<tr>
											<th class="col-md-6">Tanggal Pembayaran</th>
											<th class="col-md-6">{{ $calonsiswa->pembayaran->tgl_pembayaran }}</th>
										</tr>
										<tr>
											<th class="col-md-6">Nama Bank</th>
											<th class="col-md-6 text-capitalize">{{ $calonsiswa->pembayaran->nm_bank }}</th>
										</tr>
										<tr>
											<th class="col-md-6">Nama Pemilik Rekening</th>
											<th class="col-md-6 text-capitalize">{{ $calonsiswa->pembayaran->nm_pemilik_rek }}</th>
										</tr>
										<tr>
											<th class="col-md-6">No. Rekening</th>
											<th class="col-md-6 text-uppercase">{{ $calonsiswa->pembayaran->no_rek }}</th>
										</tr>
										<tr>
											<th class="col-md-6">Cabang Bank</th>
											<th class="col-md-6 text-capitalize">{{ $calonsiswa->pembayaran->cbg_bank }}</th>
										</tr>
										<tr>
											<th class="col-md-6">Status Verifikasi</th>
											<th class="col-md-6 text-capitalize">{{ $calonsiswa->pembayaran->sts_verif }}</th>
										</tr>
										@if($calonsiswa->pembayaran->sts_verif == 'sudah')
										<tr>
											<th class="col-md-6">Nama Panitia</th>
											<th class="col-md-6">{{ $calonsiswa->pembayaran->panitia->nip }}</th>
										</tr>
										@endif
									</thead>
								</table>
							</div>
						</div>
						@include('pages.qrcode.partials.footer')
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box">
				<div class="box-header with-border">
					<div class="box-title">Tools</div>
				</div>
				<div class="box-body">
					<button type="button" class="btn btn-default btn-flat btn-block">Verifikasi Pembayaran</button>
				</div>
				<div class="box-footer"></div>
			</div>
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