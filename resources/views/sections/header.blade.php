<!-- Cabecera de la aplicación logo y menú de navegación -->
<header class="header">
    <div class="header_content">

        <!-- Logo -->
        <div class="logo_container">
            <a href="{!! route('main') !!}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            <div class="logo">
                <span>Daw</span>
                <span class="secundaryText ">Restaurante</span>
            </div>
        </div>
        <!-- Menú de navegación -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="{!! route('main') !!}">Inicio</a></li>
                    <li class="main_nav_item"><a href="{!! route('carta.index') !!}">Carta</a></li>
                    <li class="main_nav_item"><a href="{!! route('menu.index') !!}">Menú del Día</a></li>

                    <li class="main_nav_item"><a href="{!! route('reserva') !!}">Reservas</a></li>

                    <li class="main_nav_item"><a href="{!! route('pedidos.index') !!}">Pedidos</a></li>
                    <li class="main_nav_item"><a href="{{ route('quienesSomos') }}">Quienes Somos</a></li>
                    @Auth
                    @else
                        <li class="main_nav_item"><a href="{{ route('login') }}">Iniciar Sesión</a></li>

                        @if (Route::has('register'))
                            <li class="main_nav_item"><a href="{{ route('register') }}">Registro</a></li>
                        @endif
                        </li>
                    @endauth
                    @can('admin.dashboard')
                        <li class="main_nav_item"><a href="{{ url('/dashboard') }}">Panel de Control</a></li>
                    @endcan
                    @can('admin.all')
                        <li class="main_nav_item"><a href="{{ url('/dashboard') }}">Panel de Control</a></li>
                    @endcan
                </ul>
            </div>
        </nav>
        <div class="pb-5 pl-5">
            @Auth
                <li class="main_nav_item">
                    <x-dropdown width="48" class="main_nav_list">
                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>

                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </li>
            @endauth
        </div>
    </div>
    <div class="header_side">
        <img src="{{ asset('images/phone-call.svg') }}" alt="telefono">
        <span>626569946</span>
    </div>

    <!-- Menú de la hamburguesa para resoluciones inferiores -->
    <div class="menu_inner">

        <!--Icono de hamburgesa -->
        <div class="hamburger_container">
            <i class="fas fa-bars trans_200"></i>
        </div>

        <!-- Contnedor del Menu -->
        <div class="menu_container">

            <!-- Botón para cerrar el menú -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Logo -->
            <div class="menu_inner">
                <div class="header_side">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </div>
                <!-- Items del Menú de la Hamburguesa-->
                <div class="menu">
                    <ul class="menu_list">
                        <li class="nav-link"><a href="{!! route('main') !!}">Inicio</a></li>
                        <li class="nav-link"><a href="{!! route('carta.index') !!}">Carta</a></li>
                        <li class="nav-link"><a href="{!! route('menu.index') !!}">Menú del Día</a></li>
                        @if (Auth::user() != null)
                            <li class="nav-link"><a href="{!! route('reserva') !!}">Reservas</a></li>
                        @else
                            <li class="nav-link"><a href="{!! route('login') !!}">Reservas</a></li>
                        @endif
                        <li class="nav-link"><a href="{!! route('pedidos.index') !!}">Pedidos</a></li>
                        <li class="nav-link"><a href="{{ route('quienesSomos') }}">Quienes Somos</a></li>
                        @can('admin.dashboard')
                            <li class="nav-link"><a href="{{ url('/dashboard') }}">Panel de Control</a></li>
                        @endcan
                        @can('admin.all')
                            <li class="nav-link"><a href="{{ url('/dashboard') }}">Panel de Control</a></li>
                        @endcan
                        @Auth
                        @else
                            <li class="nav-link"><a href="{{ route('login') }}">Iniciar Sesión</a></li>

                            @if (Route::has('register'))
                                <li class="nav-link"><a href="{{ route('register') }}">Registro</a></li>
                            @endif
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
