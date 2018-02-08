<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{-- @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif --}}

        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Selamat Datang - Calon Siswa</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::is('siswa/pendaftaran*') ? 'active' : '' }}"><a href="{{ route('indexPendaftaranSiswa') }}"><i class='fa fa-book'></i> <span>Data Pendaftaran</span></a></li>
            <li class="{{ Request::is('siswa/pembayaran*') ? 'active' : '' }}"><a href="{{ route('indexPembayaranSiswa') }}"><i class='fa fa-credit-card'></i> <span>Konfirmasi Pembayaran</span></a></li>
            <li class="{{ Request::is('siswa/tesseleksi*') ? 'active' : '' }}"><a href="{{ route('indexTesSeleksiAkademikSiswa') }}"><i class='fa fa-file-o'></i> <span>Tes Seleksi Akademik</span></a></li>
            <li class="{{ Request::is('siswa/hasilpenerimaan*') ? 'active' : '' }}"><a href="{{ route('indexHasilPenerimaanSiswa') }}"><i class='fa fa-check-square-o'></i> <span>Hasil Penerimaan</span></a></li>
            <li class="{{ Request::is('siswa/daftarulang*') ? 'active' : '' }}"><a href="{{ route('indexDaftarUlangSiswa') }}"><i class='fa fa-check-square-o'></i> <span>Daftar Ulang</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
