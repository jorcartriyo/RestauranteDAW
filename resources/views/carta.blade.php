@extends('layouts.app')
@section('title', 'Carta')
@section('content')

    <div class="carta page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>NUESTRA CARTA</h1>
                        </br>
                    </div>
                </div>
            </div>
            @foreach ($categorias as $categoria)
                <div class="col">
                    <div class="section_title text-center">
                        <h1>{{ $categoria->categoria }}</h1>
                    </div>

                    @foreach ($articulos as $articulo)
                        @if ($articulo->tipo === 'carta' || $articulo->tipo === 'cartamenu')
                            @if ($articulo->activo)
                                @if ($categoria->categoria === $articulo->categorias->categoria)
                                    <div class="row course_boxes">


                                        <!-- Popular Course Item -->

                                        <div class="col-lg-4 course_box">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    @if ($articulo->imagen != 'default') src="{{ asset('storage/images/articulos/' . $articulo->imagen) }}"
                        @endif
                                                   >
                                                <div class="card-body text-center">
                                                    <div class="card-title"><a>{{ $articulo->nombre }}</a></div>
                                                    </br>
                                                    <div class="card-text">{{ $articulo->descripcion }}</div>
                                                </div>
                                                <div class="price_box d-flex flex-row align-items-center">
                                                    <div class="course_author_name"> <span>Euros</span></div>
                                                    <div
                                                        class="course_price d-flex flex-column align-items-center justify-content-center">
                                                        <span>{{ $articulo->precio }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
            @endforeach
        </div>
    </div> <!-- Footer -->
    @include('sections.footer')
@endsection
