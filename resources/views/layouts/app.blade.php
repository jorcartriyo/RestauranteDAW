<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Course Project">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap5/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">  
        <!-- Header -->
        @include('sections.header')
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('styles/bootstrap5/popper.js') }}"></script>
    <script src="{{ asset('styles/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    

</body>

</html>
