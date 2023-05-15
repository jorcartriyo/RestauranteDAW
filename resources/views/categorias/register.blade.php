@extends('layouts.appDashboard')
@section('title', 'Categorias')
@section('content')

    <div class="container-fluid">
        <div class="col-md-28 col-15 mr-auto ml-auto">
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('categorias.store') }}">
                @method('POST')
                @csrf
                <!--      Wizard container        -->
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                    <div class="card-header text-center">
                        <h2 class="card-title">
                            Crea una Categoria
                        </h2>
                    </div>
                    {{-- Imagen  --}}
                    <div class="card-body">

                        <div class="tab-pane active" id="about">
                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                    <div class="picture-container">
                                        <div>
                                            <img src="{{ asset('assets/img/product.png') }}" onchange="mostrarImagen(event)"
                                                name="imgCategoria" id="imgUsu" title="Imagen Articulo" />
                                            <br>
                                            <input type="file" id="file" name="file"
                                                onchange="mostrarImagen(event)">
                                        </div>
                                        <br>
                                        <h6 class="description">Asigna la imagen</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Categoría --}}

                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img src="{{ asset('images/product.png') }}" alt="Articulo">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="articulo" class="bmd-label-floating">Nombre de la Categoria
                                    (requerido)</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" value=''
                                    required>
                            </div>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div>
                        <div class="card-footer justify-content-around">
                            <div class="ml-auto">
                                <button type="submit" class="btn btn-primary pull-right">Crear Categoría</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>


@endsection
