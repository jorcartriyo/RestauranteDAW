@extends('layouts.appDashboard')
@section('title', 'Artículos')
@section('content')

    <div class="container-fluid">
        <div class="col-md-28 col-15 mr-auto ml-auto">
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('articulos.store') }}">
                @method('POST')
                @csrf
                <!--      Wizard container        -->
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <div class="card-header text-center">
                        <h2 class="card-title">
                            Crea un Artículo
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
                                                name="imgArticulo" id="imgUsu" title="Imagen Articulo" />
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

                    {{-- Artículo --}}

                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img src="{{ asset('images/product.png') }}" alt="Articulo">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="articulo" class="bmd-label-floating">Nombre del Artículo
                                    (requerido)</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value=''
                                    required>
                            </div>
                        </div>
                    </div>

                    {{-- descripción --}}


                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">description</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción del artículo</label>
                                <textarea class="form-control rounded-0" value=' ' style="resize: both;" id="descripcion" name="descripcion"
                                    rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    {{-- Categoria --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img class="material-icons" src="{{ asset('images/categoria.png') }}" alt="Categoria">
                                </span>

                            </div>
                            <label for="categoria" class="bmd-label-floating"> Categoria
                                (requerido)</label>
                            <div class="form-group ml-5">

                                <select id="categoria" name="categoria">

                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Precio --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">euro</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="precio" class="bmd-label-floating"> Precio
                                    (required)</label>
                                <input type="number" step="0.01" class="form-control" id="precio" required="true"
                                    value='0' name="precio" autocomplete="on">
                            </div>
                        </div>
                    </div>
                    {{-- Tipo --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">restaurant_menu</i>
                                </span>
                            </div>
                            <label for="tipo" class="bmd-label-floating"> Tipo
                                (required)</label>
                            <div class="form-group ml-5">
                                <input type="checkbox" id="carta" name="tipo[]" value="carta">
                                <label for="carta" class="px-2"> Carta</label><br>
                                <input type="checkbox" id="menu" name="tipo[]" value="menu">
                                <label for="menu" class="px-2 mt-2"> Menú</label><br>
                            </div>
                        </div>
                    </div>

                    {{-- Activo --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">fact_check</i>
                                </span>
                            </div>
                            <label for="activo" class="bmd-label-floating"> Activo
                                (required)</label>
                            <div class="form-group ml-5">
                                <input type="radio" id="si" name="activo" value=1 checked>
                                <label class="px-2" for="si">Si</label><br>
                                <input type="radio" id="no" name="activo" value=0>
                                <label class="px-2 mt-2" for="no">No</label><br>
                            </div>
                        </div>
                    </div>
                    {{-- Recomendado --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                </span>
                            </div>
                            <label for="activo" class="bmd-label-floating"> Recomendado
                                (required)</label>
                            <div class="form-group ml-5">
                                <input type="radio" id="yes" name="recomendado" value=1>
                                <label class="px-2" for="yes">Si</label><br>
                                <input type="radio" id="non" name="recomendado" value=0>
                                <label class="px-2 mt-2" for="non">No</label><br>
                            </div>
                        </div>
                    </div>
                    {{-- Submit --}}
                    <div>
                        <div class="card-footer justify-content-around">
                            <div class="ml-auto">
                                <button type="submit" class="btn btn-primary pull-right">Crear Artículo</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
@endsection
