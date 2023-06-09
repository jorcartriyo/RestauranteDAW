@extends('layouts.app')
@section('title', 'Menu')
@section('content')

    <!-- Carrusel -->
    @include('sections.carrusel')
    @include('flash-message')

    <!-- Menu -->
    <div class="carta page_section">
        <div class="container">
            <div class="text-center mb-5">
                <h1>NUESTRO MENU</h1>
                <br>
            </div>
            @foreach ($categorias as $categoria)
                @if ($categoria != 'Precios')
                    <div class="col">
                        <div class="section_title text-center">
                            <span>{{ $categoria }} (A elegir)</span>
                        </div>
                        <div class="section_title mt-4">
                            <span></span>
                        </div>
                    </div>
                    <div class="row course_boxes d-flex flex-col align-items-center justify-content-around">

                        @foreach ($articulos as $articulo)
                            @if ($categoria === substr($articulo->categorias->categoria, 1))
                                <div class="col-lg-4 mb-5 text-align-center">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="card-title"><a>{{ $articulo->nombre }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('pedidos.store') }}">
                @method('POST')
                @csrf
                <div class="card">
                    <div class="price_box font-weight-bold">
                        <h2 class="precio">Precio del {{ $articulo->nombre }}</h2>


                        <div>
                            <span>{{ $articulo->precio }}</span>
                            <span>Euros</span>

                        </div>

                        <div class="d-flex align-items-center  ">
                            <input type="hidden" name="idArticulo" value="{{ $articulo->id }}">
                            <input type="hidden" name="ruta" value="menu">
                            <span class="mr-2">Cantidad</span>
                            <input type="number" class="form-control input-sm mt-2 " name="cantidad" min='0'
                                max='10' value="0">
                        </div>
                        <div>
                            @Auth
                                <button type="submit" class="btn btn-info btn-simple">Agregar
                                    al Pedido</button>
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
                </div>
            </form>
        </div>
    </div> <!-- Footer -->
    @include('sections.footer')
@endsection
