@extends('layouts.appDashboard')
@section('title', 'Fotos')
@section('content')

    <div class="container-fluid">
        <div class="col-md-28 col-15 mr-auto ml-auto">
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('fotos.store') }}">
                @method('POST')
                @csrf
                <!--      Wizard container        -->
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                    <div class="card-header text-center">
                        <h2 class="card-title">
                            Crea un foto
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
                                                name="imgfoto" id="imgUsu" title="Imagen foto" />
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

                    {{-- Seccion  --}}

                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-section" aria-hidden="true"></i>
                                </span>
                            </div>
                            <label for="foto" class="bmd-label-floating">Seccion (requerido)</label>
                            <div class="form-group  ml-5">

                                <select id="seccion" name="seccion" require>
                                    <option value="inicio">Inicio</option>
                                    <option value="carta">Carta</option>
                                    <option value="menu">Menu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Texto 1 --}}


                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">description</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Texto 1</label>
                                <input type="text" class="form-control" id="texto1" name="texto1" value=''>
                            </div>
                        </div>
                    </div>

                    {{-- Texto 2 --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">description</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Texto 2</label>
                                <input type="text" class="form-control" id="texto2" name="texto2" value=''>
                            </div>
                        </div>
                    </div>

                    {{-- Texto 3 --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">description</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Texto 3</label>
                                <input type="text" class="form-control" id="texto3" name="texto3" value=''>
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
                    {{-- Submit --}}
                    <div>
                        <div class="card-footer justify-content-around">
                            <div class="ml-auto">
                                <button type="submit" class="btn btn-primary pull-right">Crear foto</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
@endsection
