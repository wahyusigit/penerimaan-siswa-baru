<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Selamat Datang - Panitia</li>
            <!-- Optionally, you can add icons to the links -->

            <!-- Baru -->
            {{-- <li><a href="{{ route('indexAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Home</span></a></li> --}}
            <li class="{{ Request::is('admin/profile*') ? 'active' : '' }}"><a href="{{ route('indexProfileAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Home</span></a></li>
            <li class="{{ Request::is('admin/jurusankelas*') ? 'active' : '' }}"><a href="{{ route('indexJurusanKelasAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Jurusan & Kelas</span></a></li>
            <li class="{{ Request::is('admin/jadwal*') ? 'active' : '' }}"><a href="{{ route('indexJadwalAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Jadwal</span></a></li>
            <li class="{{ Request::is('admin/pendaftaran*') ? 'active' : '' }}"><a href="{{ route('indexPendaftaranAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Pendaftaran</span></a></li>
            <li class="{{ Request::is('admin/pembayaran*') ? 'active' : '' }}"><a href="{{ route('indexPembayaranAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Pembayaran</span></a></li>

            {{-- Tambah Menu Tes Seleksi --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa fa-circle-thin"></i> <span>Tes Seleksi</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('indexSoalAdmin') }}"><i class="fa fa-circle-o"></i> Soal</a></li>
                    <li class=""><a href="{{ route('indexTesSeleksiAkademikAdmin') }}"><i class='fa fa-circle-o'></i> <span>Tes Seleksi</span></a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/seleksipenerimaan*') ? 'active' : '' }}"><a href="{{ route('indexSeleksiPenerimaanAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Seleksi Penerimaan</span></a></li>
            <li class="{{ Request::is('admin/siswa*') ? 'active' : '' }}"><a href="{{ route('indexSiswaAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Siswa</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
