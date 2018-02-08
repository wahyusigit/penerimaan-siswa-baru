@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Jadwal Pendaftaran') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
    	<div class="box">
    		<div class="box-header with-border">
    			<div class="box-title"><i class="fa fa-calendar"></i>  Jadwal Pendaftaran</div>
                <div class="box-tools pull-right">
                    <a href="{{ route('addJadwalAdmin') }}" type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-plus"></i>Tambah Jadwal</a>
                </div>
    		</div>
    		<div class="box-body">
    			<table class="table table-bordered table-hover">
    				<thead>
                        <tr>
                        	<th>No</th>
                            <th class="text-capitalize">Nama Jadwal</th>
                            <th class="text-center">Tahun<br>Ajaran</th>
                            <th class="text-center">Tanggal<br>Pendaftaran</th>
                            <th class="text-center">Tanggal<br>Tes Seleksi Akademik</th>
                            <th class="text-center">Pengumuman<br>Hasil Seleksi</th>
                            <th class="text-center">Siswa<br>Terdaftar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
		    		<tbody>
                        @if($jadwals->isEmpty())
                            <tr>
                                <td colspan="8"><h4 class="text-center">Maaf, Data Jadwal Kosong</h4></td>
                            </tr>
                        @else
                        @foreach($jadwals as $jadwal)
                        <tr>
                        	<td class="text-center">{{ (($jadwals->currentPage() - 1 ) * $jadwals->perPage() ) + $loop->iteration }}</td>
                            <td class="text-capitalize">{{ $jadwal->nm_jadwal }}</td>
                            <td class="text-center">{{ $jadwal->tahunAjaran->th_ajaran }}</td>
                            <td class="text-center">{{ date_format(date_create($jadwal->tgl_mulai_pendf),"d-m-Y") }} s.d {{ date_format(date_create($jadwal->tgl_akhir_pendf),"d-m-Y") }}</td>
                            <td class="text-center">{{ date_format(date_create($jadwal->tgl_mulai_tes),"d-m-Y") }} s.d {{ date_format(date_create($jadwal->tgl_akhir_tes),"d-m-Y") }}</td>
                            <td class="text-center">{{ date_format(date_create($jadwal->tgl_hasil_seleksi),"d-m-Y") }}</td>
                            <td class="text-center">{{ $jadwal->calonSiswa->count() }}</td>
                            <td class="text-center">
                                <a href="{{ route('detailJadwalAdmin', $jadwal->id_jadwal) }}" class="btn btn-default btn-flat btn-sm"><i class="fa fa-folder-open"></i></a>
                                <a href="{{ route('editJadwalAdmin', $jadwal->id_jadwal) }}" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                <button value="{{ $jadwal->id_jadwal }}" class="btn btn-danger btn-flat btn-sm btn_delete" data-toggle="modal" data-target="#modalDeleteJadwal">
                                    <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
		    	</table>
		    	{{ $jadwals->links() }}
    		</div>
    		<div class="box-footer"></div>
    	</div>
    	
    </div>
</div>


{{-- Modal Dialog Hapus Jadwal --}}
<div id="modalDeleteJadwal" class="modal modal-danger fade">
    <div class="modal-dialog">
        <form action="{{ route('postDeleteJadwalAdmin') }}" method="POST">
        {{ csrf_field() }}
        <input id="id_jadwal_delete" type="hidden" name="id_jadwal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Hapus Jadwal Pendaftaran</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin menghapus data penjadwalan ini?</p>
                <p>Jika data penjadwalan dihapus maka data pendaftaran yang terdaftar pada penjadwalan juga terhapus</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-trash"></i>   Hapus</button>
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
    $('body').on('click','.btn_delete', function(){
        // console.log(this.value);
        $('#id_jadwal_delete').val(this.value);
    });
</script>
@endpush