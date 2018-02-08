@extends('layouts.landing')

@section('htmlheader_title')
    {{ trans('Selamat Datang Calon Siswa Baru') }}
@endsection

@section('main-content')
<div id="headerwrap" class="box">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h3>Selamat Datang di Sistem Informasi Penerimaan Siswa Baru SMK</h3>
                <hr>
                <h1>Pendaftaran Online</h1>
                <br><br>
                <div class="col-md-6 col-md-offset-3">
                    <a href="{{ route('pendaftaranHomepage') }}" class="btn btn-success btn-flat btn-lg">Daftar</a>
                    <a href="{{ route('panduanPendaftaranHomepage') }}" class="btn btn-default btn-flat btn-lg">Panduan Pendaftaran</a>
                </div>
                <br><br><br><br>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<!-- INTRO WRAP -->
{{-- <div id="intro" class="box">
    <div class="container">
        <div class="row">
            <h1 class="text-center">Sekilas Tentang SMK Kami,</h1>
            <div class="col-md-6">
                <img src="http://psb.smktelkom-mlg.sch.id/f_images/smk2.png" class="img-responsive">
            </div>
            <div class="col-md-6 h4" style="line-height: inherit">
                SMK Telkom Malang adalah pelopor Sekolah Menengah Kejuruan pertama bidang informatika di Indonesia, berpengalaman dari tahun 1992 yang telah terakreditasi “A” dan mempunyai standar mutu ISO 9001:2008
            </div>
            <br>
            <br>
        </div>
        <br>
        <hr>
    </div> <!--/ .container -->
</div> --}}
<!--/ #introwrap -->        

{{-- <div id="footerwrap">
    <div class="container">
        <div class="col-lg-5">
            <h3>{{ trans('adminlte_lang::message.address') }}</h3>
            <p>
                Jl. Haji Gedad Gang Kijon No.14 RT.003 RW.004<br/>
                Paninggilan Utara, Ciledug, Tangerang<br/>
                Banten - Indonesia<br/>
                Kode POS : 15153
            </p>
        </div>

        <div class="col-lg-7">
            <h3>{{ trans('adminlte_lang::message.dropus') }}</h3>
            <br>
            <form role="form" action="#" method="post" enctype="plain">
                <div class="form-group">
                    <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                    <input type="name" name="Name" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                </div>
                <div class="form-group">
                    <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                    <input type="email" name="Mail" class="form-control" id="email1" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                </div>
                <div class="form-group">
                    <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                    <textarea class="form-control" name="Message" rows="3"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-large btn-success">{{ trans('adminlte_lang::message.submit') }}</button>
            </form>
        </div>
    </div>
</div> --}}

@endsection
