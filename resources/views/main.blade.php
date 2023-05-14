@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<div class="super_container">
    <!-- Carrusel -->
    @include('sections.carrusel')

    <!-- platos Típicos -->
    @include('sections.recomendados')

    <!-- platos de la semana -->

    <!-- Register -->

    <div class="register">

        <div class="container-fluid">

            <div class="row row-eq-height">
                <div class="col-lg-6 nopadding">

                    <!-- Register -->

                    <div class="register_section d-flex flex-column align-items-center justify-content-center">
                    <div class="search_background" style="background-image:url(images/search_background.jpg);">
                        </div>
                        <div class="register_content text-center">
                            <h1 class="register_title">Datos del Local</h1>
                            <p class="register_text">Estamos Ubicados en Manta, San Miguel Frente de la Ciudadela
                                Universitaria tenemos franquicias en Quito, Ambato, Chone, Bahía de Caraquez,
                                Proximamente Más. Nuestro Objetivo es Llegar muy Lejos.</p>
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
                            <p style="color: dimgrey" class="register_text">Nací en la Hermosa Ciudad de Manta, Mi
                                Nombre es Milton José Arroyo Paredes, Tengo 25 Años, Casado con 2 Hijos Nunca pensé
                                que mi sazón le gustara a medio Ecuador.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Servicios -->

    <div class="services page_section">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Dominios</h1>
                    </div>
                </div>
            </div>

            <div class="row services_row">

                <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="{{ asset('images/earth-globe.svg') }}" alt="">
                    </div>
                    <h3>Ranking</h3>
                    <p>Actualmente somos el top 10 en el mundo.</p>
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
                    <p>Somos clasificados en Italia aparte de la comida manaba, tenemos platos de otros países el
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
                    <p>Tenemos certificados otorgados de Italia por ser platos únicos y deliciosos</p>
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