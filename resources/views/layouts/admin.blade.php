<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar_admin')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        {{-- @include('layouts.partials.contentheader') --}}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid spark-screen">
                <!-- Your Page Content Here -->
                <div id="flashmessage" class="row">
                    <div class="col-md-12">
                        @include('flash::message')
                    </div>
                </div>
                @yield('main-content')
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>
