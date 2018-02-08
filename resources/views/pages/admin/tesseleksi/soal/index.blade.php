@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Soal Tes Seleksi') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title text-capitalize">Soal Tes Seleksi Calon Siswa
                </div>
                <div class="box-tools pull-right">
                    <a href="{{ route('addSoalAdmin') }}" type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-plus"></i>    Tambah Soal</a>
                </div>
            </div>
            <div class="box-body">  
                <table class="table table-bordered table-hover table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="col-md-10">Pertanyaan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(is_null($soals))
                            <tr>
                                <td colspan="3">
                                    <h4 class="text-center">Tidak Ada Soal</h4>
                                </td>
                            </tr>
                        @else
                            @foreach($soals as $no=>$pertanyaan)
                            <tr>
                                <td class="text-center">{{ $no+1 }}</td>
                                <td>{{ $pertanyaan['isi_pertanyaan'] }}</td>
                                <td class="text-center">
                                    <a href="{{ route('detailSoalAdmin', $pertanyaan['id_pertanyaan']) }}" class="btn btn-default btn-flat btn-sm"><i class="fa fa-folder-open"></i></a>
                                    <a href="{{ route('editSoalAdmin', $pertanyaan['id_pertanyaan'])}}" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('deleteSoalAdmin', $pertanyaan['id_pertanyaan'])}}" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@endsection



