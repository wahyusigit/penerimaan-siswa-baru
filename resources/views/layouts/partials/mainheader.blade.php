<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('indexAdmin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PSB</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>PSB</b>SMK </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li style="margin-right: 20px"><a href="{{ route('logout') }}"><i class='fa fa-sign-out'></i> <span>Log Out</span></a></li>
            </ul>
        </div>
    </nav>
</header> 