@extends('layouts.siswa')

@section('main-content')
<form id="formPendaftaran" action="{{ route('updatePendaftaranSiswa') }}" method="POST" class="form-horizontal">
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
                                <input type="text" class="form-control text-capitalize" name="nm_cln_siswa" required="required" value="{{ $calonsiswa->nm_cln_siswa }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">NISN</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="nisn" required="required" value="{{ $calonsiswa->nisn }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jenis kelamin</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="jns_kelamin" required="required">
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
                                <input type="text" class="form-control text-capitalize" name="tmp_lahir" required="required" value="{{ $calonsiswa->tmp_lahir }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control datepicker3" name="tgl_lahir" required="required"  value="{{ date_format(date_create($calonsiswa->tgl_lahir), "d-m-Y") }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Agama</label>
                            <div class="col-sm-4">
                                <select class="form-control text-capitalize" name="agama" required="required">
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
                                <textarea id="alamat_sekolah_asal" name="alamat" class="form-control" rows="5" required="required">{{ $calonsiswa->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pilihan Jurusan</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="kd_jurusan" required="required">
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
                                <input type="text" class="form-control text-capitalize" name="nm_ortu" required="required" value="{{ $calonsiswa->nm_ortu }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pekerjaan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control text-capitalize" name="pkrj_ortu" required="required" value="{{ $calonsiswa->pkrj_ortu }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Penghasilan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="gaji_ortu" required="required" value="{{ $calonsiswa->gaji_ortu }}">
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
                                <input type="text" class="form-control text-capitalize" name="sklh_asal" required="required" value="{{ $calonsiswa->sklh_asal }}">
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
                                <input type="text" class="form-control" name="email" required="required" value="{{ $calonsiswa->user->email }}">
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">Password Baru</label>
                            <div class="col-xs-5">
                                <input id="password" type="password" class="form-control password" name="password" readonly="readonly">
                            </div>
                            <div class="col-md-3 row">
                                <button id="new_password" type="button" class="btn btn-default btn-flat" value="0">Password Baru</button>
                            </div>
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
                    <a href="{{ route('indexPendaftaranAdmin') }}" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>Kembali</a>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success btn-flat pull-right"><i class="fa fa-save"></i>   Simpan</button>
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


    {{-- Setting Form Validation Pendaftaran --}}
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
                },
                confirmPassword: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'Password yang anda masukkan berbeda. Silahkan cek kembali'
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

        $('body').on('click','#new_password', function(){
            if (this.value == 0) {
                $('#password').attr('readonly', false);    
                $('#password').val('');   
                this.value = 1;
            } else {
                this.value = 0;
                $('#password').val('');   
                $('#password').attr('readonly', true);    
            }
            
        });
    });
    </script>
@endpush
