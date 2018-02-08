@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Soal Tes Seleksi') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <form action="{{ route('updateSoalAdmin', $soal->id_pertanyaan) }}" method="post">
            {{ csrf_field() }}
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
                        @foreach($soal->pilihanJawaban as $no => $jawaban)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td class="text-center">
                                <input type="hidden" class="form-control"  name="data[{{ $no }}][id_pilihan_jawaban]" value="{{ $jawaban->id_pilihan_jawaban }}">
                                <input type="text" class="form-control"  name="data[{{ $no }}][isi_jawaban]" value="{{ $jawaban->isi_jawaban }}">
                            </td>
                            <td class="text-center">
                                @if($jawaban->status_jawaban == 'salah')
                                <input type="radio" name="benar" value="{{ $jawaban->id_pilihan_jawaban }}">
                                @else
                                <input type="radio" name="benar" checked="checked" value="{{ $jawaban->id_pilihan_jawaban }}">
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
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>   Simpan</button>
                </div>
            </div>
            </form>
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
            $('#pertanyaan').summernote({
                height: 100
            });
        });
    </script>
@endpush



