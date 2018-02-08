@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Data Pendaftaran') }}
@endsection
@section('main-content')
{{-- <div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="row">
                <form action="{{ route('postIndexPendaftaranAdmin') }}" method="POST">
                        {{ csrf_field() }}
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control text-capitalize" name="id_jadwal">
                                @foreach($jadwals as $jdw)
                                    <option value="{{ $jdw->id_jadwal }}">{{  $jdw->nama_jadwal_pendf}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control text-capitalize" name="type">
                            <option value="0">Semua</option>
                            <optgroup label="Registrasi">
                                <option value="1">Sudah Bayar - Registrasi</option>
                                <option value="2">Belum Bayar - Registrasi</option>    
                            </optgroup>
                            <optgroup label="Daftar Ulang">
                                <option value="3">Sudah Bayar - Daftar Ulang</option>
                                <option value="4">Belum Bayar - Daftar Ulang</option>    
                            </optgroup>
                            <optgroup label="Penerimaan">
                                <option value="5">Diterima</option>
                                <option value="6">Tidak Diterima</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-flat btn-block">Lihat</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="row">
                {{-- <form action="{{ route('indexPendaftaranAdmin') }}" method="GET"> --}}
                        {{-- {{ csrf_field() }} --}}    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select id="ajaxTahunAjaran" class="form-control text-capitalize" name="id_tahun_ajaran">
                                @isset($jadwal)
                                    <optgroup label="Default">
                                        <option value="{{ $jadwal->tahunAjaran->id_th_ajaran }}" selected="selected">{{ $jadwal->tahunAjaran->th_ajaran }}</option>
                                    </optgroup>
                                @endisset
                                    
                                <optgroup label="Pilihan">
                                    @foreach($tahunajarans as $ta)
                                        <option value="{{ $ta->id_th_ajaran }}" selected="selected">{{ $ta->th_ajaran}} - 
                                                            {{ $ta->jadwal->count() }} jadwal
                                                          
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Jadwal Pendaftaran</label>
                        <select id="ajaxJadwalPendaftaran" class="form-control text-capitalize" name="id_jadwal" disabled="disabled">
                            <option value="0" disabled selected>Pilihan</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label></label>
                            <a id="linkIndex" href="" class="btn btn-default btn-flat btn-block">Lihat</a>
                        </div>
                    </div>
                {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title text-capitalize"><i class="fa fa-calendar"></i>  Data Calon Siswa - {{ $jadwal->nm_jadwal }} ({{ $jadwal->tahunAjaran->th_ajaran }})
                    <span class="pull-right col-md-3">
                        <form action="{{ route('postSearchPendaftaranAdmin', $jadwal->id_jadwal) }}" method="POST">
                            {{ csrf_field() }}
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="q">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info btn-flat">Cari</button>
                            </span>
                        </div>
                        </form>
                    </span>
                </div>
            </div>
            <div class="box-body">
                @isset($search_result)
                <div class="col-md-12">
                    <h4>Hasil pencarian untuk kata "{{ $search_result }}" :</h4>
                    <hr>
                </div>               
                @endisset 
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center col-md-1">No Pendaftaran</th>
                            <th class="text-center col-md-2">Nama Lengkap</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center col-md-3">Pilihan Jurusan</th>
                            <th class="text-center col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        @if($calonsiswas->isEmpty())
                        <tr><td colspan="6"><h5 class="text-center">Maaf, Data Tidak Ditemukan (Kosong)</h5></td></tr>
                        @else
                        @foreach($calonsiswas as $no => $calonsiswa)
                        <tr>
                            <td class="text-center">{{ (($calonsiswas->currentPage() - 1 ) * $calonsiswas->perPage() ) + $loop->iteration }}</td>
                            <td class="text-capitalize">{{ $calonsiswa->no_pendf }}</td>
                            <td class="text-capitalize">{{ $calonsiswa->nm_cln_siswa }}</td>
                            <td class="text-capitalize">{{ $calonsiswa->alamat }}</td>
                            <td class="text-capitalize">{{ $calonsiswa->jurusan->nm_jurusan }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('detailPendaftaranAdmin', $calonsiswa->no_pendf) }}" class="btn btn-default btn-sm btn-flat"><i class="fa fa-folder-open"></i></a>
                                    <a href="{{ route('editPendaftaranAdmin', $calonsiswa->no_pendf) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('deletePendaftaranAdmin', $calonsiswa->no_pendf) }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $calonsiswas->links() }}
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>



{{-- Modal Dialog Search --}}
<div id="modalSearch" class="modal fade">
    <div class="modal-dialog">
        <form action="{{ route('postAddTahunAjaranAdmin') }}" method="POST">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Pencarian Lanjut</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control" placeholder="ex: 2017/2018">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i>   Cari</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
            id_tahun_ajaran = this.value;
            $.ajax({
                url : '{{ route('ajaxShowPendaftaranAdmin') }}',
                type : 'POST',
                data : {id_th_ajaran : id_tahun_ajaran},
                success : function(response){
                    if($.isEmptyObject(response)){
                        $('#ajaxJadwalPendaftaran').prop('disabled',true);
                        alert('Jadwal dengan Tahun Ajaran yang dipilih tidak ada');
                    } else {
                        html = "";
                        $('#ajaxJadwalPendaftaran').html(html);
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
    {{-- Untuk Lihat Tahun Ajaran dan Jadwal --}}
    <script type="text/javascript">
        $('body').on('click', '#linkIndex', function(){
            $("#linkIndex").attr("href", "{{ route('indexPendaftaranAdmin') }}" + "/" + $('#ajaxJadwalPendaftaran').val());
        });
    </script>
@endpush