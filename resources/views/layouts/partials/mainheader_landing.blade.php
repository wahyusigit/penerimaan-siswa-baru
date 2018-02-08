<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('indexHomepage') }}" class="navbar-brand"><b>PSB</b>SMK</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('pendaftaranHomepage') }}"><i class="fa fa-user-circle-o"></i>    Pendaftaran </a></li>
            <li><a href="{{ route('panduanPendaftaranHomepage') }}"><i class="fa fa-map-o"></i>   Panduan Pendaftaran</a></li>
            <li><a href="{{ route('jadwalHomepage') }}"><i class="fa fa-calendar"></i>   Informasi & Jadwal </a></li>
            
            
          </ul>
          
        </div>
        <div class="navbar-custom-menu">
          <div class="nav navbar-nav">
            @guest
              <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Masuk </a></li>
            @endguest
            @auth
              @if (Auth::user()->hasRole('siswa'))
                  <li><a href="{{ route('login') }}"><i class="fa fa-tachometer"></i> Dashboard </a></li>
              @elseif(Auth::user()->hasRole('admin'))
                  <li><a href="{{ route('login') }}"><i class="fa fa-tachometer"></i> Dashboard </a></li>
              @else
                  <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout </a></li>
              @endif
            @endauth
            <ul>
              
              
            </ul>
          </div>
        </div>
        <!-- /.navbar-collapse -->
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
</header>