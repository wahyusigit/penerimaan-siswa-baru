@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans($kelas->nm_kelas . "-" . $kelas->tahunAjaran->th_ajaran) }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>
</div>

{{-- Kelas --}}
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Data Kelas - {{ $kelas->nm_kelas }} - {{ $kelas->tahunAjaran->th_ajaran }}</div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center col-md-2">Nama Lengkap</th>
                            <th class="text-center col-md-1">NISN</th>
                            <th class="text-center col-md-1">Jenis<br>Kelamin</th>
                            <th class="text-center col-md-1">Agama</th>
                            <th class="text-center col-md-6">Alamat Lengkap</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($kelas->siswa->isEmpty())
                        <tr>
                            <td colspan="6"><h4 class="text-center">Maaf, Tidak Ada Siswa</h4></td>
                        </tr>
                        @else
                        @foreach($kelas->siswa as $no => $kls)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td class="text-capitalize"> {{ $kls->nm_cln_siswa }}</td>
                            <td class="text-capitalize"> {{ $kls->nisn }}</td>
                            <td class="text-capitalize text-center"> {{ $kls->jns_kelamin }}</td>
                            <td class="text-capitalize text-center"> {{ $kls->agama }}</td>
                            <td class="text-capitalize"> {{ $kls->alamat }}</td>
                            <td>
                                <a href="{{ route('detailSiswaKelasAdmin', $kls->no_pendf) }}" class="btn btn-default btn-sm btn-flat">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                    <a href="{{ route('indexJurusanKelasAdmin') }}" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>   Kembali</a>
                </div>
                <div class="pull-right"></div>
            </div>
        </div>
    </div>
</div>




{{-- Modal Dialog Add Jurusan --}}
<div id="modalAddJurusan" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('postAddJurusanAdmin') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Tambah Tahun Ajaran</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input type="text" name="kd_jurusan" class="form-control" placeholder="ex: TKJ" required="required">
                </div>
                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input type="text" name="nm_jurusan" class="form-control" placeholder="ex: Teknik Komputer Jaringan" required="required">
                </div>
                {{-- <div class="form-group">
                    <label>Daya Tampung</label>
                    <input type="text" name="daya_tampung" class="form-control" placeholder="ex: 100" required="required">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>   Tambah</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- Modal Dialog Edit Jurusan --}}
<div id="modalEditJurusan" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('postUpdateJurusanAdmin') }}" method="POST">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Ubah Jurusan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input id="inp_kd_jurusan" name="kd_jurusan"  type="text" class="form-control" placeholder="ex: TKJ" required="required" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input id="inp_nm_jurusan" type="text" name="nm_jurusan" class="form-control" placeholder="ex: Teknik Komputer Jaringan" required="required">
                </div>
                {{-- <div class="form-group">
                    <label>Daya Tampung</label>
                    <input id="inp_daya_tampung" type="text" name="daya_tampung" class="form-control" placeholder="ex: 100" required="required">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>   Simpan</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection


@push('script')
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    
    {{-- Edit Jurusan Table Modal Bootstrap --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("body").on("click",".btnedit_jurusan", function(){
                vall = $(this).closest('tr').find('td');
                $("#inp_kd_jurusan").val(vall[1].textContent);
                $("#inp_nm_jurusan").val(vall[2].textContent);
                $("#inp_daya_tampung").val(vall[3].textContent);
            });
        });
    </script>

    {{-- Edit Kelas Table Modal Bootstrap --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("body").on("click",".btnedit_kelas", function(){
                vall = $(this).closest('tr').find('td');
                option_html = '<option value="' + vall[2].textContent + '" selected>' + vall[2].textContent + '</option>';
                $("#inp_kd_jurusan_kls").append(option_html);
                $("#inp_kd_kelas").val(vall[1].textContent);
                $("#inp_nm_kelas").val(vall[3].textContent);
            });
        });
    </script>
@endpush
