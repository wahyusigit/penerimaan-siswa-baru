@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Soal Tes Seleksi') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <form action="{{ route('postAddSoalAdmin') }}" method="post">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <div class="box-title text-capitalize">Tambah Soal
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">

                        {{-- <legend>Pilih Jenis Pertanyaan (Wajib)</legend> --}}
                        <div class="form-group col-md-6">
                            <label>Jenis Pertanyaan</label>
                            <select name="id_jenis_pertanyaan" class="form-control">
                                <option value="">Pilihan</option>
                                @foreach($jenispertanyaans as $jenis)
                                    <option value="{{ $jenis->id_jenis_pertanyaan }}">{{ $jenis->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modalAddJenisPertanyaan"><i class="fa fa-plus"></i>  Tambah Jenis</button>
                    </div>
                </div>
                <hr>
                <h4>Pertanyaan:</h4>
                {{-- <textarea id="pertanyaan" name="pertanyaan"></textarea> --}}
                <textarea id="pertanyaan" name="isi_pertanyaan" class="form-control"></textarea>
                <hr>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <h4>Pilihan Jawaban:</h4>
                        </div>
                        {{-- <div class="pull-right">
                            <button type="button" class="btn btn-default btn-sm btn-flat"><i class="fa fa-plus"></i>   Tambah Pilihan Jawaban</button>
                        </div> --}}
                    </div>
                </div>
                <table class="table table-bordered table-hover table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center col-md-11">Isi Jawaban</th>
                            <th class="text-center">Benar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<5;$i++)
                        <tr>
                            <td class="text-center">{{ $i+1 }}</td>
                            <td class="text-center">
                                <input type="text" name="pilihan_jawabans[{{ $i }}]" class="form-control">
                            </td>
                            <td class="text-center">
                                <input type="radio" name="benar" value="{{ $i }}">
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                    <a href="{{ route('indexSoalAdmin') }}" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>   Kembali</a>
                </div>
                <div class="pull-right">
                    <button type="submit" class="form-control btn btn-success btn-flat"><i class="fa fa-save">    Simpan</i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>




{{-- Modal Dialog Hapus Kelas --}}
<div id="modalAddJenisPertanyaan" class="modal modal-danger fade">
    <div class="modal-dialog">
        <form action="{{ route('postAddJenisPertanyaanAdmin') }}" method="POST">
        {{ csrf_field() }}
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>Nama Jenis</label>
                    <input type="text" name="nama_jenis" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi / Petunjuk</label>
                    <textarea name="desk_jenis" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary"> Tambah</button>
                </div>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote/summernote.css') }}">
@endpush

@push('script')
    {{-- Summernote --}}
    <script src="{{ asset('plugins/summernote/summernote.js') }}"></script>
    {{-- <script src="{{ asset('plugins/summernote/summernote-ext-equation.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $('#pertanyaan').summernote({
                height: 100
            });
        });


    </script>
@endpush



