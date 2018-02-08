@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Data Tahun Ajaran') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <!-- Trigger the modal with a button -->
    <div class="col-md-10">
    	{{-- <div class="box">
    		<div class="box-header with-border">
    			<div class="box-title"><i class="fa fa-search"></i>  Pencarian</div>
    		</div>
    		<div class="box-body">
    			<form class="form-horizontal" action="{{ route('') }}">
    				<div class="col-md-5">
    					<div class="form-group">
	    					<label class="control-label col-md-5">Tahun Ajaran</label>
	    					<div class="col-md-7">
	    						<select class="form-control" name="id_tahun_ajaran">
                                    @foreach($tahunajarans as $tahunajaran)
                                    <option value="{{ $tahunajaran->id_tahun_ajaran }}">{{ $tahunajaran->tahun_ajaran }}</option>
                                    @endforeach
	    						</select>
	    					</div>
	    				</div>
    				</div>
    				<div class="col-md-5">
    					<div class="form-group">
	    					<label class="control-label col-md-5">Status</label>
	    					<div class="col-md-7">
	    						<select class="form-control">
	    							<option value="2016/2017">Diterima</option>
	    							<option value="2016/2017">Tidak Diterima</option>
	    						</select>
	    					</div>
	    				</div>
    				</div>
    				<div class="col-md-2">
    					<div class="form-group">
	    					<button class="btn btn-default btn-flat"><i class="fa fa-search"></i>  Tampilkan</button>
	    				</div>
    				</div>
    			</form>
    		</div>
    	</div> --}}
    	<div class="box">
    		<div class="box-header">
    			<div class="box-title">Data Tahun Ajaran</div>
    		</div>
    		<div class="box-body">
    			<table class="table table-bordered table-hover">
    				<thead>
    					<tr>
    						<th class="text-center">No</th>
    						<th class="col-md-5 text-center">Tahun Ajaran</th>
    						<th class="col-md-4 text-center">Jadwal<br>Pendaftaran</th>
    						<th class="col-md-1 text-center">Jumlah<br>Pendaftar</th>
                            <th class="col-md-1 text-center">Jumlah<br>Diterima</th>
                            <th class="text-center">Action</th>
    					</tr>
    				</thead>
    				<tbody>
                        @foreach($tahunajarans as $tahunajaran)
    					<tr>
    						<td class="text-center">{{ (($tahunajarans->currentPage() - 1 ) * $tahunajarans->perPage() ) + $loop->iteration }}</td>
    						<td class="text-center">{{ $tahunajaran->tahun_ajaran }}</td>
    						<td>
                                @if($tahunajaran->jadwalPendaftaran->count() > 0)
                                    @foreach($tahunajaran->jadwalPendaftaran as $no => $jadwalpendaftaran)
                                        <span class="text-capitalize">{{ $no+1 }}. {{ $jadwalpendaftaran->nama_jadwal_pendf }}</span>
                                        <br>
                                    @endforeach
                                @else
                                -
                                @endif
                            </td>
    						<td class="text-center">
                                @if($tahunajaran->jadwalPendaftaran->count() > 0)
                                    @foreach($tahunajaran->jadwalPendaftaran as $no => $jadwalpendaftaran)
                                        {{ $jadwalpendaftaran->pendaftaran->count() }}
                                        <br>
                                    @endforeach
                                @else
                                -
                                @endif
                            </td>
                            <td class="text-center">
                                @if($tahunajaran->jadwalPendaftaran->count() > 0)
                                    @foreach($tahunajaran->jadwalPendaftaran as $no => $jadwalpendaftaran)
                                        {{ $jadwalpendaftaran->pendaftaran->where('status_diterima','diterima')->count() }}
                                        <br>
                                    @endforeach
                                @else
                                -
                                @endif
                            </td>
                            <td><a href="{{ route('deleteTahunAjaranAdmin', $tahunajaran->id_tahun_ajaran) }}" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a></td>
    					</tr>
                        @endforeach
    				</tbody>
    			</table>
                {{ $tahunajarans->links() }}
    		</div>
    		<div class="box-footer">
    			
    		</div>
    	</div>
    </div>
    <div class="col-md-2">
    	<div class="box">
    		<div class="box-header with-border">
    			<div class="box-title"><i class="fa fa-bars"></i>  Control Panel</div>
    		</div>
    		<div class="box-body">
    			<button class="btn btn-app btn-flat" data-toggle="modal" data-target="#modalAdd">
					<i class="fa fa-plus"></i> Tambah Tahun Ajaran
				</button>
    		</div>
    	</div>
    </div>
</div>




{{-- Modal Dialog Add --}}
<div id="modalAdd" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('postAddTahunAjaranAdmin') }}" method="POST">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Tambah Tahun Ajaran</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control" placeholder="ex: 2017/2018">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>   Tambah</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection


@push('script')
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        
    </script>
@endpush
