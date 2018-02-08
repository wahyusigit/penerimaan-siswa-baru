@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Tes Seleksi') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title text-capitalize">Tes Seleksi Akademik - Tahun Ajaran : {{ $jadwal->tahunAjaran->th_ajaran }} - {{ $jadwal->nm_jadwal }}
                </div>
            </div>
            <div class="box-body">                
                <div class="row">
                    <div class="col-md-3 col-md-offset-9">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input id="search_val" type="text" class="form-control" placeholder="ex: Wahyu Sigit">
                                <span class="input-group-btn">
                                <button id="search" type="button" class="btn btn-info btn-flat">Cari</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('updateNilaiTesSeleksiAkademikAdmin') }}" method="POST">
                {{ csrf_field() }}
                <table class="table table-hover table-bordered table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="col-md-2">No. Pendaftaran</th>
                            <th class="col-md-2">Nama Lengkap</th>
                            <th class="col-md-3">Pilihan Jurusan</th>
                            <th class="col-md-2">Tanggal Tes</th>
                            <th class="col-md-1 text-center">Nilai</th>
                            <th class="col-md-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tesseleksis as $no => $data)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>
                                {{ $data->no_pendf }}
                                <input type="hidden" name="data[{{$no}}][no_pendf]" value="{{ $data->no_pendf }}">
                            </td>
                            <td class="text-capitalize">{{ $data->nm_cln_siswa }}</td>
                            <td class="text-capitalize">{{ $data->nm_jurusan }}</td>
                            <td class="text-center">
                                <input type="text" name="data[{{$no}}][tgl_tes_akad]" class="form-control input-xs datepicker3" value="{{ date_format(date_create($data->tgl_tes_akad), 'd-m-Y') }}">
                            </td>
                            <td class="text-center">
                                <input type="number" name="data[{{$no}}][nilai_tes_akad]" class="form-control input-xs" value="{{ $data->nilai_tes_seleksi }}">
                            </td>
                            <td class="text-center">
                                <select class="form-control text-capitalize" name="data[{{$no}}][sts_tes_akad]">
                                    <option selected="selected" value="{{ $data->status_kelulusan }}">{{ $data->status_kelulusan }}</option>
                                    <option value="lulus">Lulus</option>
                                    <option value="tidak lulus">Tidak Lulus</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg btn-flat pull-right"><i class="fa fa-save"></i>   Simpan</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@endsection


@push('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        $("body").on("click","#search", function(){
            $.ajax({
                url : '{{ route('ajaxSearchPendaftaranAdmin') }}',
                method : 'POST',
                data : {search : document.getElementById("search_val").value},
                success : function(response){
                    console.log(response);
                    tbl = '';
                    $.each(response, function( index, value ) {
                        console.log(value);
                        tbl += '<tr>';
                        tbl += '<td class="text-center">' + (index + 1) + '</td>'
                        tbl += '<td class="text-capitalize">' + value.no_pendf + '</td>';
                        tbl += '<td class="text-capitalize">' + value.nm_cln_siswa + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.status_pemb_pend + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.sts_tes_akademik + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.status_pemb_daf_ul + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.pil_jurusan_1 + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.pil_jurusan_2 + '</td>';
                        tbl += '<td class="text-center">';
                        tbl += '<div class="btn-group">';
                        tbl += '<a href="{{ route('detailPendaftaranAdmin') }}/' + value.no_pendf + '" class="btn btn-default btn-sm btn-flat"><i class="fa fa-folder-open"></i></a>';
                        tbl += '<a href="{{ route('editPendaftaranAdmin') }}/' + value.no_pendf + '" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i></a>';
                        tbl += '<a href="{{ route('deletePendaftaranAdmin') }}/' + value.no_pendf + '" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a>';
                        tbl += '</div>';
                        tbl += '</td>';
                        tbl += '</tr>';
                    });

                    $('#result').html(tbl);
                }
            });
        });
    </script>
    {{-- Untuk Ajax Tahun Ajaran --}}
    <script type="text/javascript">
        $('body').on('change','#ajaxTahunAjaran', function(){
            id_tahun_ajaran = this.value;
            $.ajax({
                url : '{{ route('ajaxShowPendaftaranAdmin') }}',
                type : 'POST',
                data : {id_tahun_ajaran : id_tahun_ajaran},
                success : function(response){
                    if($.isEmptyObject(response)){
                        $('#ajaxJadwalPendaftaran').prop('disabled',true);
                        console.log('kosong');
                    } else {
                        html = "";
                        $.each(response,function(i,a){
                            html += '<option value="' + a.id_jadwal_pendaftaran + '">' + a.nama_jadwal_pendf + '</option>';
                            console.log(a.id_jadwal_pendaftaran);
                            console.log(a.nama_jadwal_pendf);
                        });
                        $('#ajaxJadwalPendaftaran').append(html);
                        $('#ajaxJadwalPendaftaran').prop('disabled',false);
                        
                    }
                    // console.log(test);
                }

            });
        });
    </script>
@endpush

