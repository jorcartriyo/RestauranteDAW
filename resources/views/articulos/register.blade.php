@extends('layouts.appDashboard')
@section('title', 'Artículos')
@section('content')
    <div class="container-fluid">
        <div class="col-md-28 col-15 mr-auto ml-auto">
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('home.store') }}">
                @method('POST')
                @csrf
                <!--      Wizard container        -->
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                    <div class="card-header text-center">
                        <h2 class="card-title">
                            Crea un Artículo
                        </h2>
                    </div>
                    {{--    Imagen Avatar --}}
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="about">
                                <div class="row justify-content-center">
                                    <div class="col-sm-4">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{ asset('assets/img/default-avatar.png') }}" name="imgUsu"
                                                    id="imgUsu" class="picture-src" title="avatar" />
                                                <input type="file" id="file" name="file"
                                                    onchange="mostrarImagen(event)">
                                            </div>
                                            <h6 class="description">Asigna la imagne</h6>
                                        </div>
                                    </div>
                                </div>
                                {{--        Usuario --}}


                                <div class="col-lg-18">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating">Nombre del Artículo
                                                (required)</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value='' required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  email --}}
                            <div class="col-lg-18">
                                <div class="input-group form-control-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">Descripcion
                                            (required)</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value='' required autocomplete="on">
                                    </div>

                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="col-lg-18">
                                <div class="input-group form-control-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">key</i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="bmd-label-floating"> Categoria
                                            (required)</label>
                                        <input type="password" class="form-control" id="password" required="true"
                                            value='' minLength="8" name="password" autocomplete="on">
                                    </div>
                                </div>
                            </div>
                            {{-- Confirmar Password --}}
                            <div class="col-lg-18">
                                <div class="input-group form-control-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">key</i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmar_password" class="bmd-label-floating"> Precio
                                            (required)</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            required="true" value='' name="password_confirmation" autocomplete="on">
                                    </div>
                                </div>
                            </div>
                            {{-- Confirmar Password --}}
                            <div class="col-lg-18">
                                <div class="input-group form-control-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">key</i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmar_password" class="bmd-label-floating"> Tipo
                                            (required)</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            required="true" value='' name="password_confirmation"
                                            autocomplete="on">
                                    </div>
                                </div>
                            </div>

                                         {{-- Confirmar Password --}}
                                         <div class="col-lg-18">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">key</i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirmar_password" class="bmd-label-floating"> Activo
                                                        (required)</label>
                                                    <input type="password" class="form-control" id="password_confirmation"
                                                        required="true" value='' name="password_confirmation"
                                                        autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                            
                            {{--  Roles --}}
                            <div class="col-lg-18">
                                <div class="text-center">
                                    <h3>Asigna los Roles</h3>
                                </div>
                                <select class="duallistbox" multiple="multiple" name="rol[]">
                             </select>
                                <span id="mensaje"></span>
                            </div>
                        </div>
                        {{-- Submit --}}
                        <div>
                            <div class="card-footer justify-content-around">
                                <div class="ml-auto">
                                    <button type="submit" class="btn btn-primary pull-right">Crear Art</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection