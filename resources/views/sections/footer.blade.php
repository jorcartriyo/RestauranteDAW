<footer class="footer">
    <div class="container">

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Deja tu Duda, Recomendación o Queja.</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="newsletter_form_container mx-auto">
                        <form action="post">
                            <div
                                class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
                                <textarea cols="35" rows="5" style="position: relative; left: 100px;"></textarea>
                                <!--<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email Address" required="required" data-error="Valid email is required.">-->
                                <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
                                    style="position: relative; left: 105px;" value="Submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Content -->

        <div class="footer_content">

            <div class="d-flex justify-content-between">

                <!-- Footer Column - About -->
                <div class="col-lg-2 footer_col">

                    <!-- Logo -->
                    <div class="logo_container">
                        <div class="logo">
                            <span>Sistema de Ventas de Restaurante</span>
                        </div>
                    </div>

                    <p class="footer_about_text">Será un Placer Atenderles con el Buen Ambiente de Nuestro
                        Equipo de Trabajos y con las Mejores Ofertas para Ustedes.</p>

                </div>

                <!-- Footer Column - Menu -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">Menu</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="main_nav_item"><a href="{{ url('Inicio') }}">Inicio</a></li>
                            <li class="main_nav_item"><a target="_blank" href="{{ url('DatosDueño') }}">Usuario</a></li>
                            <li class="main_nav_item"><a target="_blank" href="{{ url('DatosLocal') }}">Local</a></li>
                            <li class="main_nav_item"><a target="_blank" href="{{ url('Menu') }}">Menu</a>
                            </li>
                            <li class="main_nav_item"><a target="_blank" href="{{ url('Pedido') }}">Pedido</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Column - Usefull Links -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">Ayuda</div>
                    <div class="footer_column_content">
                        <ul>
                            <li class="footer_list_item"><a href="#">Testimonials</a></li>
                            <li class="footer_list_item"><a href="#">FAQ</a></li>
                            <li class="footer_list_item"><a href="#">Community</a></li>
                            <li class="footer_list_item"><a href="#">Campus Pictures</a></li>
                            <li class="footer_list_item"><a href="#">Tuitions</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Column - Contact -->

                <div class="col-lg-3 footer_col">
                    <div class="footer_column_title">Contact</div>
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
                                </div>mr1@outlook.hotmail.com
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
                    </script> All rights reserved | Rincón del Manaba <i class="fa fa-heart"
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
