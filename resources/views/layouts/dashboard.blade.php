<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title??'Dashboard' }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Material Dashboard -->
        <link href="/vendor/material/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
        <!-- Fonts and icons -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
       
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        {{ $head ?? '' }}
        {{ $style ?? '' }}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-background-color="white" data-image="">
                <div class="logo">
                    <a id="logo" href="{{ route('index') }}">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" width="200" height="100" fill="white"/>
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <x-side-bar :page="$page??null"/>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <x-nav-bar/>
                <div class="content" style="padding: 0px 15px;">
                    <div class="container-fluid">
                        <x-errors/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-warning" style="background:#012951">
                                        <h4 class="card-title" style="text-align: center;">{{ $card_title??"Welcome To Control Panel" }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--   Material Dashboard   -->
        <script src="/vendor/material/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="/vendor/material/js/core/popper.min.js" type="text/javascript"></script>
        <script src="/vendor/material/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="/vendor/material/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="/vendor/material/js/plugins/jquery.dataTables.min.js"></script>
        
        <!-- Chartist JS -->
        <script src="/vendor/material/js/plugins/chartist.min.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/vendor/material/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
        {{ $script ?? '' }}
    </body>
</html>
