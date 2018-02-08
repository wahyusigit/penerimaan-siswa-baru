<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('indexHomepage') }}"><b>PSB SMK</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('jadwalHomepage') }}"><i class="fa fa-calendar"></i>   Informasi & Jadwal </a></li>
                <li><a href="{{ route('panduanPendaftaranHomepage') }}"><i class="fa fa-map-o"></i>   Panduan Pendaftaran</a></li>
                <li><a href="{{ route('pendaftaranHomepage') }}"><i class="fa fa-user-circle-o"></i>    Pendaftaran </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i>   {{ trans('adminlte_lang::message.login') }}</a></li>
                @endguest
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>