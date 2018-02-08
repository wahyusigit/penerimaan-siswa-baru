@extends('layouts.siswa')
@section('main-content')
<div class="row">
    @if(is_null($jadwal_tes))
        @if(is_null($hasil_tes_seleksi))
        <div class="col-md-12">
            <div class="callout callout-info text-center">
                <h4>Maaf, Anda tidak melakukan Tes Seleksi sesuai dengan Jadwal yang sudah ditentukan</h4>
                <h5>Jika Anda sudah melakukan Tes Seleksi dan tidak dapat melihat Hasil Tes Seleksi, Silahkah datang ke Sekolah untuk melakukan Konfirmasi kepada Panitia PSB. Terimakasih</h5>
            </div>
        </div>
        @else
        <div class="col-md-12">
            <div class="callout callout-info text-center">
                <h4>Selamat, Anda dinyatakan Lulus Tes Seleksis</h4>
                <p>
                    
                </p>
            </div>
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Hasil Nilai</div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No. Pendaftaran</th>
                                <th>Nama lengkap</th>
                                <th>Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $hasil_tes_seleksi->no_pendf }} </td>
                                <td> {{ $hasil_tes_seleksi->tgl_tes_akad }} </td>
                                <td> {{ $hasil_tes_seleksi->nilai_tes_akad }} </td>
                                <td> {{ $hasil_tes_seleksi->sts_tes_akad }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    @else
    <div class="col-md-12">
        <div class="callout callout-info text-center">
            <h4>Informasi dan Jadwal Tes Seleksi Akademik</h4>
            <h4>Tes Seleksi Akademik akan dilaksanakan pada tanggal:<br><br> <code>{{ $jadwal_tes->tgl_mulai_tes }} s.d {{ $jadwal_tes->tgl_akhir_tes }} pukul 09.00 - 11.00 WIB</code></h4>
            <h5>Mohon datang tepat waktu untuk mengikuti Tes Seleksi Akademik</h5>
        </div>
    </div>
    @endif
</div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
@endpush

@push('script')
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        $(".datepicker3").datepicker({
            autoclose : true,
            format: 'dd-mm-yyyy',
        });
    </script>
    <script type="text/javascript">
        $('body').on('click','#btnubah', function(){
            $('.edit').attr('readonly',false);
            $('#btnubah').replaceWith('<button type="submit" class="btn btn-default btn-flat"><i class="fa fa-save"></i>   Simpan</button>');
        });
    </script>
@endpush
