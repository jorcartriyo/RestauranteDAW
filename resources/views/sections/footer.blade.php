<footer class="footer">
    <div class="container">
        <!-- Footer Content -->

        <div class="footer_content">
        
            <div class="d-flex justify-content-between">

                <!-- Footer Column - About -->
                <div class="col-lg-3 footer_col">

                    <!-- Logo -->
                    <div class="logo_container">
                        <div class="logo">
                            <span>Restaurante Daw</span>
                        </div>
                    </div>

                    <p class="footer_about_text">Será un Placer Atenderles con el Buen Ambiente de Nuestro
                        Equipo de Trabajos y con las Mejores Ofertas para Ustedes.</p>

                </div>

                <!-- Footer Column - Menu -->

                <div class="col-lg-3 footer_col pl-5 ml-5">
                    <div class="footer_column_title">Menu</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="main_nav_item_footer"><a href="{!! route('main') !!}">Inicio</a></li>
                            <li class="main_nav_item_footer"><a href="{!! route('carta.index') !!}">Carta</a></li>
                            <li class="main_nav_item_footer"><a href="{!! route('menu.index') !!}">Menú del Día</a></li>
                            <li class="main_nav_item_footer"><a href="{{ url('Menu') }}">Reservas</a></li>
                            <li class="main_nav_item_footer"><a href="{{ url('Pedido') }}">Pedidos</a></li>
                            <li class="main_nav_item_footer"><a href="{{ route('quienesSomos') }}">Quienes Somos</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
       
                <!-- Footer Column - Contact -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">Contacto</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{ asset('images/placeholder.svg') }}"
                                        alt="https://www.flaticon.com/authors/lucy-g">
                                </div>
                                Dúrcal, Granada
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{ asset('images/smartphone.svg') }}"
                                        alt="https://www.flaticon.com/authors/lucy-g">
                                </div>
                                626569946
                            </li>
                            <li class="footer_contact_item">
                                <div class="footer_contact_icon">
                                    <img src="{{ asset('images/envelope.svg') }}"
                                        alt="https://www.flaticon.com/authors/lucy-g">
                                </div>jorge@restaurantedaw.com
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Copyright -->
        <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
            <div class="footer_copyright">
                <span>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Restaurante Daw <i class="fa fa-heart"
                        aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"></a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </span>
            </div>
            <div class="footer_social ml-sm-auto">
                <ul class="menu_social">
                    <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</footer>
