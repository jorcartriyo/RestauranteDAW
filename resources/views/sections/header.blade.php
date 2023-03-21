<!-- Cabecera de la aplicación logo y menú de navegación -->
<header class="header">
    <div class="header_content">

        <!-- Logo -->
        <div class="logo_container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <div class="logo">
                <span>Daw</span>
                <span class="secundaryText ">Restaurante</span>
            </div>
        </div>
        <!-- Menú de navegación -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="{{ url('Inicio') }}">Inicio</a></li>
                    <li class="main_nav_item"><a href="{{ url('DatosDueño') }}">Carta</a></li>
                    <li class="main_nav_item"><a href="{{ url('DatosLocal') }}">Menú del Día</a></li>
                    <li class="main_nav_item"><a href="{{ url('Menu') }}">Reservas</a></li>
                    <li class="main_nav_item"><a href="{{ url('Pedido') }}">Pedidos</a></li>
                    <li class="main_nav_item"><a href="{{ url('Venta') }}">Quienes Somos</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="main_nav_item"><a href="{{ url('/dashboard') }}">Panel de Control</a></li>
                        @else
                            <li class="main_nav_item"><a href="{{ route('login') }}">Iniciar Sesión</a></li>

                            @if (Route::has('register'))
                                <li class="main_nav_item"><a href="{{ route('register') }}">Registro</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
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
                        <li class="menu_item"><a href="#">Dashboard</a></li>
                        <li class="menu_item"><a href="#">About us</a></li>
                        <li class="menu_item"><a href="courses.html">Courses</a></li>
                        <li class="menu_item"><a href="elements.html">Elements</a></li>
                        <li class="menu_item"><a href="news.html">News</a></li>
                        <li class="menu_item"><a href="contact.html">Contact</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li class="menu_item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li class="menu_item"><a href="{{ route('login') }}">Log in</a></li>

                                @if (Route::has('register'))
                                    <li class="menu_item"><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                    <!-- Menú Social -->
                    <div class="menu_social_container">
                        <ul class="menu_social">
                            <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
