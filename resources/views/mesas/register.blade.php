@extends('layouts.appDashboard')
@section('title', 'Mesas')
@section('content')

    <div class="container-fluid">
        <div class="col-md-28 col-15 mr-auto ml-auto">
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('mesas.store') }}">
                @method('POST')
                @csrf
                <!--      Wizard container        -->
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <div class="card-header text-center">
                        <h2 class="card-title">
                            Crea una Mesa
                        </h2>
                    </div>
                    {{-- Nombre --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">table_restaurant</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="bmd-label-floating">Nombre de la mesa
                                    (requerido)</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value=''
                                    required>
                            </div>
                        </div>
                    </div>
                    {{-- Comensales --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons"> escalator_warning</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="precio" class="bmd-label-floating"> Comensales
                                    (requerido)</label>
                                <input type="number" class="form-control" id="comensales" required="true" value='0'
                                    name="comensales" autocomplete="on">
                            </div>
                        </div>
                    </div>
                    {{-- Estado --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">done_outline</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="estado" class="bmd-label-floating">Estado
                                </label>
                                <input type="text" class="form-control" id="estado" name="estado" value='disponible'>
                            </div>
                        </div>
                    </div>

                    {{-- Localizacion --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">person_pin</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="localizacion" class="bmd-label-floating">Localizacion
                                </label>
                                <input type="text" class="form-control" id="localizacion" name="localizacion"
                                    value='comedor'>
                            </div>
                        </div>
                    </div>
                    {{-- Submit --}}
                    <div>
                        <div class="card-footer justify-content-around">
                            <div class="ml-auto">
                                <button type="submit" class="btn btn-primary pull-right">Crear Mesa</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
