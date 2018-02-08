@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Profile Panitia - ' . $panitia->nm_panitia) }}
@endsection
@section('main-content')
<form action="{{ route('updateProfileAdmin') }}" method="POST">
    {{ csrf_field() }}
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Profil Panitia</div>
                    </div>
                    <div class="box-body form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">NIP</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nip" required="required" value="{{ $panitia->nip }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control text-capitalize" name="nm_panitia" required="required" value="{{ $panitia->nm_panitia }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jenis kelamin</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="jns_kelamin" required="required">
                                    @if($panitia->jns_kelamin == 'l')
                                        <option value="l" selected="selected">Laki-laki</option>
                                        <option value="p">Perempuan</option>
                                    @else
                                        <option value="l">Laki-laki</option>
                                        <option value="p" selected="selected">Perempuan</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Agama</label>
                            <div class="col-sm-4">
                                <select class="form-control text-capitalize" name="agama" required="required">
                                    <option value="{{ $panitia->agama }}" selected="selected">{{ $panitia->agama }}</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Alamat lengkap</label>
                            <div class="col-sm-8">
                                <textarea name="alamat" class="form-control" rows="5" required="required">{{ $panitia->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">No. Handphone</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control text-capitalize" name="no_hp" required="required" value="{{ $panitia->no_hp }}">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            {{-- <a href="{{ route('editProfileAdmin') }}" class="btn btn-primary btn-flat"> <i class="fa fa-edit"></i> Ubah</a> --}}
                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>   Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{ route('indexPendaftaranAdmin', $panitia->no_pendf) }}" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>   Kembali</a>
                </div>
                <div class="pull-right">
                    <a href="{{ route('editPendaftaranAdmin', $panitia->no_pendf) }}" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i>   Edit</a>
                </div>
            </div>
        </div>
    </div> --}}
</div>
</form>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
@endpush

@push('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/autocomplete/jquery.autocomplete.min.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        $(".datepicker3").datepicker({
            autoclose : true,
            format: 'dd-mm-yyyy',
        });
    </script>

    <script type="text/javascript">
        // Autocomplete Sekolah
        $('body').on('focus','.autocomplete_sekolah_asal',function(){
            $(this).autocomplete({
              source: function( request, response ) {
                $.ajax({
                  url : '{{ route('ajaxDataSekolahAsal') }}',
                  method : "POST",
                  dataType: "JSON",
                  data: {
                     nama_sekolah : request.term
                  },
                   success: function( data ) {
                    console.log();
                    if (data.length == 0 ){
                        $('#id_sekolah_asal').val("");
                        $('#alamat_sekolah_asal').val("");
                        $('#alamat_sekolah_asal').prop('disabled',false);
                    } else {
                        
                        response( $.map( data, function( item ) {
                            return {
                                label: item.nama_sekolah,
                                value: item.nama_sekolah,
                                data : item
                            }
                        }));
                    }
                    
                  }
                });
              },
              select: function( event, ui ) {
                $('#id_sekolah_asal').val(ui.item.data.id_sekolah_asal);
                $('#alamat_sekolah_asal').val(ui.item.data.alamat);
                $('#alamat_sekolah_asal').prop('disabled',true);
              },
              minLength: 2
            });
        });

        // Pilihan Jurusan Tidak Boleh Sama
        $('body').on('change','#pil_jurusan_1', function(){
            pilihan = this.value;
            if ($('#pil_jurusan_2').val() === pilihan) {
                alert("Maaf, Pilihan Jurusan Tidak Boleh Sama.");
                this.value = "";
            }
        });
        $('body').on('change','#pil_jurusan_2', function(){
            pilihan = this.value;
            if ($('#pil_jurusan_1').val() === pilihan) {
                alert("Maaf, Pilihan Jurusan Tidak Boleh Sama.");
                this.value = "";
            }
        });
    </script>

@endpush
