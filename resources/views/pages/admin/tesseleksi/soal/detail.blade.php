@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Soal Tes Seleksi') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title text-capitalize">Tambah Soal
                </div>
            </div>
            <div class="box-body">  
                <h4>Pertanyaan:</h4>
                {{-- <textarea id="pertanyaan" name="pertanyaan"></textarea> --}}
                <textarea id="pertanyaan" name="isi_pertanyaan" class="form-control">{{ $soal->isi_pertanyaan }}</textarea>
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
                        @foreach($soal->pilihanJawaban as $no=>$jawaban)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td class="text-center">
                                <input type="text" class="form-control" value="{{ $jawaban->isi_jawaban }}" readonly="readonly">
                            </td>
                            <td class="text-center">
                                @if($jawaban->status_jawaban == 'salah')
                                <input type="radio" name="benar" disabled="disabled">
                                @else
                                <input type="radio" name="benar" checked="checked" disabled="disabled">
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <div class="pull-left">
                    <a href="{{ route('indexSoalAdmin') }}" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>   Kembali</a>
                </div>
                <div class="pull-right">
                    <a href="{{ route('editSoalAdmin', $soal->id_pertanyaan) }}" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i>   Ubah</a>
                </div>
            </div>
        </div>
    </div>
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
            $('#pertanyaan').summernote('disable');
        });


    </script>
@endpush



