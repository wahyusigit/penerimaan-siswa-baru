@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Edit Jadwal Pendaftaran') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-9">
        <form class="form-horizontal" method="POST" action="{{ route('updateJadwalAdmin') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">

        <div class="box">
            <div class="box-header with-border">
                <div class="box-title"><i class="fa fa-plus"></i>  Ubah Jadwal Pendaftaran</div>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Jadwal : </label>
                        <input type="text" name="nama_jadwal_pendf" class="form-control text-capitalize" required="required" placeholder="ex: Gelombang 1" value="{{ $jadwal->nm_jadwal }}">
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select name="id_th_ajaran" class="form-control" required="required">
                                <option value="{{ $jadwal->id_th_ajaran }}">{{ $jadwal->tahunAjaran->th_ajaran }}</option>
                            @foreach($tahunajarans as $tahunajaran)
                                <option value="{{ $tahunajaran->id_th_ajaran }}">{{ $tahunajaran->th_ajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Pendaftaran : </label>
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal Mulai</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_mulai_pendf" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_mulai_pendf),'d-m-Y') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal Selesai</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_selesai_pendf" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_akhir_pendf),'d-m-Y') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Tanggal Tes Ujian Masuk :</label>
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal Mulai</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_mulai_tes" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_mulai_tes),'d-m-Y') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal Selesai</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_selesai_tes" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_akhir_tes),'d-m-Y') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Pengumuman Hasil Seleksi : </label>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-sm-4"></label>
                            <div class="col-md-6">
                                <input type="text" name="tanggal_pengumuman_penerimaan" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_hasil_seleksi),'d-m-Y') }}">
                            </div>
                        </div>
                    </div>
                    {{-- <label>Daya Tampung Pendaftaran : </label>
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4"></label>
                                <div class="col-md-6">
                                    <input type="number" name="daya_tampung_pendf" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                    <a href="{{ route('indexJadwalAdmin') }}" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>   Kembali</a>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>   Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-3">
        
    </div>
</div>
@endsection


@push('script')
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        
    </script>
@endpush
