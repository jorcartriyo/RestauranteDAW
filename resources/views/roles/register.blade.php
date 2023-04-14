@extends('layouts.appDashboard')
@section('title', 'Roles')
@section('content')
    <div class="container-fluid">
        <div class="col-md-28 col-15 mr-auto ml-auto">
            <form method="POST" id="myform" enctype="multipart/form-data" action="{{ route('roles.store') }}">
                @method('POST')
                @csrf
                <!--      Wizard container        -->
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                    <div class="card-header text-center">
                        <h2 class="card-title">
                            Crea un Rol
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="about">
                                {{--        Permiso  --}}
                                <div class="col-lg-18">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating">Rol
                                                (required)</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value='' required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  Roles --}}
                            <div class="col-lg-18">
                                <div class="text-center">
                                    <h3>Asigna los Permisos</h3>
                                </div>
                                <div>
                                    <span>Permisos existentes
                                    </span> <span class="float-right">Permisos a asignar</span>
                                </div>
                                <select class="duallistbox" multiple="multiple" name="permisos[]" id="permisos">
                                    <option selected="">{{ $permisos[0]->name }}</option>
                                    @foreach ($permisos as $key => $permiso)
                                        @if ($key != 0)
                                            <option>{{ $permiso->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Submit --}}
                        <div>
                            <div class="card-footer justify-content-around">
                                <div class="ml-auto">
                                    <button type="submit" class="btn btn-primary pull-right">Crear Rol</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
