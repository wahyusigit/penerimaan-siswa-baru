@extends('layouts.landing')
@section('htmlheader_title')
    {{ trans('Informasi dan Jadwal') }}
@endsection
@section('main-content')
    @isset($jadwal_terbuka)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="callout callout-info text-center">
                    <h4>Jadwal Pendaftaran <b class="text-capitalize">{{ $jadwal_terbuka->nm_jadwal }} - Tahun Ajaran {{ $jadwal_terbuka->th_ajaran }}</b> - Sudah Dibuka</h4>

                    <p>Silahkan Menuju Halaman Pendaftaran untuk melakukan Pendaftaran Siswa Baru</p>
                    <br>
                    <a href="{{ route('pendaftaranHomepage') }}" class="btn btn-primary btn-flat"><i class="fa fa-link"></i>   Halaman Pendaftaran</a>
                </div>
            </div>
        </div>
    </div>
    @endisset
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <h3 class="text-center">Jadwal Pendaftaran Online Siswa Baru</h3>

                        <hr>            
                        <table class="table table-bordered table-stripped align-middle">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th class="text-center">Tanggal<br>Pendaftaran</th>
                                    <th class="text-center">Tanggal Tes<br>Ujian Masuk</th>
                                    <th class="text-center">Pengumuman<br>Hasil Seleksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($jadwal_terbukas->isEmpty())
                                    <tr>
                                        <td colspan="4"><h4 class="text-center">Maaf, Jadwal Pendaftaran belum dibuka</h4></td>
                                    </tr>
                                @else
                                @foreach($jadwal_terbukas as $jadwal)

                                @isset($jadwal_terbuka)
                                    @if($jadwal->id_jadwal === $jadwal_terbuka->id_jadwal)
                                        <tr class="bg-green">
                                    @else
                                        <tr>
                                    @endif
                                @else
                                    <tr>
                                @endisset
                                    <td class="text-capitalize">{{ $jadwal->nm_jadwal }}</td>
                                    <td class="text-center">{{ date_format(date_create($jadwal->tgl_mulai_pendf),"d M Y") }} s.d {{ date_format(date_create($jadwal->tgl_akhir_pendf),"d M Y") }}</td>
                                    <td class="text-center">{{ date_format(date_create($jadwal->tgl_mulai_tes),"d M Y") }} s.d {{ date_format(date_create($jadwal->tgl_akhir_tes),"d M Y") }}</td>
                                    <td class="text-center">{{ date_format(date_create($jadwal->tgl_hasil_seleksi),"d M Y") }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">
                            Syarat-syarat Pendaftaran Calon Siswa:
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            {{-- <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">1</span>
                                Membayar Formulir Pendaftaran, Tes Akademik dan Tes Psikotes sebesar Rp 300.000,- (tiga ratus ribu rupiah)
                            </li> --}}

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">1</span>
                                Warga Negara Indonesia (WNI), laki-laki dan perempuan.    
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">2</span>
                                Lulus Ujian Nasional SLTP/setingkat
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">3</span>
                                Berijazah SLTP/setingkat.   
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">4</span>
                                Melengkapi Data Pribadi, Data Pendidikan dan Data Orang Tua / Wali
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">5</span>
                                Melakukan Pembayaran Registrasi sebesar Rp. 100.000,-
                            </li>

                            <li class="list-group-item justify-content-between">
                                <span class="badge badge-default badge-pill pull-left" style="margin-right: 10px">6</span>
                                Melakukan Tes Seleksi 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript" src="{{ asset('/js/wizard.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        $("#datepicker3").datepicker({
            autoclose : true,
            format: 'dd-mm-yyyy',
            startDate: '-20y',
            endDate: '-7y',
            defaultViewDate: {year:2000, month:1, day:1},
        });
    </script>
@endpush
