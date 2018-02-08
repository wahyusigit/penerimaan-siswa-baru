@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Siswa') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title text-capitalize">Siswa - Tahun Ajaran : {{ $tahunajaran->th_ajaran }}
                </div>
            </div>
            <div class="box-body">        
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{ route('postIndexSiswaAdmin') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tahun Ajaran</label>
                            <div class="input-group col-md-2">
                                <select class="form-control" name="id_th_ajaran">
                                    @foreach($tahunajarans as $t)
                                        <option value="{{ $t->id_th_ajaran }}">{{ $t->th_ajaran }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-flat">Lihat</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>        
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Pendaftaran</th>
                            <th>Nama Lengkap</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Jadwal Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($siswas->isEmpty())
                            <tr>
                                <td colspan="6">
                                    <h4 class="text-center">Tidak Ada Siswa (Kosong)</h4>
                                </td>
                            </tr>
                        @else
                            @foreach($siswas as $no => $siswa)
                                <tr>
                                    <td class="text-uppercase">{{ $no+1 }}</td>
                                    <td class="text-uppercase">{{ $siswa->no_pendf }}</td>
                                    <td class="text-uppercase">{{ $siswa->nm_cln_siswa }}</td>
                                    <td class="text-uppercase">{{ $siswa->nm_jurusan }}</td>
                                    <td class="text-uppercase">{{ $siswa->nm_kelas }}</td>
                                    <td class="text-uppercase">{{ $siswa->nm_jadwal }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
                        tbl += '<td class="text-capitalize">' + value.no_pendaftaran + '</td>';
                        tbl += '<td class="text-capitalize">' + value.nama_pendaftar + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.status_pemb_pend + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.status_tes_akademik + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.status_pemb_daf_ul + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.pil_jurusan_1 + '</td>';
                        tbl += '<td class="text-center text-capitalize">' + value.pil_jurusan_2 + '</td>';
                        tbl += '<td class="text-center">';
                        tbl += '<div class="btn-group">';
                        tbl += '<a href="{{ route('detailPendaftaranAdmin') }}/' + value.no_pendaftaran + '" class="btn btn-default btn-sm btn-flat"><i class="fa fa-folder-open"></i></a>';
                        tbl += '<a href="{{ route('editPendaftaranAdmin') }}/' + value.no_pendaftaran + '" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i></a>';
                        tbl += '<a href="{{ route('deletePendaftaranAdmin') }}/' + value.no_pendaftaran + '" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a>';
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
            id_th_ajaran = this.value;
            $.ajax({
                url : '{{ route('ajaxShowPendaftaranAdmin') }}',
                type : 'POST',
                data : {id_th_ajaran : id_th_ajaran},
                success : function(response){
                    if($.isEmptyObject(response)){
                        $('#ajaxJadwalPendaftaran').prop('disabled',true);
                        console.log('kosong');
                    } else {
                        html = "";
                        $.each(response,function(i,a){
                            html += '<option value="' + a.id_jadwal + '">' + a.nm_jadwal + '</option>';
                            console.log(a.id_jadwal);
                            console.log(a.nm_jadwal);
                        });
                        $('#ajaxJadwalPendaftaran').append(html);
                        $('#ajaxJadwalPendaftaran').prop('disabled',false);
                        
                    }
                    // console.log(test);
                }

            });
        });
    </script>
    <script type="text/javascript">
        $('body').on('change','.penerimaan', function(){
            selected_val = $("#" + this.id)[0].value;
            if (selected_val == "tidak diterima") {
                $(this).closest("tr").find(".pilihankelas").attr("disabled",true);
            } else {
                $(this).closest("tr").find(".pilihankelas").attr("disabled",false);
            }
            // console.log($(this.id + " option:selected" ).text());
        });
    </script>
@endpush

