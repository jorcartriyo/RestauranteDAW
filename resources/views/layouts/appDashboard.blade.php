<!doctype html>
<html lang="es">

<head>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Material Kit CSS -->
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.2.2') }}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/fontawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/demo/demo.css" rel="stylesheet') }}" />
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-3.jpg">

            <div class="sidebar-wrapper">
                @include('layouts.navigationDashboard')
            </div>
            <div class="sidebar-background"></div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse justify-content-end">
                        @include('layouts.headerDashboard')
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')

            </div>
            <footer class="footer">
                <div class="container-fluid">


                </div>
                <!-- your footer here -->
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/material-dashboard.js?v=2.2.2') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
</body>

</html>
