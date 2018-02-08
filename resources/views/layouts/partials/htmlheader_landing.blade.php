<head>
    <meta charset="UTF-8">
    <title> @yield('htmlheader_title', 'Title') - PSB SMK </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/skin-black.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('plugins/iCheck/skins/flat/blue.css') }}" rel="stylesheet" type="text/css" />

    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('plugins/jqueryui/jquery-ui.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
    
    <link href="{{ asset('css/table_middle.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        textarea {
            resize: none;
        }
    </style>
    @stack('css')
</head>
