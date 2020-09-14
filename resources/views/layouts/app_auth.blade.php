<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="msapplication-config" content="/assets/images/icons/browserconfig.xml">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="/assets/images/icons/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/images/icons/site.webmanifest">
    <link rel="mask-icon" href="/assets/images/icons/safari-pinned-tab.svg" color="#232323">
    <link rel="shortcut icon" href="/assets/images/icons/favicon.ico">


    <title>{{ empty($title) ? "Male Version Store" : $title." - Male Version Store"}}</title>
    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <script src="https://kit.fontawesome.com/00ba6c0927.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> --}}
    <!-- CSS Files -->
    <link href="/material/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="/assets/css/general.css" rel="stylesheet" />
    <link href="/assets/css/loading.css" rel="stylesheet" />
    @stack('css')
</head>

<body class="{{ $class ?? '' }}">
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
    @include('layouts.page_templates.auth')

    <!--   Core JS Files   -->
    <script src="/material/js/core/jquery.min.js"></script>
    <script src="/material/js/core/popper.min.js"></script>
    <script src="/material/js/core/bootstrap-material-design.min.js"></script>
    <script src="/material/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="/material/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="/material/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="/material/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="/material/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="/material/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="/material/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="/material/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="/material/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="/material/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="/material/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="/material/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="/material/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="/material/js/plugins/arrive.min.js"></script>
    <!-- Chartist JS -->
    <script src="/material/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/material/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/material/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
    <script>
      var api_storage_url = "/api/storage/view/";

      $(document).ready(function(){
        @stack('documentOnReady')
      });
      $(window).resize(function(){
        @stack('windowOnResize')
      });
      </script>
    @stack('js')
</body>

</html>
