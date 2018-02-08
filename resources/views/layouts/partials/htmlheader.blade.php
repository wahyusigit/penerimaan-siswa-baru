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
    <!-- iCheck -->
    <link href="{{ asset('plugins/iCheck/skins/flat/blue.css') }}" rel="stylesheet" type="text/css" />

    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('plugins/jqueryui/jquery-ui.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datepicker/datepicker3.css') }}">

    {{-- Form Validation --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/formvalidation/css/bootstrapValidator.min.css') }}">
    @stack('css')
    <style>
        textarea {
            resize: none;
        }
        /**/
        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            vertical-align: middle;
        }
        .invoice {
            margin: 0px 0px;
        }
        hr {
            margin-top: 5px; 
            margin-bottom: 5px; 
            border: 0;
            border-top: 1px solid #eeeeee;
        }
        .loadersmall {
          border: 5px solid #f3f3f3;
          -webkit-animation: spin 1s linear infinite;
          animation: spin 1s linear infinite;
          border-top: 5px solid #555;
          border-radius: 50%;
          width: 50px;
          height: 50px;
        }


        @-webkit-keyframes spin {
          0% { 
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
          }

          100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }

        @keyframes spin {
          0% { 
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
          }

          100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('css')
</head>
