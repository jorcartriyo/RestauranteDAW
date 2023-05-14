@extends('layouts.appDashboard')
@section('title', 'Eventos')
@section('content')

<div class="container-fluid">
    <div class="col-md-28 col-15 mr-auto ml-auto">
        <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('eventos.store') }}">
            @method('POST')
            @csrf
            <!--      Wizard container        -->
            <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                    <h2 class="card-title">
                        Crea un Evento
                    </h2>
                </div>
                {{-- Imagen  --}}
                <div class="card-body">

                    <div class="tab-pane active" id="about">
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="picture-container">
                                    <div>
                                        <img src="{{ asset('assets/img/product.png') }}" onchange="mostrarImagen(event)" name="imgEvento" id="imgUsu" title="Imagen Evento" />
                                        </br>
                                        <input type="file" id="file" name="file" onchange="mostrarImagen(event)">
                                    </div>
                                    </br>
                                    <h6 class="description">Asigna la imagen</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Titulo --}}

                <div class="col-lg-18">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="evento" class="bmd-label-floating">Nombre del Evento
                                (requerido)</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value='' required>
                        </div>
                    </div>
                </div>

                {{-- Descripcion corta --}}


                <div class="col-lg-18">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">description</i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción corta del evento</label>
                            <textarea class="form-control rounded-0" value=' ' style="resize: both;" id="descripcion" name="descripcionCorta" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                {{-- Categoria --}}


                <div class="col-lg-18">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">description</i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción larga del evento</label>
                            <textarea class="form-control rounded-0" value=' ' style="resize: both;" id="descripcion" name="descripcion" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                {{-- dia --}}
                <div class="col-lg-18">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="precio" class="bmd-label-floating"> Dia
                            </label>
                            <input type="number" class="form-control" id="dia" name="dia" autocomplete="on" value=0 min="0" max="31">
                        </div>
                    </div>
                </div>
                {{-- Mes--}}
                <div class="col-lg-18">
                    <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="precio" class="bmd-label-floating"> Mes
                                (required)</label>
                            <input type="text" class="form-control" id="mes" required="true" name="mes" autocomplete="on">
                        </div>
                    </div>
                </div>
                {{-- Activo--}}
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
                            <button type="submit" class="btn btn-primary pull-right">Crear Evento</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
@endsection