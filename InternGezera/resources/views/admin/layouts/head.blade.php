<title>@yield('title')</title>
<link rel="icon" type="image/x-icon" href="{{ URL::asset('assetsAdmin/shared/img/favicon.ico') }}" />
<link href="{{ URL::asset('assetsAdmin/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('assetsAdmin/assets/js/loader.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{{ URL::asset('assetsAdmin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assetsAdmin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="{{ URL::asset('assetsAdmin/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assetsAdmin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"
    class="dashboard-analytics" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link rel="stylesheet" href="{{ URL::asset('assetsAdmin/plugins/sweetalerts/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{asset('assetsAdmin/assets/css/fontawesome6.css')}}">
<link href="{{ URL::asset('assetsAdmin/assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
@yield('css')
