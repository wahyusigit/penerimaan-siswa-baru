@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Detail Jadwal Pendaftaran') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title"><i class="fa fa-plus"></i>  Ubah Jadwal Pendaftaran</div>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Jadwal : </label>
                        <input type="text" name="nama_jadwal_pendf" class="form-control text-capitalize" required="required" placeholder="ex: Gelombang 1" value="{{ $jadwal->nm_jadwal }}" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="text" name="th_ajaran" class="form-control text-capitalize" required="required" value="{{ $jadwal->tahunAjaran->th_ajaran }}" readonly="readonly">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Pendaftaran : </label>
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal Mulai</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_mulai_pendf" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_mulai_pendf),'d-m-Y') }}" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal Selesai</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_selesai_pendf" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_akhir_pendf),'d-m-Y') }}" readonly="readonly">
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
                                    <input type="text" name="tanggal_mulai_tes" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_mulai_tes),'d-m-Y') }}" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal Selesai</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_selesai_tes" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_akhir_tes),'d-m-Y') }}" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Pengumuman Hasil Seleksi : </label>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-sm-4"></label>
                            <div class="col-md-6">
                                <input type="text" name="tanggal_pengumuman_penerimaan" class="form-control datepicker3" required="required" value="{{ date_format(date_create($jadwal->tgl_hasil_seleksi),'d-m-Y') }}" readonly="readonly">
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
                    <a href="{{ route('editJadwalAdmin', $jadwal->id_jadwal) }}" class="btn btn-success btn-flat"><i class="fa fa-save"></i>   Ubah</a>
                </div>
            </div>
        </div>
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
