@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Data Jurusan dan Kelas') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>
</div>

{{-- Jurusan --}}
<div class="row">
    <div class="col-md-10">
    	<div class="box">
    		<div class="box-header">
    			<div class="box-title">Data Jurusan</div>
    		</div>
    		<div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kode Jurusan</th>
                            <th class="text-center">Nama Jurusan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jurusans as $no=>$jurusan)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td class="text-uppercase">{{ $jurusan->kd_jurusan }}</td>
                            <td class="text-capitalize">{{ $jurusan->nm_jurusan }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    {{-- <a href="" class="btn btn-default btn-sm btn-flat"><i class="fa fa-folder-open"></i></a> --}}
                                    <button type="button" class="btn btn-primary btn-sm btn-flat btnedit_jurusan" data-toggle="modal" data-target="#modalEditJurusan"><i class="fa fa-edit"></i></button>
                                    {{-- <a href="{{ route('deleteJurusanAdmin', $jurusan->kd_jurusan) }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a> --}}
                                    <button value="{{ $jurusan->kd_jurusan }}" class="btn btn-danger btn-flat btn-sm btn_delete_jurusan" data-toggle="modal" data-target="#modalDeleteJurusan">
                                    <i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    			<button class="btn btn-app btn-flat" data-toggle="modal" data-target="#modalAddJurusan">
					<i class="fa fa-plus"></i> Tambah Jurusan
				</button>
    		</div>
    	</div>
    </div>
</div>

{{-- Kelas --}}
<div class="row">
    <div class="col-md-10">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Data Kelas @isset($tahunajaran) - Tahun Ajaran : {{ $tahunajaran->th_ajaran }} @endisset</div>
            </div>
            <div class="box-body">
                <form action="{{ route('postIndexJurusanKelasAdmin') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <div class="input-group margin">
                            <select name="id_th_ajaran" class="form-control" required="required">
                                <optgroup label="Default">
                                @isset($tahunajaran)
                                    <option value="{{ $tahunajaran->id_th_ajaran }}" selected="selected">{{ $tahunajaran->th_ajaran }} - {{ $tahunajaran->kelas->count() }} Kelas</option>
                                @endisset
                                </optgroup>
                                @foreach($tahunajarans as $tahunajaran)
                                    <option value="{{ $tahunajaran->id_th_ajaran }}">{{ $tahunajaran->th_ajaran }} - {{ $tahunajaran->kelas->count() }} Kelas</option>
                                @endforeach
                            </select>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info btn-flat">Lihat</button>
                            </span>
                        </div>
                    </div>
                </div>
                </form>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kode Kelas</th>
                            <th class="text-center">Nama Jurusan</th>
                            <th class="text-center">Nama Kelas</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($kelas->isEmpty())
                        <tr>
                            <td colspan="5"><h5 class="text-center">Maaf, Data Kelas Tahun Ajaran {{ $tahunajaran->th_ajaran }} kosong</h5></td>
                        </tr>
                        @else
                        @foreach($kelas as $no=>$kls)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td class="text-uppercase">{{ $kls->kd_kelas }}</td>
                            <td class="text-capitalize">{{ $kls->kd_jurusan }}</td>
                            <td class="text-capitalize">{{ $kls->nm_kelas }} - ({{ $kls->siswa->count() }} Siswa)</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('indexKelasAdmin', $kls->kd_kelas) }}" class="btn btn-default btn-sm btn-flat"><i class="fa fa-folder-open"></i></a>
                                    <button type="button" class="btn btn-primary btn-sm btn-flat btnedit_kelas" data-toggle="modal" data-target="#modalEditKelas"><i class="fa fa-edit"></i></button>
                                    {{-- <a href="{{ route('deleteKelasAdmin', $kls->kd_kelas) }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a> --}}
                                    <button value="{{ $kls->kd_kelas }}" class="btn btn-danger btn-flat btn-sm btn_delete_kelas" data-toggle="modal" data-target="#modalDeleteKelas">
                                    <i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
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
                <button class="btn btn-app btn-flat" data-toggle="modal" data-target="#modalAddKelas">
                    <i class="fa fa-plus"></i> Tambah Kelas
                </button>
            </div>
        </div>
    </div>
</div>




{{-- Modal Dialog Add Jurusan --}}
<div id="modalAddJurusan" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('postAddJurusanAdmin') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Tambah Tahun Ajaran</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input type="text" name="kd_jurusan" class="form-control" placeholder="ex: TKJ" required="required">
                </div>
                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input type="text" name="nm_jurusan" class="form-control" placeholder="ex: Teknik Komputer Jaringan" required="required">
                </div>
                {{-- <div class="form-group">
                    <label>Daya Tampung</label>
                    <input type="text" name="daya_tampung" class="form-control" placeholder="ex: 100" required="required">
                </div> --}}
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
{{-- Modal Dialog Edit Jurusan --}}
<div id="modalEditJurusan" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('postUpdateJurusanAdmin') }}" method="POST">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Ubah Jurusan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input id="inp_kd_jurusan" name="kd_jurusan"  type="text" class="form-control" placeholder="ex: TKJ" required="required" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input id="inp_nm_jurusan" type="text" name="nm_jurusan" class="form-control" placeholder="ex: Teknik Komputer Jaringan" required="required">
                </div>
                {{-- <div class="form-group">
                    <label>Daya Tampung</label>
                    <input id="inp_daya_tampung" type="text" name="daya_tampung" class="form-control" placeholder="ex: 100" required="required">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>   Simpan</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- Modal Dialog Add Kelas --}}
<div id="modalAddKelas" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('postAddKelasAdmin') }}" method="POST">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Ubah Kelas</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pilih Jurusan</label>
                    <select class="form-control" name="kd_jurusan">
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->kd_jurusan }}">{{ $jurusan->nm_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Kelas</label>
                    <input type="text" name="kd_kelas" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" name="nm_kelas" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select name="id_th_ajaran" class="form-control" required="required">
                        @foreach($tahunajarans as $tahunajaran)
                            <option value="{{ $tahunajaran->id_th_ajaran }}">{{ $tahunajaran->th_ajaran }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>   Simpan</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- Modal Dialog Edit Kelas --}}
