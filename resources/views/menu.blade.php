@extends('layouts.app')
@section('title', 'Menu')
@section('content')
    <!-- Carrusel -->
    @include('sections.carrusel')
    <!-- Menu -->
    <div class="carta page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>NUESTRO MENU</h1>
                        <br>
                    </div>
                </div>
            </div>
            @foreach ($categorias as $categoria)
                <div class="col">
                    <div class="section_title text-center">
                        <h1>{{ $categoria->categoria }}</h1>
                    </div>

                    @foreach ($articulos as $articulo)
                        @if ($articulo->activo)
                            @if ($articulo->tipo === 'menu' || $articulo->tipo === 'cartamenu')
                                @if ($categoria->categoria === $articulo->categorias->categoria)
                                    <div class="row course_boxes">


                                        <!-- Popular Course Item -->

                                        <div class="col-lg-4 course_box mb-5">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    @if ($articulo->imagen != 'default') src="{{ asset('storage/images/articulos/' . $articulo->imagen) }}"
                                                    @else src="{{ asset('assets/img/product.png') }}" @endif
                                                    alt="{{ $articulo->nombre }}">
                                                <div class="card-body text-center">
                                                    <div class="card-title"><a>{{ $articulo->nombre }}</a></div>
                                                    <br>
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
                </div>
            @endforeach
        </div>
    </div> <!-- Footer -->
    @include('sections.footer')
@endsection
