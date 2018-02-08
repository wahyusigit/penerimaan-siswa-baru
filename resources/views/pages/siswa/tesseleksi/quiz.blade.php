@extends('layouts.siswa_quiz')
@section('main-content')
@isset($quiz_done)
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-success">
            <h4>{{ $quiz_done }}</h4>
            <a href="{{ route('indexTesSeleksiAkademikSiswa') }}" class="link">Kembali</a>
        </div>
    </div>
</div>
@endisset
@isset($quiz_start)
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-danger">
            <h4>{{ $quiz_start }}</h4>
            <a href="{{ route('startQuizTesSeleksiAkademikSiswa') }}" class="">Mulai</a>
        </div>
    </div>
</div>
@endisset
@isset($quiz_timeout)
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-danger">
            <h4>{{ $quiz_timeout }}</h4>
            <a href="{{ route('indexTesSeleksiAkademikSiswa') }}" class="">Kembali</a>
        </div>
    </div>
</div>
@endisset

@isset($quiz)
<div class="row">
    <div class="col-md-3 pull-right">
        <div class="box">
            <div class="box-body">
                <div class="h4">
                Sisa Waktu : <span id="countdown"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 pull-right">
        <div class="box">
            <div class="box-body">
                <div class="h4">
                Soal No. {{ $no_pertanyaan }} dari {{ $total_pertanyaan }}
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('postQuizTesSeleksiAkademikSiswa') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">

                <div id="pertanyaan" style="font-size: 18">
                    <input type="hidden" name="id_pertanyaan" value="{{ $quiz->id_pertanyaan }}">

                    <h4>{{ $no_pertanyaan }}. {!! $quiz->isi_pertanyaan !!}</h4>
                </div>
                <hr>
                <div id="pilihan_jawaban">
                    @foreach($quiz->pilihanJawaban as $jawaban)
                        <p>
                            <input class="icheck" type="radio" value="{{ $jawaban->id_pilihan_jawaban }}" name="pilihan_jawaban" required="required"> 
                            <span class="pil">{{ $jawaban->isi_jawaban }}</span>
                        </p>
                    @endforeach
                </div>
                </div>
                <div class="box-footer">
                    <div class="form-group pull-right">
                        <button id="lanjutkan" type="submit" class="btn btn-success btn-flat disabled">Lanjutkan    <i class="fa fa-arrow-right"></i></button>
                    </div>
                    {{-- <div class="form-group pull-right">
                        <button type="button" class="btn btn-default btn-flat">Lewati</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </form>
</div>
@endisset
@endsection

@push('script')
<script type="text/javascript">
    // function ajax(url,data){
    //     $.ajax({
    //         url : url,
    //         method : 'POST',
    //         data {data},
    //         success : function(){

    //         }
    //     });
    // }
    // $('body').on('click','#mulai', function(){

    // });
    // $('body').on('click','#selanjutnya', function(){

    // });
    // $('body').on('click','#selesai', function(){

    // });
</script>
<script type="text/javascript" src="{{ asset('plugins/iCheck/icheck.js') }}"></script>
<script type="text/javascript">
    $('.icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%'
            });

</script>
@endpush

@push('css')
<style type="text/css">
    .pil {
        vertical-align: middle;
        margin-left: 4px;
    }

    #pilihan_jawaban {
        margin-top: 20px;
        margin-left: 10px;
    }

    #pertanyaan > p {
        font-size: 18px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/iCheck/skins/all.css') }}">

@endpush

@push('script')
<script type="text/javascript" src="{{ asset('plugins/countdown/jquery.countdown.js') }}"></script>
<script type="text/javascript">
    @isset($countdown)
    $('#countdown').countdown('{{ $countdown }}', function(event) {
        $(this).html(event.strftime('%M:%S'));
    });

    $('input').on('ifChecked', function(event){
        $('#lanjutkan').removeClass('disabled');
    });
    @endisset
</script>
@endpush