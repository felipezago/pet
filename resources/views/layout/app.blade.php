<!DOCTYPE html>
<html lang="pt-BR">
    <head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>HappyPet</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"> 
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="deion">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" href="{{ asset('images/logo_dark.png') }}">

        <link href="{{ asset('libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet') }}" type="textcss">
        <link href="{{ asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        
        <link href="{{ 'assets/libs/dripicons/webfont/webfont.css" rel="stylesheet' }}" type="text/css">

        <link href="{{ asset('libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('libs/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
        
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">

        <link href=" {{ asset('libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet') }}" type="text/css">
    </head>


<body>
    @include('sweetalert::alert')

    @yield('conteudo')

    <div id="dropDownSelect1"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <script src="{{ asset('libs/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('js/jquery.app.js') }}"></script>


</body>
</html>
        