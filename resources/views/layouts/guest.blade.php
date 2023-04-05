<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- CSS Plantilla -->
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.2.2') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased" >
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full max-w-xl py-5 px-5 bg-white shadow-md overflow-hidden sm:rounded-lg" >
            <div class="card card-wizard active max-w-sm"  data-color="rose" >
                <a href="/" class="logoLogin">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
                <div class="card-body">
                {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
