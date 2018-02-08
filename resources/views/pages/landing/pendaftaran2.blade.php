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
                    <h4>Selamat Datang di Halaman Pendaftaran Siswa Baru -  <b>{{ $jadwal->nm_jadwal }}</b></h4>

                    <p>Silahkan isi semua data yang dibutuhkan, jika mengalami gangguan atau kesulitan dalam melakukan Registrasi / Pendaftaran ini silahkan Hubungi kami. </p>
                </div>
            </div>
        </div>
    </div>    
    <div class="container">
        <form id="formPendaftaran" role="form" data-toggle="validator" class="form-horizontal" action="{{ route('postPendaftaranHomepage') }}" method="POST" data-bv-message="This value is not valid"
                      data-bv-feedbackicons-valid="fa fa-check"
                      data-bv-feedbackicons-invalid="fa fa-close"
                      data-bv-feedbackicons-validating="fa fa-refresh">
        {{ csrf_field() }}
        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
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
                                <input type="text" class="form-control text-capitalize" name="nm_cln_siswa" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">NISN</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="nisn" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jenis kelamin</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="jns_kelamin" required="required">
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tempat lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control text-capitalize" name="tmp_lahir" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal lahir</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="tgl_lahir" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Agama</label>
                            <div class="col-sm-4">
                                <select class="form-control text-capitalize" name="agama" required="required">
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
                                <textarea name="alamat" class="form-control text-capitalize" rows="5" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pilihan Jurusan</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="kd_jurusan" required="required">
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->kd_jurusan }}">{{ $jurusan->nm_jurusan }}</option>
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
                                <input type="text" class="form-control text-capitalize" name="nm_ortu" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pekerjaan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control text-capitalize" name="pkrj_ortu" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Penghasilan</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="gaji_ortu" required="required" autocomplete="off">
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
                                <input type="text" class="form-control text-capitalize" name="sklh_asal" required="required" autocomplete="off">
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
                                <input id="inputEmail"  type="text" class="form-control" name="email" required="required" data-error="Penulisan Email salah, Silahkan periksa kembali" autocomplete="off">
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <button id="btn_submit" type="submit" class="btn btn-success btn-lg btn-flat pull-right">Daftar Sekarang !</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @endif
@endsection

@push('css')
    <link href="{{ asset('plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/wizard.css') }}"> --}}
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
    <script type="text/javascript" src="{{ asset('plugins/formvalidation/js/bootstrapValidator.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    {{-- <script type="text/javascript" src="{{ asset('/js/wizard.js') }}"></script> --}}
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

    {{-- Form Validation Jquery https://github.com/cooldeeparmar/Bootstrap-Validator --}}
    {{-- <script type="text/javascript">
        $('#formValidation').validator();
    </script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#formPendaftaran').bootstrapValidator({
            framework: 'bootstrap',
            // icon: {
            //     valid: 'glyphicon glyphicon-ok',
            //     invalid: 'glyphicon glyphicon-remove',
            //     validating: 'glyphicon glyphicon-refresh'
            // },
            icon: {
                valid: 'fa fa-check-circle-o',
                invalid: 'fa fa-close',
                validating: 'fa fa-refresh'
            },
            // locale: 'en_US',
            // icon: {
                // ...
            // },
            fields: {
                nm_cln_siswa: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Lengkap tidak boleh kosong'
                        },
                        stringLength: {
                            min: 4,
                            max: 20,
                            message: 'Nama Lengkap tidak boleh kurang dari 4 huruf dan lebih dari 20 huruf'
                        },
                        // regexp: {
                        //     regexp: /^[a-zA-Z0-9_\.]+$/,
                        //     message: 'The username can only consist of alphabetical, number, dot and underscore'
                        // }
                    }
                },
                nisn: {
                    validators: {
                        notEmpty: {
                            message: 'NISN tidak boleh kosong'
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                            message: 'NISN harus diisi dengan angka paling banyak 10 digit'
                        },
                        // regexp: {
                        //     regexp: /^[a-zA-Z0-9_\.]+$/,
                        //     message: 'The username can only consist of alphabetical, number, dot and underscore'
                        // }
                    }
                },
                jns_kelamin: {
                    validators: {
                        notEmpty: {
                            message: 'Jenis Kelamin wajib pilih salah satu'
                        }
                    }
                },
                tmp_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tempat Lahir tidak boleh kosong'
                        }
                    }
                },
                tgl_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal Lahir tidak boleh kosong'
                        }
                    }
                },
                agama: {
                    validators: {
                        notEmpty: {
                            message: 'Agama wajib pilih salah satu'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat tidak boleh kosong'
                        }
                    }
                },
                kd_jurusan: {
                    validators: {
                        notEmpty: {
                            message: 'Jurusan wajib pilih salah satu'
                        }
                    }
                },
                nm_ortu: {
                    validators: {
                        notEmpty: {
                            message: 'Namar Orang Tua / Wali tidak boleh kosong'
                        }
                    }
                },
                pkrj_ortu: {
                    validators: {
                        notEmpty: {
                            message: 'Pekerjaan Orang Tua / Wali tidak boleh kosong'
                        }
                    }
                },
                gaji_ortu: {
                    validators: {
                        notEmpty: {
                            message: 'Gaji Orang Tua / Wali tidak boleh kosong'
                        },
                        between: {
                            min: 100000,
                            max: 9999999,
                            message: 'Harap masukkan dengan benar'
                        },
                        numeric: {
                            message: 'The value is not a number',
                            // The default separators
                            thousandsSeparator: '.',
                            decimalSeparator: ','
                        }
                    }
                },
                sklh_asal: {
                    validators: {
                        notEmpty: {
                            message: 'Sekolah Asal tidak boleh kosong'
                        }
                    }
                }
            }
        }).on('err.field.fv', function(e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
        })
        .on('success.field.fv', function(e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
        });

        // $('input[type="submit"]').attr('disabled','disabled');
        $('#btn_submit').attr('disabled','disabled');
    });
</script>
@endpush

@push('css')
<script type="text/javascript" ></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/formvalidation/css/bootstrapValidator.min.css') }}">
<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
</style>
@endpush
