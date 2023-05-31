@extends('layouts.app')
@section('title', 'Menu')
@section('content')
    <!-- Carrusel -->
    @include('sections.carrusel')
    @include('flash-message')

    <!-- Menu -->
    <div class="page_section">
        <div class="container">
            <div class="text-center mb-5">
                <h1>NUESTRA CARTA</h1>
                <br>
            </div>
            @foreach ($categorias as $categoria)
                <div class="col">
                    <div class="section_title text-center">
                        <h1>{{ $categoria }}</h1>
                    </div>
                    <div class="section_title mt-4">
                        <h1></h1>
                    </div>

                </div>
                <div class="row justify-content-around">
                    @foreach ($articulos as $articulo)
                        @if ($categoria === $articulo->categorias->categoria)
                            <div class="col-lg-4 mb-5 pr-5">
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
                                    <form method="POST" id="myform" enctype="multipart/form-data"
                                        action="{{ route('pedidos.store') }}">
                                        @method('POST')
                                        @csrf
                                        <div class="price_box d-flex flex-row align-items-center">
                                            <div class="course_author_name"> <span>Euros</span></div>
                                            <div
                                                class="course_price d-flex flex-column align-items-center justify-content-center">
                                                <span>{{ $articulo->precio }}</span>
                                            </div>
                                            <div class="d-flex">
                                                <input type="hidden" name="idArticulo" value="{{ $articulo->id }}">
                                                <input type="hidden" name="ruta" value="carta">
                                                <input type="number" class="form-control input-sm" name="cantidad"
                                                    min='0' max='10' value="0">
                                            </div>
                                            <div>
                                                @Auth
                                                    <button type="submit" class="btn btn-info btn-simple">Agregar
                                                        </button>
                                                @else
                                                    <button type="submit" class="btn btn-info btn-simple">Inicia
                                                        Sesion o Registrate</button>
                                                @endAuth
                                            </div>
                                            @Auth
                                                <a href="{!! route('pedidos.index') !!}" class=" flotante btn btn-info btn-simple">
                                                    Revisar mi pedido
                                                </a>
                                            @else
                                                <button type="submit" class=" flotante btn btn-info btn-simple">Registrate
                                                    Para Hacer Tu
                                                    Pedido
                                                </button>
                                            @endAuth
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div> <!-- Footer -->
    @include('sections.footer')
@endsection
