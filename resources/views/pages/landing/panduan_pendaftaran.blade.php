@extends('layouts.landing')

@section('htmlheader_title')
    {{ trans('Panduan Pendaftaran') }}
@endsection

@section('main-content')
<div class="container">
  <div class="page-header">
    <h1 id="timeline">Panduan Pendaftaran Siswa Baru</h1>
  </div>
  <ul class="timeline">

    {{-- 111 --}}
    <li>
      <div class="timeline-badge"><i class="fa fa-book"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">1. Registrasi</h4>
        </div>
        <div class="timeline-body">
          <p>Calon Siswa melakukan Registrasi / Pendaftaran <b>secara online</b> dengan cara melengkapi Formulir Pendaftaran yang berisikan <b>Data Pribadi</b>, <b>Data Pendidikan</b> dan <b>Data Orang Tua / Wali</b></p>
          <hr>
          <a href="{{ route('pendaftaranHomepage') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i> Menuju Halaman</a>
        </div>
      </div>
    </li>

    {{-- 222 --}}
    <li class="timeline-inverted">
      <div class="timeline-badge warning"><i class="fa fa-bank"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">2. Pembayaran Registrasi</h4>
        </div>
        <div class="timeline-body">
          <p>Calon Siswa melakukan pembayaran sebesar Rp. 100.000,- melalui Transfer Bank ke Rekening <b>BCA a.n. WAHYU SIGIT - 0918298129 </b> Paling Lambat <b>2 x 24Jam</b> setelah Calon Siswa melakukan Registrasi / Pendaftaran.</p>
        </div>
      </div>
    </li>

    {{-- 333 --}}
    <li>
      <div class="timeline-badge danger"><i class="fa fa-credit-card"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">3. Konfirmasi Pembayaran</h4>
        </div>
        <div class="timeline-body">
          <p>Setelah Calon Siswa melakukan Transfer Pembayaran, selanjutnya Calon Siswa diharapkan melakukan Konfirmasi Pembayaran dan kemudian menunggu Verifikasi Pembayaran dari Panitia. Biasanya pada langkah ini membutuhkan waktu paling lambat 2x24 jam karena Verifikasi Pembayaran masih dilakukan secara Manual.</p>
          <hr>
          <a href="{{ route('konfirmasiPembayaranSiswa') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i> Menuju Halaman.</a>
        </div>
      </div>
    </li>

    {{-- 444 --}}
    <li class="timeline-inverted">
      <div class="timeline-badge warning"><i class="fa fa-pencil"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">4. Tes Seleksi Akademik</h4>
        </div>
        <div class="timeline-body">
          <p>Calon Siswa melakukan Tes Seleksi Akademik dengan cara datang langsung ke sekolahan sesuai dengan Jadwal Tes yang sudah ditentukan. Tes Seleksi dimulai pukul 10.00 - selesai, agar memperlancar jalannya Tes Seleksi ini Calon Siswa diharapkan datang 1 jam lebih awal sebelum Tes Seleksi dimulai. Tes Seleksi ini hanya dilakukan 1x</p>
        </div>
      </div>
    </li>

    {{-- 555 --}}
    <li>
      <div class="timeline-badge info"><i class="fa fa-users"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">5. Melihat Hasil Tes Seleksi Akademik</h4>
        </div>
        <div class="timeline-body">
          <p>Setelah Calon Siswa melakukan Tes Seleksi di Sekolah, untuk selanjutnya Calon Siswa dapat melihat Hasil Tes yang sudah dilaksanakan di sekolah sesuai dengan Jadwal Tes yang sudah ditentukan. Hasil Tes dapat dilihat setelah Jadwal Tes selesai.</p>
          <p>Jika Calon Siswa dinyatakan <b>LULUS</b> maka selanjutnya dapat menunggu Hasil Penerimaan.</p>
          <p>Jika Calon Siswa dinyatakan <b>TIDAK LULUS</b> maka Calon Siswa sudah dipastikan tidak diterima dan dapat melakukan pendaftaran lagi sesuai dengan Jadwal Pendaftaran.</p>
          <hr>
          <a href="{{ route('indexTesSeleksiAkademikSiswa') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i> Menuju Halaman</a>
        </div>
      </div>
    </li>

    {{-- 666 --}}
    <li class="timeline-inverted">
      <div class="timeline-badge success"><i class="fa fa-university"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">6. Melihat Hasil Penerimaan</h4>
        </div>
        <div class="timeline-body">
          <p>Hasil Penerimaan hanya dapat dilihat oleh Calon Siswa yang sudah dinyatakan <b>LULUS</b> Tes Seleksi Akademik. Hasil Penerimaan dapat dilihat sesuai dengan Jadwal yang sudah ditentukan</p>
          <hr>
          <a href="{{ route('indexHasilPenerimaanSiswa') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i> Menuju Halaman</a>
        </div>
      </div>
    </li>
  </ul>
</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/timeline.css') }}">
<style type="text/css">
    .content-wrapper {
        background: #ffffff;
    }
</style>
@endpush