<div id="modalEditKelas" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('postUpdateKelasAdmin') }}" method="POST">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Ubah Kelas</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pilih Jurusan</label>
                    <select id="inp_kd_jurusan_kls" class="form-control" name="kd_jurusan">
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->kd_jurusan }}">{{ $jurusan->kd_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Kelas</label>
                    <input id="inp_kd_kelas" type="text" name="kd_kelas" class="form-control" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input id="inp_nm_kelas" type="text" name="nm_kelas" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>   Simpan</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


{{-- Modal Dialog Hapus Jurusan --}}
<div id="modalDeleteJurusan" class="modal modal-danger fade">
    <div class="modal-dialog">
        <form action="{{ route('postDeleteJurusanAdmin') }}" method="POST">
        {{ csrf_field() }}
        <input id="kd_jurusan_delete" type="hidden" name="kd_jurusan">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Hapus Jurusan</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin menghapus data jurusan ini?</p>
                <p>Jika data jurusan dihapus maka data kelas beserta siswa yang ada pada jurusan ini juga terhapus</p>
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

{{-- Modal Dialog Hapus Kelas --}}
<div id="modalDeleteKelas" class="modal modal-danger fade">
    <div class="modal-dialog">
        <form action="{{ route('postDeleteKelasAdmin') }}" method="POST">
        {{ csrf_field() }}
        <input id="kd_kelas_delete" type="hidden" name="kd_kelas">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Hapus Kelas</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin menghapus data kelas ini?</p>
                <p>Jika data kelas dihapus maka data siswa yang ada pada kelas ini juga terhapus</p>
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
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    
    {{-- Edit Jurusan Table Modal Bootstrap --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("body").on("click",".btnedit_jurusan", function(){
                vall = $(this).closest('tr').find('td');
                $("#inp_kd_jurusan").val(vall[1].textContent);
                $("#inp_nm_jurusan").val(vall[2].textContent);
                $("#inp_daya_tampung").val(vall[3].textContent);
            });
        });
    </script>

    {{-- Edit Kelas Table Modal Bootstrap --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("body").on("click",".btnedit_kelas", function(){
                vall = $(this).closest('tr').find('td');
                option_html = '<option value="' + vall[2].textContent + '" selected>' + vall[2].textContent + '</option>';
                $("#inp_kd_jurusan_kls").append(option_html);
                $("#inp_kd_kelas").val(vall[1].textContent);
                $("#inp_nm_kelas").val(vall[3].textContent);
            });
        });
    </script>

    {{-- Hapus Kelas dan Jurusan untuk Modal --}}
    <script type="text/javascript">
        $('body').on('click','.btn_delete_jurusan', function(){
            // console.log(this.value);
            $('#kd_jurusan_delete').val(this.value);
        });
        $('body').on('click','.btn_delete_kelas', function(){
            // console.log(this.value);
            $('#kd_kelas_delete').val(this.value);
        });
    </script>
@endpush
