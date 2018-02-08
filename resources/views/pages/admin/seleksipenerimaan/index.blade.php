@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Seleksi Penerimaan') }}
@endsection
@section('main-content')
{{-- <div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="row">
                <form action="{{ route('postIndexTesSeleksiAkademikAdmin') }}" method="POST">
                        {{ csrf_field() }}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select id="ajaxTahunAjaran" class="form-control text-capitalize" name="id_th_ajaran">
                                    <option value="">Pilihan</option>
                                @foreach($tahunajarans as $ta)
                                    <option value="{{ $ta->id_th_ajaran }}">{{  $ta->th_ajaran}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Jadwal Pendaftaran</label>
                        <select id="ajaxJadwalPendaftaran" class="form-control text-capitalize" name="id_jadwal" disabled="disabled">
                            <option value="0" disabled selected>Pilihan</option>
                            <option value="0">Semua</option>
                            
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-default btn-flat btn-block">Lihat</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title text-capitalize">Seleksi Penerimaan Siswa - Tahun Ajaran : {{ $jadwal->tahunAjaran->th_ajaran }} - {{ $jadwal->nm_jadwal }}
                </div>
            </div>
            <div class="box-body">                
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Belum di Terima</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Sudah di Terima</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
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
                            <form action="{{ route('postPenerimaanAdmin') }}" method="POST">
                            {{ csrf_field() }}
                            <table class="table table-hover table-bordered table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="col-md-2">No. Pendaftaran</th>
                                        <th class="col-md-2">Nama Lengkap</th>
                                        <th class="col-md-2">Kode Jurusan</th>
                                        <th class="col-md-2 text-center">Status</th>
                                        <th class="col-md-3 text-center">Pilih Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($backdatas)
                                    @foreach($belum_diterima as $no => $calonsiswa)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>
                                            {{ $calonsiswa->no_pendf }}
                                            <input type="hidden" name="data[{{$no}}][no_pendf]" value="{{ $calonsiswa->no_pendf }}">
                                        </td>
                                        <td class="text-capitalize">{{ $calonsiswa->nm_cln_siswa }}</td>
                                        <td class="text-capitalize">{{ $calonsiswa->jurusan->kd_jurusan }}</td>
                                        <td>
                                            <select id="status_penerimaan_{{ $no }}" class="form-control input-sm penerimaan" name="data[{{$no}}][status_penerimaan]">
                                                @if($calonsiswa->status_penerimaan == "diterima")
                                                    <option value="diterima" selected="selected">Diterima</option>
                                                    <option value="tidak diterima">Tidak Diterima</option>
                                                @else
                                                    <option value="diterima">Diterima</option>
                                                    <option value="tidak diterima" selected="selected">Tidak Diterima</option>
                                                @endif

                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control pilihankelas" name="data[{{$no}}][kd_kelas]">
                                                @foreach($calonsiswa->pilihanKelas($backdatas['id_th_ajaran'][$no],$backdatas['kd_jurusan'][$no]) as $kelas)
                                                <option value="{{ $kelas->kd_kelas }}">{{ $kelas->nm_kelas }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default btn-flat pull-right"><i class="fa fa-save"></i>   Simpan</button>
                                </div>
                            </div>
                            </form>
                            {{-- {{ $belum_input_nilais->links() }} --}}
                        </div>
                        <div class="tab-pane" id="tab_2">
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
                            <form action="{{ route('postPenerimaanAdmin') }}" method="POST">
                            {{ csrf_field() }}
                            <table class="table table-hover table-bordered table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="col-md-2">No. Pendaftaran</th>
                                        <th class="col-md-2">Nama Lengkap</th>
                                        <th class="col-md-2">Kode Jurusan</th>
                                        <th class="col-md-2 text-center">Status</th>
                                        <th class="col-md-3 text-center">Pilih Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sudah_diterima as $no => $calonsiswa)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>
                                            {{ $calonsiswa->no_pendf }}
                                            <input type="hidden" name="data[{{$no}}][no_pendf]" value="{{ $calonsiswa->no_pendf }}">
                                        </td>
                                        <td class="text-capitalize">{{ $calonsiswa->nm_cln_siswa }}</td>
                                        <td class="text-capitalize">{{ $calonsiswa->jurusan->kd_jurusan }}</td>
                                        <td>
                                            <select id="status_penerimaan_{{ $no }}" class="form-control input-sm penerimaan" name="data[{{$no}}][status_penerimaan]">
                                                @if($calonsiswa->status_penerimaan == "diterima")
                                                    <option value="diterima" selected="selected">Diterima</option>
                                                    <option value="tidak diterima">Tidak Diterima</option>
                                                @else
                                                    <option value="diterima">Diterima</option>
                                                    <option value="tidak diterima" selected="selected">Tidak Diterima</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            {{ $calonsiswa->kelas->nm_kelas }}
                                            <input type="hidden" name="data[{{$no}}][kd_kelas]" value="{{ $calonsiswa->kd_kelas }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default pull-right btn-flat"><i class="fa fa-save"></i>   Simpan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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

