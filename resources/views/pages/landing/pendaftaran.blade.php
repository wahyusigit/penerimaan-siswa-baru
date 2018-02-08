@extends('layouts.landing')

@section('htmlheader_title')
    {{ trans('Pendaftaran') }}
@endsection

@section('main-content')

    @if(is_null($jadwal))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body center-block text-center">
                        <h3>Pendaftaran Siswa Baru Belum Dibuka</h3>
                        <h4>Silahkan menuju Halaman Jadwal Pendaftaran untuk mengetahui tanggal pendaftaran.</h4>
                        <br>
                        <a href="{{ route('jadwalHomepage') }}" class="btn btn-flat btn-primary"><i class="fa fa-link"></i> Halaman Jadwal Pendaftaran</a>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @else
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="callout callout-info">
                    <h4>Selamat Datang di Halaman Pendaftaran Siswa Baru -  <b>{{ $jadwal->nama_jadwal_pendf }}</b></h4>

                    <p>Silahkan isi semua data yang dibutuhkan, jika mengalami gangguan atau kesulitan dalam melakukan Registrasi / Pendaftaran ini silahkan Hubungi kami. </p>
                </div>
            </div>
        </div>
    </div>    
    <div class="container">
        <form enctype="multipart/form-data"  class="form-horizontal" action="{{ route('postPendaftaranHomepage') }}" method="POST">
        {{ csrf_field() }}
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="step1">
                    <div class="col-md-12">
                        <legend>Data Pribadi</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Calon Siswa</label>
                                    <div class="col-sm-7">
                                        <input name="nama_pendaftar" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No. NISN</label>
                                    <div class="col-sm-5">
                                        <input name="nisn" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="l">Laki-laki</option>
                                            <option value="p">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tempat lahir</label>
                                    <div class="col-sm-5">
                                        <input name="tempat_lahir" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tanggal lahir</label>
                                    <div class="col-sm-4">
                                        <input id="datepicker3" name="tanggal_lahir" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Agama</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="agama">
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="budha">Budha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tinggi Badan</label>
                                    <div class="col-sm-3">
                                        <input name="tinggi_badan" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Berat Badan</label>
                                    <div class="col-sm-3">
                                        <input name="berat_badan" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Pilihan Jurusan 1</label>
                                    <div class="col-sm-6">
                                        <select id="pil_jurusan_1" name="pil_jurusan_1" class="form-control" required="required">
                                            <option value="" selected="selected"></option>
                                            @foreach($jurusans as $jurusan)
                                                <option value="{{ $jurusan->kode_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Pilihan Jurusan 2</label>
                                    <div class="col-sm-6">
                                        <select id="pil_jurusan_2" name="pil_jurusan_2" class="form-control" required="required">
                                            <option value="" selected="selected"></option>
                                            @foreach($jurusans as $jurusan)
                                                <option value="{{ $jurusan->kode_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat" type="text" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kelurahan</label>
                                    <div class="col-sm-4">
                                        <input name="kelurahan" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kecamatan</label>
                                    <div class="col-sm-4">
                                        <input name="kecamatan" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kabupaten / Kota</label>
                                    <div class="col-sm-4">
                                        <input name="kabupaten" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Propinsi</label>
                                    <div class="col-sm-4">
                                        <input name="propinsi" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No. Handphone</label>
                                    <div class="col-sm-4">
                                        <input name="no_hp" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Pas Photo (3X4)</label>
                                    <div class="col-sm-8">
                                        <input name="pas_foto" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary btn-flat next-step">Simpan dan Lanjutkan</button></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="step2">
                    <div class="col-md-6">
                        <legend>Data Pendidikan</legend>
                        {{-- Test Select2 Autocomplete --}}
                        <input id="id_sekolah_asal" type="hidden" name="id_sekolah_asal">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Sekolah Asal</label>
                            <div class="col-sm-7">
                                <input id="autocomplete_sekolah_asal" type="text" name="" class="form-control autocomplete_sekolah_asal">
                            </div>
                        </div>
                        {{-- End. Test Select2 Autocomplete --}}
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Alamat Sekolah Asal</label>
                            <div class="col-sm-7">
                                <textarea id="alamat_sekolah_asal" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <legend>Nilai Rapor Semester 5</legend>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nilai Matematika</label>
                            <div class="col-sm-3">
                                <input name="nilai_matematika" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nilai Bhs. Inggris</label>
                            <div class="col-sm-3">
                                <input name="nilai_bhs_inggris" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nilai IPA</label>
                            <div class="col-sm-3">
                                <input name="nilai_ipa" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default btn-flat prev-step">Sebelumnya</button></li>
                            <li><button type="button" class="btn btn-primary btn-flat next-step">Simpan dan Lanjutkan</button></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="step3">
                    <div class="col-md-6">
                        <legend>Data Orang Tua</legend>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jenis Data</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="jenis_data_ortu">
                                    <option value="orang tua">Orang Tua</option>
                                    <option value="wali">Wali</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama lengkap</label>
                            <div class="col-sm-7">
                                <input name="nama_ortu" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pekerjaan</label>
                            <div class="col-sm-5">
                                <input name="pekerjaan_ortu" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Penghasilan</label>
                            <div class="col-sm-4">
                                <input name="penghasilan_ortu" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">No. HP Orang Tua / Wali</label>
                            <div class="col-sm-5">
                                <input name="no_hp_ortu" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-12">
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default btn-flat prev-step">Sebelumnya</button></li>
                            <li><button type="button" class="btn btn-default btn-flat next-step">Lewati</button></li>
                            <li><button type="button" class="btn btn-primary btn-flat btn-info-full next-step">Simpan dan Lanjutkan</button></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="complete">
                    <div class="col-md-12 text-center">
                        <h3></h3>
                        <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
                        <h3></h3>
                    </div>
                    <br><br><br>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        </form>
    </div>

    @endif
@endsection

@push('css')
    <link href="{{ asset('plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/skin-black.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('plugins/iCheck/skins/flat/blue.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('plugins/jqueryui/jquery-ui.min.css') }}">
    <link href="{{ asset('css/table_middle.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            background-color: #ecf0f5;
        }
    </style>
    {{-- Select2 --}}
    
@endpush

@push('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript" src="{{ asset('/js/wizard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        $("#datepicker3").datepicker({
            autoclose : true,
            format: 'dd/mm/yyyy',
            startDate: '-20y',
            endDate: '-7y',
            defaultViewDate: {year:2000, month:1, day:1},
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
