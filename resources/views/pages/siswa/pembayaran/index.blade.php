@extends('layouts.siswa')
@section('main-content')


@if(is_null($pembayaran))
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-danger">
            <h4>Anda belum melakukan Konfirmasi Pembayaran</h4>
            <p>Calon Siswa melakukan pembayaran sebesar Rp. 100.000,- melalui Transfer Bank ke Rekening BCA a.n. WAHYU SIGIT - 0918298129 Paling Lambat 2 x 24Jam setelah Calon Siswa melakukan Registrasi / Pendaftaran.</p>
        </div>
    </div>
    <form id="formKonfirmasiPembayaran" class="form-horizontal" action="{{ route('konfirmasiPembayaranSiswa') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Konfirmasi Pembayaran</div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">No. Pembayaran</label>
                        <div class="col-md-4">
                            <input type="text" name="no_pemb" class="form-control" value="{{ $no_pemb }}" readonly="" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">No. Pendaftaran</label>
                        <div class="col-md-4">
                            <input type="text" name="no_pendf" class="form-control" value="{{ Auth::user()->calonsiswa->no_pendf }}" readonly="" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Bank</label>
                        <div class="col-md-7">
                            <input type="text" name="nm_bank" class="form-control text-uppercase" value="" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Pemilik Rek</label>
                        <div class="col-md-8">
                            <input type="text" name="nm_pemilik_rek" class="form-control text-capitalize" value="" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">No. Rekening</label>
                        <div class="col-md-6">
                            <input type="number" name="no_rek" class="form-control" value="" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Cabang Bank</label>
                        <div class="col-md-5">
                            <input type="text" name="cbg_bank" class="form-control text-capitalize" value="" required="required">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>   Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@else

<div class="row">
    <div class="col-md-12">
    @isset($message_header)
    <div class="callout callout-success">
        <h4>{{ $message_header }}</h4>
        <p>{{ $message_content }}</p>
    </div>
    @endisset
    </div>
</div>
<div class="row">
    <div class="col-md-11">
        <div class="callout callout-info">
            <h4>Cetak Bukti Pembayaran</h4>
            <p>Jika dalam waktu 2x24 jam Panitia belum dapat Verifikasi dari Panitia silahkan datang ke Sekolah dengan membawa Cetak Bukti Pembayaran Regristrasi</p>
        </div>
    </div>
    <div class="col-md-1">
        <a href="{{ route('printBukti',['jenis'=>'pembayaran','id'=> Auth::user()->calonsiswa->pembayaran->no_pemb ]) }}" target="_blank" class="btn btn-app pull-right" style="height: 80px">
            <i class="fa fa-print"></i>   Cetak Bukti<br>Pendaftaran
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @if($form === true)
        <form id="formKonfirmasiPembayaran" class="form-horizontal" action="{{ route('konfirmasiPembayaranSiswa') }}" method="POST">
        {{ csrf_field() }}
        <div class="box">
            <div class="box-header">
                <div class="box-title">Konfirmasi Pembayaran</div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-4 control-label">No. Pendaftaran</label>
                    <div class="col-md-4">
                        <input type="text" name="no_pendf" class="form-control" value="{{ Auth::user()->calonsiswa->no_pendf }}" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">No. Pembayaran</label>
                    <div class="col-md-4">
                        <input type="text" name="no_pemb" class="form-control" value="{{ $no_pemb }}" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Nama Bank</label>
                    <div class="col-md-7">
                        <input type="text" name="nm_bank" class="form-control edit text-uppercase" value="{{ $pembayaran->nm_bank }}" readonly="readonly"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Nama Pemilik Rek</label>
                    <div class="col-md-8">
                        <input type="text" name="nm_pemilik_rek" class="form-control edit text-capitalize" value="{{ $pembayaran->nm_pemilik_rek }}" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">No. Rekening</label>
                    <div class="col-md-6">
                        <input type="number" name="no_rek" class="form-control edit" value="{{ $pembayaran->no_rek }}" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Cabang Bank</label>
                    <div class="col-md-5">
                        <input type="text" name="cbg_bank" class="form-control edit text-capitalize" value="{{ $pembayaran->cbg_bank }}" readonly="readonly">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button id="btnubah" type="button" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i>   Ubah</button>
                </div>
            </div>
        </div>
        </form>
        @endif
    </div>
</div>
@endif

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
@endpush

@push('script')
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        $(".datepicker3").datepicker({
            autoclose : true,
            format: 'dd-mm-yyyy',
        });
    </script>
    <script type="text/javascript">
        $('body').on('click','#btnubah', function(){
            $('.edit').attr('readonly',false);
            $('#btnubah').replaceWith('<button type="submit" class="btn btn-default btn-flat"><i class="fa fa-save"></i>   Simpan</button>');
        });
    </script>

    {{-- Setting Form Validation Pendaftaran --}}
    <script type="text/javascript">
    $(document).ready(function() {
        $('#formKonfirmasiPembayaran').bootstrapValidator({
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
                nm_bank: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Bank tidak boleh kosong'
                        },
                        stringLength: {
                            min: 2,
                            max: 12,
                            message: 'Nama Bank tidak boleh kurang dari 2 huruf dan lebih dari 12 huruf'
                        },
                        // regexp: {
                        //     regexp: /^[a-zA-Z0-9_\.]+$/,
                        //     message: 'The username can only consist of alphabetical, number, dot and underscore'
                        // }
                    }
                },
                nm_pemilik_rek: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Pemilik Rekening tidak boleh kosong'
                        },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Nama Pemilik Rekening tidak boleh kurang dari 2 huruf dan lebih dari 20 huruf'
                        },
                        // regexp: {
                        //     regexp: /^[a-zA-Z0-9_\.]+$/,
                        //     message: 'The username can only consist of alphabetical, number, dot and underscore'
                        // }
                    }
                },
                no_rek: {
                    validators: {
                        notEmpty: {
                            message: 'No. Rekening tidak boleh kosong'
                        },
                        stringLength: {
                            min: 5,
                            max: 15,
                            message: 'No. Rekening tidak boleh kurang dari 5 huruf dan lebih dari 15 huruf'
                        }
                    }
                },
                cbg_bank: {
                    validators: {
                        notEmpty: {
                            message: 'Cabang Bank tidak boleh kosong'
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

    {{-- Cetak Bukti Pembayaran --}}
    {{-- <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '#cetak_bukti', function(){
            $.ajax({
                url : '{{ route('ajaxPrint') }}',
                method : 'POST',
                dataType: 'html',
                data : {type : 'pembayaran'},
                success : function(response){
                    console.log(response);
                    printDiv('print');
                }
            });
        });

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script> --}}
@endpush
