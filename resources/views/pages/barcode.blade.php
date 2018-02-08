@extends('layouts.print')
@section('main-content')
	<div class="row">
		<div class="box">
			<div class="box-body">
				<div class="col-md-12">
					@include('pages.print.partials.header')
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th class="col-md-6">Nama Lengkap</th>
										<th class="col-md-6">Wahyu Sigit Priyadi</th>
									</tr>
									<tr>
										<th class="col-md-6">No. Pembayaran</th>
										<th class="col-md-6"></th>
									</tr>
									<tr>
										<th class="col-md-6">Tanggal Pembayaran</th>
										<th class="col-md-6"></th>
									</tr>
									<tr>
										<th class="col-md-6">Nama Bank</th>
										<th class="col-md-6"></th>
									</tr>
									<tr>
										<th class="col-md-6">Nama Pemilik Rekening</th>
										<th class="col-md-6"></th>
									</tr>
									<tr>
										<th class="col-md-6">No. Rekening</th>
										<th class="col-md-6"></th>
									</tr>
									<tr>
										<th class="col-md-6">Cabang Bank</th>
										<th class="col-md-6"></th>
									</tr>
									<tr>
										<th class="col-md-6">Status Verifikasi</th>
										<th class="col-md-6"></th>
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
