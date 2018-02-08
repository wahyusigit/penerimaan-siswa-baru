@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Verifikasi Pembayaran') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>
</div>

{{-- Pembayaran Registrasi --}}
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Data Pembayaran Registrasi</div>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Belum di Verifikasi</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Sudah di Verifikasi</a></li>
                    </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">No Pendaftaran</th>
                                    <th class="text-center">Nama<br>Calon Siswa</th>
                                    <th class="text-center">Nama<br>Pemilik Rekening</th>
                                    <th class="text-center">No Rekening</th>
                                    <th class="text-center">Nama Bank</th>
                                    <th class="text-center">Cabang Bank</th>
                                    <th class="text-center">Tanggal<br>Pembayaran</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran_blm_verifs as $no=>$pembayaran)
                                <tr>
                                    <td class="text-center"><input class="no_pemb" type="hidden" name="no_pemb" value="{{ $pembayaran->no_pemb }}">{{ $no+1 }}</td>
                                    <td class="text-uppercase">{{ $pembayaran->no_pendf }}</td>
                                    <td class="text-capitalize">{{ $pembayaran->calonSiswa->nm_cln_siswa }}</td>
                                    <td class="text-capitalize">{{ $pembayaran->nm_pemilik_rek }}</td>
                                    <td>{{ $pembayaran->no_rek }}</td>
                                    <td class="text-uppercase">{{ $pembayaran->nm_bank }}</td>
                                    <td class="text-capitalize">{{ $pembayaran->cbg_bank }}</td>
                                    <td>{{ $pembayaran->tgl_pembayaran }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-flat btnverifikasi" data-toggle="modal" data-target="#modalVerifikasi"><i class="fa fa-check-square-o"></i>   Verifikasi</button>
                                            {{-- <a href="" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i></a> --}}
                                            {{-- <a href="" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pembayaran_blm_verifs->links() }}
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">No Pendaftaran</th>
                                    <th class="text-center">Nama<br>Calon Siswa</th>
                                    <th class="text-center">Nama<br>Pemilik Rekening</th>
                                    <th class="text-center">No Rekening</th>
                                    <th class="text-center">Nama Bank</th>
                                    <th class="text-center">Cabang Bank</th>
                                    <th class="text-center">Tanggal<br>Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran_sdh_verifs as $no=>$pembayaran)
                                <tr>
                                    <td class="text-center"><input type="hidden" name="no_pemb" value="{{ $pembayaran->no_pemb }}">{{ $no+1 }}</td>
                                    <td>{{ $pembayaran->no_pemb }}</td>
                                    <td>{{ $pembayaran->calonSiswa->nm_cln_siswa }}</td>
                                    <td>{{ $pembayaran->nm_pemilik_rek }}</td>
                                    <td>{{ $pembayaran->no_rek }}</td>
                                    <td>{{ $pembayaran->nm_bank }}</td>
                                    <td>{{ $pembayaran->cbg_bank }}</td>
                                    <td>{{ $pembayaran->tgl_pembayaran }}</td>
                                    {{-- <td class="text-center">
                                        <div class="btn-group">
                                            <a href="" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>   Edit</a>
                                        </div>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pembayaran_sdh_verifs->links() }}
                    </div>
                </div>
                
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>


{{-- Modal Dialog Add Jurusan --}}
<div id="modalVerifikasi" class="modal fade">
    <div class="modal-dialog">
        <form action="{{ route('postVerifikasiPembayaranAdmin') }}" method="POST">
            {{ csrf_field() }}
            <input id="inp_no_pemb" type="hidden" name="no_pemb">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Verifikasi Pembayaran</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>No. Pendaftaran</label>
                            <input id="inp_no_pendaftaran" type="text" name="no_pendaftaran" class="form-control text-uppercase" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Calon Siswa</label>
                            <input id="inp_nama_pendaftar" type="text" name="nama_pendaftar" class="form-control text-capitalize" readonly="readonly">
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nama Pemilik Rekening</label>
                            <input id="inp_nama_pemilik" type="text" name="nama_pemilik" class="form-control text-capitalize" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>No. Rekening</label>
                            <input id="inp_no_rekening" type="text" name="no_rekening" class="form-control text-uppercase" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bama Bank</label>
                            <input id="inp_nama_bank" type="text" name="nama_bank" class="form-control text-uppercase" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cabang Bank</label>
                            <input id="inp_cabang_bank" type="text" name="cabang_bank" class="form-control text-capitalize" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Pembayaran</label>
                            <input id="inp_tanggal_pemb" type="text" name="tanggal_pemb" class="form-control datepicker3" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Verifikasi</label>
                            <input id="inp_tanggal_verif" type="text" name="tanggal_verif" class="form-control datepicker3" value="{{ date("d-m-Y") }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat clear" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-square-o"></i>   Verifikasi</button>
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
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("body").on("click",".btnverifikasi", function(){

                vall = $(this).closest('tbody').find('tr td');
                no_pemb_val = vall.find(".no_pemb");
                no_pemb = no_pemb_val[0].value;
                
                $("#inp_no_pemb").val(no_pemb);
                $("#inp_no_pendaftaran").val(vall[1].textContent);
                $("#inp_nama_pendaftar").val(vall[2].textContent);
                $("#inp_nama_pemilik").val(vall[3].textContent);
                $("#inp_no_rekening").val(vall[4].textContent);
                $("#inp_nama_bank").val(vall[5].textContent);
                $("#inp_cabang_bank").val(vall[6].textContent);
                $("#inp_tanggal_pemb").val(vall[7].textContent);
                // $("#inp_tanggal_verif").val(vall[8].textContent);
            });
           $(".clear").click(function(){
                $("#inp_no_pemb").val("");
                $("#inp_no_pendaftaran").val("");
                $("#inp_nama_pendaftar").val("");
                $("#inp_nama_pemilik").val("");
                $("#inp_no_rekening").val("");
                $("#inp_nama_bank").val("");
                $("#inp_cabang_bank").val("");
                $("#inp_tanggal_pemb").val("");
                // $("#inp_tanggal_verif").val("");
           });
        });
    </script>
@endpush
