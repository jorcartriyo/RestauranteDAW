@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <div class="super_container">
        <!-- Carrusel -->
        @include('sections.carrusel')

        <!-- Register -->

        <div class="register">
            <div class="row">
                <div class="row row-eq-height">
                    <div class="col-lg-6 nopadding">

                        <!-- Register -->

                        <div class="register_section d-flex flex-column align-items-center justify-content-center">
                            <div class="search_background" style="background-image:url(images/event_3.jpg);">
                            </div>
                            <div class="register_content text-center">
                                <h1 class="register_title">Datos del Local</h1>
                                <p class="register_text">Estamos Ubicados en la mejor zona para que tu experiencia sea algo
                                    que no puedas olvidar. El local es de nueva construcción y está habilitado para 60
                                    personas
                                    ofreciendo un trato cercano y familiar.</p>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6 nopadding">

                        <!-- Search -->

                        <div class="search_section d-flex flex-column align-items-center justify-content-center">
                            <div class="search_background" style="background-image:url(images/search_background.jpg);">
                            </div>
                            <div class="search_content text-center">
                                <h1 class="search_title" style="color: lightcoral">Datos del Dueño Local</h1>
                                <p style="color: dimgrey" class="register_text">Nací en Granada, llevo 30 años de
                                    experiencia
                                    en la restauración y me apasiona la cocina. Quiero compartir mis platos de nueva
                                    creación con
                                    mucha gente para que se conozca en todo el mundo</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- platos Recomendados -->
        @include('sections.recomendados')

        <!-- Servicios -->

        <div class="services page_section">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1 class="service_title">Dominios</h1>
                        </div>
                    </div>
                </div>

                <div class="row services_row">

                    <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{ asset('images/earth-globe.svg') }}" alt="">
                        </div>
                        <h3>Ranking</h3>
                        <p>Actualmente somos el top 5 según la prensa provincial.</p>
                    </div>

                    <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{ asset('images/exam.svg') }}" alt="">
                        </div>
                        <h3>Atención Rápida</h3>
                        <p>Recibiras una atención de calidad nuestro equipo esta capacitado para que tengas la mejor
                            experiencia.</p>
                    </div>

                    <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{ asset('images/books.svg') }}" alt="">
                        </div>
                        <h3>Comida Gourmet</h3>
                        <p>Nos gusta hacer que tu experiencia sea única, tenemos platos propios el,
                            diseño y el arte es el talento de nosotros.</p>
                    </div>

                    <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{ asset('images/professor.svg') }}" alt="">
                        </div>
                        <h3>Chef's Professionales</h3>
                        <p>Tenemos a los mejores cocineros que harás que repitas tres veces.</p>
                    </div>

                    <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{ asset('images/blackboard.svg') }}" alt="">
                        </div>
                        <h3>Higiene</h3>
                        <p>Tu salud es muy importante para nosotros, por eso contamos con una limpienza de punta usando
                            formulas especiales.</p>
                    </div>

                    <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{ asset('images/mortarboard.svg') }}" alt="">
                        </div>
                        <h3>Certificados</h3>
                        <p>Tenemos certificados otorgados de España por ser platos únicos y deliciosos</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Eventos -->
        @include('sections.eventos')

        <!-- Footer -->
        @include('sections.footer')



    </div>
@endsection
