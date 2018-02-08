@extends('layouts.siswa')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<legend>Progress Pendaftaran dan Penerimaan Siswa Baru Anda</legend>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
		<!-- The time line -->
		<ul class="timeline">
			{{-- 1 --}}
	        <li class="time-label">
	              <span class="{{ $timelines['registrasi'] }}">
	                1. Registrasi / Mengisi Formulir Pendaftaran - 10 Feb. 2014
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check {{ $timelines['registrasi'] }}"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
		        <li>
		          <i class="fa fa-check {{ $timelines['registrasi'] }}"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pendidikan dan Rapor Semerter 5</h3>
					</div>
		        </li>
		        <li>
		          <i class="fa fa-check {{ $timelines['registrasi'] }}"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Orang Tua / Wali</h3>
					</div>
		        </li>

		    {{-- 2 --}}
	        <li class="time-label">
	              <span class="{{ $timelines['pembayaran_registrasi'] }}">
	                2. Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		        	<i class="fa fa-check {{ $timelines['pembayaran_registrasi'] }}"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Melakukan <code>Pembayaran Registrasi</code> sebesar <code>Rp. 100.000,-</code> ke Rekening BCA a.n Wahyu Sigit -  0987483748</h3>
					</div>
		        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Melakukan Konfirmasi Pembayaran Registrasi pada halaman <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalKonfirmasiPembayaranRegistrasi"> <i class="fa fa-link"></i> Konfirmasi Pembayaran </button></h3>
					</div>
		        </li>
	        
	        {{-- 3 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                3. Tes Seleksi Akademik
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Melakukan Tes Seleksi Akademik sesuai Jadwal yang sudah ditentukan.</h3>
					</div>
		        </li>
	        

	        {{-- 5 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                4. Daftar Ulang
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
	        {{-- 6 --}}
	        <li class="time-label">
	              <span class="bg-red">
	                6. Konfirmasi Pembayaran Registrasi
	              </span>
	        </li>
		        <li>
		          <i class="fa fa-check bg-green"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">Mengisi Data Pribadi dan Upload Pas Foto (3x4)</h3>
					</div>
		        </li>
	        
    	</ul>
    </div>
    <!-- /.col -->
  </div>


 {{-- Modal Dialog Search --}}
<div id="modalKonfirmasiPembayaranRegistrasi" class="modal fade">
    <div class="modal-dialog">
        <form action="{{ route('postAddTahunAjaranAdmin') }}" method="POST">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Pencarian Lanjut</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control" placeholder="ex: 2017/2018">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i>   Cari</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection


@push('css')
<style type="text/css">
.blink {
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;

    -moz-animation-name: blinker;
    -moz-animation-duration: 1s;
    -moz-animation-timing-function: linear;
    -moz-animation-iteration-count: infinite;

    animation-name: blinker;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
}

@-moz-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@-webkit-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

</style>
@endpush

@push('script')
<script type="text/javascript">	
	$( document ).ready(function() {
	    $('html, body').animate({
	        scrollTop: $("#scrollTop").offset().top
	    }, 300);
	});
	
</script>
@endpush