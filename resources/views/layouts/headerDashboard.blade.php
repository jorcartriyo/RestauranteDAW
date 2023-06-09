<header class="headerDashboard">
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
                    <li class="main_nav_item"><a href="{!! route('menu.index') !!}">Menú del día</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Settings Dropdown -->
    <div class='pr-5'>
        <x-dropdown width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>
            <div class="header_content">
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
            </div>
        </x-dropdown>
    </div>
    <!-- Menú de la hamburguesa para resoluciones inferiores -->
    <div class="menu_inner mt-3">

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

                        @can('admin.all')
                            <li>
                                <a class="nav-link" href="{!! route('home.index') !!}">Usuarios <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('roles.index') !!}">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('permisos.index') !!}">Permisos</a>
                            </li>                          
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('reservas.index') !!}">Reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('pedidosBack.index') !!}">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('articulos.index') !!}">Articulos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('categorias.index') !!}">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('eventos.index') !!}">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('fotos.index') !!}">Carrusel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('mesas.index') !!}">Mesas</a>
                        </li>                      
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('contactanos.index') !!}">Mensajes</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</header>
