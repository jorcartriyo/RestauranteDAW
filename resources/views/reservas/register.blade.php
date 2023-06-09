@extends('layouts.appDashboard')
@section('title', 'Reservas')
@section('content')
    <div class="container-fluid">
        <div class="col-md-28 col-15 mr-auto ml-auto">
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('reservas.store') }}">
                @method('POST')
                @csrf

                <!--      Wizard container        -->
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <div class="card-header text-center">
                        <h2 class="card-title">
                            Crea una reserva
                        </h2>
                    </div>
                    {{-- Nombre --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">face</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="bmd-label-floating">Nombre
                                    (requerido)</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value=''
                                    required>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="bmd-label-floating"> Email
                                    (requerido)</label>
                                <input type="email" class="form-control" id="email" required="true" name="email"
                                    autocomplete="on">
                            </div>
                        </div>
                    </div>

                    {{-- Telefono --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">smartphone</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="bmd-label-floating"> Telefono
                                    (requerido)</label>
                                <input type="numeric" class="form-control" id="telefono" required="true" name="telefono"
                                    autocomplete="on" min='600000000' max='799999999'>
                            </div>
                        </div>
                    </div>
                    {{-- Fecha --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">calendar_month</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="fecha_reserva" class="bmd-label-floating"> Fecha de Reserva
                                    (requerido)</label>
                                <input type="text" class="form-control" id="fecha_reserva" required="true"
                                    name="fecha_reserva" value="{{ $fecha_reserva->format('d-m-Y H:i') }}" readonly>
                            </div>
                        </div>
                    </div>
                    {{-- Mesa --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">table_restaurant</i>
                                </span>
                            </div>
                            <div class="form-group ml-5">
                                @if ($mesasDisponibles)
                                    <select id="mesa" name="mesa">
                                        @foreach ($mesasDisponibles as $mesa)
                                            <option value="{{ $mesa->id }}">{{ $mesa->nombre }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <span>No quedan mesas disponibles para la hora seleccionada ese día</span>

                                @endif

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
                                <input type="text" class="form-control" id="comensales" required="true" name="comensales"
                                    value="{{ $datos->comensales }}" readonly>
                            </div>
                        </div>
                    </div>

                    {{-- Comentarios --}}
                    <div class="col-lg-18">
                        <div class="input-group form-control-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">description</i>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Comentarios</label>
                                {!! Form::textarea('comentarios', null, ['class' => 'form-control', 'style' => 'resize: both;', 'rows' => '10']) !!}
                            </div>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div>
                        <div class="card-footer justify-content-around">
                            <div class="ml-auto">
                                <button type="submit" {{ !$mesasDisponibles ? 'disabled' : false }}
                                    class="btn btn-primary pull-right">Crear Reserva</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
