@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Detail Data Pendaftaran') }}
@endsection
@section('main-content')
<form class="form-horizontal" action="{{ route('updatePendaftaranAdmin', $calonsiswa->no_pendf) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id_user" value="{{ $calonsiswa->id_user }}">
    <input type="hidden" name="id_jadwal" value="{{ $calonsiswa->id_jadwal }}">
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Data Pribadi</div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control text-capitalize" name="nm_cln_siswa" required="required" value="{{ $calonsiswa->nm_cln_siswa }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">NISN</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="nisn" required="required" value="{{ $calonsiswa->nisn }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jenis kelamin</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="jns_kelamin" required="required" readonly="readonly">
                                    @if($calonsiswa->jns_kelamin == 'l')
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
                            <label class="col-sm-4 control-label">Tempat lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control text-capitalize" name="tmp_lahir" required="required" value="{{ $calonsiswa->tmp_lahir }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control datepicker3" name="tgl_lahir" required="required"  value="{{ date_format(date_create($calonsiswa->tgl_lahir), "d-m-Y") }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Agama</label>
                            <div class="col-sm-4">
                                <select class="form-control text-capitalize" name="agama" required="required" readonly="readonly">
                                    <option value="{{ $calonsiswa->agama }}" selected="selected">{{ $calonsiswa->agama }}</option>
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
                                <textarea id="alamat_sekolah_asal" name="alamat" class="form-control" rows="5" required="required" readonly="readonly">{{ $calonsiswa->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pilihan Jurusan</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="kd_jurusan" required="required" readonly="readonly">
                                    @foreach($jurusans as $jurusan)
                                        @if($calonsiswa->kd_jurusan === $jurusan->kd_jurusan)
                                        <option value="{{ $jurusan->kd_jurusan }}" selected="selected">{{ $jurusan->nm_jurusan }}</option>
                                        @else
                                        <option value="{{ $jurusan->kd_jurusan }}">{{ $jurusan->nm_jurusan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Data Orang Tua / Wali</div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control text-capitalize" name="nm_ortu" required="required" value="{{ $calonsiswa->nm_ortu }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pekerjaan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control text-capitalize" name="pkrj_ortu" required="required" value="{{ $calonsiswa->pkrj_ortu }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Penghasilan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="gaji_ortu" required="required" value="{{ $calonsiswa->gaji_ortu }}" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Data Pendidikan</div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Sekolah Asal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control text-capitalize" name="sklh_asal" required="required" value="{{ $calonsiswa->sklh_asal }}" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Data Login</div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-4 control-label">E-Mail</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" required="required" value="{{ $calonsiswa->user->email }}" readonly="readonly">
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{ route('indexPendaftaranAdmin', $calonsiswa->no_pendf) }}" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>   Kembali</a>
                </div>
                <div class="pull-right">
                    <a href="{{ route('editPendaftaranAdmin', $calonsiswa->no_pendf) }}" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i>   Edit</a>
                </div>
            </div>
        </div>
    </div>
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
