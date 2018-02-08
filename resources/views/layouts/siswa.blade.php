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
<style type="text/css">
    /*.bs-wizard {margin-top: 10px;}*/

    /*Form Wizard*/
     .bs-wizard {
        border-bottom: solid 1px #e0e0e0;
         padding: 0 0 10px 0;
    }
     .bs-wizard > .bs-wizard-step {
        padding: 0;
         position: relative;
    }
     .bs-wizard > .bs-wizard-step + .bs-wizard-step {
    }
     .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {
        color: #595959;
         font-size: 16px;
         margin-bottom: 5px;
    }
     .bs-wizard > .bs-wizard-step .bs-wizard-info {
        color: #999;
         font-size: 14px;
    }
     .bs-wizard > .bs-wizard-step > .bs-wizard-dot {
        position: absolute;
         width: 30px;
         height: 30px;
         display: block;
         background: #fbe8aa;
         top: 45px;
         left: 50%;
         margin-top: -15px;
         margin-left: -15px;
         border-radius: 50%;
    }
     .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {
        content: ' ';
         width: 14px;
         height: 14px;
         background: #fbbd19;
         border-radius: 50px;
         position: absolute;
         top: 8px;
         left: 8px;
    }
     .bs-wizard > .bs-wizard-step > .progress {
        position: relative;
         border-radius: 0px;
         height: 8px;
         box-shadow: none;
         margin: 20px 0;
    }
     .bs-wizard > .bs-wizard-step > .progress > .progress-bar {
        width:0px;
         box-shadow: none;
         background: #fbe8aa;
    }
     .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {
        width:100%;
    }
     .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {

        width:50%;
    }
     .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {

        width:0%;
    }
     .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {

        width: 100%;
    }
     .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {
      
        background-color: #f5f5f5;
    }
     .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {
        opacity: 0;
    }

    .bs-wizard > .bs-wizard-step.active > .bs-wizard-dot {
        -webkit-animation: NAME-YOUR-ANIMATION 1s infinite;  /* Safari 4+ */
      -moz-animation: NAME-YOUR-ANIMATION 1s infinite;  /* Fx 5+ */
      -o-animation: NAME-YOUR-ANIMATION 1s infinite;  /* Opera 12+ */
      animation: NAME-YOUR-ANIMATION 1s infinite;  /* IE 10+, Fx 29+ */
        background-color: #f5f5f5;
    }
     .bs-wizard > .bs-wizard-step.active > .bs-wizard-dot:after {
        opacity: 0;
    }

     .bs-wizard > .bs-wizard-step:first-child > .progress {
        left: 50%;
         width: 50%;
    }
     .bs-wizard > .bs-wizard-step:last-child > .progress {
        width: 50%;
    }
     .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{
         pointer-events: none;
    }
    /*END Form Wizard*/

    /*Blink*/

    @-webkit-keyframes NAME-YOUR-ANIMATION {
      0%, 49% {
        background-color: #fbe8aa;
        /*border: 3px solid #f5f5f5;*/
        border: 3px solid #fbe8aa;
      }
      50%, 100% {
        background-color: #fbbd19;
        border: 8px solid #fbe8aa;
      }
    }
</style>

<div id="app">
    <div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar_siswa')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        {{-- @include('layouts.partials.contentheader') --}}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid spark-screen">
                <div id="flashmessage" class="row">
                    <div class="col-md-12">
                        @include('flash::message')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row bs-wizard" style="border-bottom:0;">
                                
                                    <div class="col-xs-2 bs-wizard-step {{ Auth::user()->calonsiswa->steps->step_1}}">
                                      <div class="text-center bs-wizard-stepnum">1. Pendaftaran</div>
                                      <div class="progress"><div class="progress-bar"></div></div>
                                      <a href="#" class="bs-wizard-dot"></a>
                                      {{-- <div class="bs-wizard-info text-center">Lorem ipsum dolor sit amet.</div> --}}
                                    </div>
                                    
                                    <div class="col-xs-2 bs-wizard-step {{ Auth::user()->calonsiswa->steps->step_2}}"><!-- complete -->
                                      <div class="text-center bs-wizard-stepnum">2. Pembayaran Registrasi</div>
                                      <div class="progress"><div class="progress-bar"></div></div>
                                      <a href="#" class="bs-wizard-dot"></a>
                                      {{-- <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div> --}}
                                    </div>
                                    
                                    <div class="col-xs-2 bs-wizard-step {{ Auth::user()->calonsiswa->steps->step_3}} quadrat"><!-- complete -->
                                      <div class="text-center bs-wizard-stepnum">3. Kofirmasi Pembayaran</div>
                                      <div class="progress"><div class="progress-bar"></div></div>
                                      <a href="#" class="bs-wizard-dot"></a>
                                      {{-- <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div> --}}
                                    </div>
                                    
                                    <div class="col-xs-2 bs-wizard-step {{ Auth::user()->calonsiswa->steps->step_4}}"><!-- active -->
                                      <div class="text-center bs-wizard-stepnum">4. Tes Seleksi Akademik</div>
                                      <div class="progress"><div class="progress-bar"></div></div>
                                      <a href="#" class="bs-wizard-dot"></a>
                                      {{-- <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div> --}}
                                    </div>

                                    <div class="col-xs-2 bs-wizard-step {{ Auth::user()->calonsiswa->steps->step_5}}"><!-- active -->
                                      <div class="text-center bs-wizard-stepnum">5. Hasil Tes Seleksi</div>
                                      <div class="progress"><div class="progress-bar"></div></div>
                                      <a href="#" class="bs-wizard-dot"></a>
                                      {{-- <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div> --}}
                                    </div>

                                    <div class="col-xs-2 bs-wizard-step {{ Auth::user()->calonsiswa->steps->step_6}}"><!-- active -->
                                      <div class="text-center bs-wizard-stepnum">6. Hasil Penerimaan</div>
                                      <div class="progress"><div class="progress-bar"></div></div>
                                      <a href="#" class="bs-wizard-dot"></a>
                                      {{-- <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Your Page Content Here -->
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