@extends('layouts.siswa')
@section('main-content')
<div class="row">
    <div class="col-md-11">
        <div class="callout callout-info">
            <h4>Informasi !</h4>
            <p>Siswa harap membawa bukti Daftar Ulang</p>
        </div>
    </div>
    <div class="col-md-1">
        <a class="btn btn-app pull-right" style="height: 80px">
            <i class="fa fa-print"></i>   Cetak Bukti<br>Daftar Ulang
        </a>
    </div>
    <div class="col-md-8">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('postIndexDaftarUlangSiswa') }}">
        {{ csrf_field() }}
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">Daftar Ulang Siswa</div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">File Scan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Pas Photo 3 x 4 (Berwarna)</td>
                            @if($daftarulang->scan_foto_3x4 != null)
                                <td>
                                    <input id="scan_foto_3x4" type="file" name="scan_foto_3x4" class="form-control input-sm" disabled="disabled">
                                </td>
                                <td class="text-center">
                                    <span class="label label-success">Sudah</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat btn_lihat" data-toggle="modal" value="scan_foto_3x4">Lihat</button>
                                    <button id="scan_foto_3x4" type="button" class="btn btn-default btn-sm btn-flat btn_ubah" value="scan_foto_3x4">Ubah</button>
                                </td>
                            @else
                                <td>
                                    <input type="file" name="scan_foto_3x4" class="form-control input-sm">
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">Belum</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Lihat</button>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Ubah</button>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Kartu NISN</td>
                            @if($daftarulang->scan_nisn != null)
                                <td>
                                    <input id="scan_nisn" type="file" name="scan_nisn" class="form-control input-sm" disabled="disabled">
                                </td>
                                <td class="text-center">
                                    <span class="label label-success">Sudah</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat btn_lihat" data-toggle="modal" value="scan_nisn">Lihat</button>
                                    <button id="scan_nisn" type="button" class="btn btn-default btn-sm btn-flat btn_ubah" value="scan_nisn">Ubah</button>
                                </td>
                            @else
                                <td>
                                    <input type="file" name="scan_nisn" class="form-control input-sm">
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">Belum</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Lihat</button>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Ubah</button>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Kartu Keluarga*</td>
                            @if($daftarulang->scan_kartu_keluarga != null)
                                <td>
                                    <input id="scan_kartu_keluarga" type="file" name="scan_kartu_keluarga" class="form-control input-sm" disabled="disabled">
                                </td>
                                <td class="text-center">
                                    <span class="label label-success">Sudah</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat btn_lihat" data-toggle="modal" value="scan_kartu_keluarga">Lihat</button>
                                    <button id="scan_kartu_keluarga" type="button" class="btn btn-default btn-sm btn-flat btn_ubah" value="scan_kartu_keluarga">Ubah</button>
                                </td>
                            @else
                                <td>
                                    <input type="file" name="scan_kartu_keluarga" class="form-control input-sm">
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">Belum</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Lihat</button>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Ubah</button>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Akta Kelahiran*</td>
                            @if($daftarulang->scan_akta != null)
                                <td>
                                    <input id="scan_akta" type="file" name="scan_akta" class="form-control input-sm" disabled="disabled">
                                </td>
                                <td class="text-center">
                                    <span class="label label-success">Sudah</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat btn_lihat" data-toggle="modal" value="scan_akta">Lihat</button>
                                    <button id="scan_akta" type="button" class="btn btn-default btn-sm btn-flat btn_ubah" value="scan_akta">Ubah</button>
                                </td>
                            @else
                                <td>
                                    <input type="file" name="scan_akta" class="form-control input-sm">
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">Belum</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Lihat</button>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Ubah</button>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>SKHU / SKHUS*</td>
                            @if($daftarulang->scan_skhu != null)
                                <td>
                                    <input id="scan_skhu" type="file" name="scan_skhu" class="form-control input-sm" disabled="disabled">
                                </td>
                                <td class="text-center">
                                    <span class="label label-success">Sudah</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat btn_lihat" data-toggle="modal" value="scan_skhu">Lihat</button>
                                    <button id="scan_skhu" type="button" class="btn btn-default btn-sm btn-flat btn_ubah" value="scan_skhu">Ubah</button>
                                </td>
                            @else
                                <td>
                                    <input type="file" name="scan_skhu" class="form-control input-sm">
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">Belum</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Lihat</button>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Ubah</button>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>KTP Ayah/Ibu/Wali*</td>
                            @if($daftarulang->scan_ktp_ortu != null)
                                <td>
                                    <input id="scan_ktp_ortu" type="file" name="scan_ktp_ortu" class="form-control input-sm" disabled="disabled">
                                </td>
                                <td class="text-center">
                                    <span class="label label-success">Sudah</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat btn_lihat" data-toggle="modal" value="scan_ktp_ortu">Lihat</button>
                                    <button id="scan_ktp_ortu" type="button" class="btn btn-default btn-sm btn-flat btn_ubah" value="scan_ktp_ortu">Ubah</button>
                                </td>
                            @else
                                <td>
                                    <input type="file" name="scan_ktp_ortu" class="form-control input-sm">
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">Belum</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Lihat</button>
                                    <button type="button" class="btn btn-default btn-sm btn-flat disabled">Ubah</button>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>   Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Keterangan</div>
            </div>
            <div class="box-body">
                <p class="text-red"><strong>Ukuran maksimal 5Mb/file</strong></p>
                <p>Tanda * : Dokumen yang di scah harus <b>ASLI</b></p>
            </div>
        </div>
    </div>
</div>





{{-- Modal Dialog --}}
<div id="modal" class="modal fade">
    <div id="modal_size" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img id="image" src="" class="img img-responsive img-thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@push('script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $("body").on("click",".btn_ubah", function(){
            if (document.getElementById(this.value).disabled = true) {
                $('#'+this.value).prop('disabled', false);
                this.disabled = true;
            }
        });

        $("body").on("click",".btn_lihat", function(){
            var value = this.value;
            $.ajax({
                url : '{{ route('ajaxDaftarUlangSiswa') }}',
                method : 'POST' ,
                data : { type : value},
                success : function(response){
                    $("#image").attr("src",response);
                    console.log(value);
                    if (value == 'scan_foto_3x4' || value == 'scan_nisn' || value == 'scan_ktp_ortu') {
                        $("#modal_size").attr('class', 'modal-dialog modal-sm');
                    } else {
                        $("#modal_size").attr('class', 'modal-dialog');
                    }
                    
                    $('#modal').modal('show');
                    // $('#myModal').modal('hide');
                }
            });
        });
    });
</script>
@endpush

