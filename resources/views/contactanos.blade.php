@extends('layouts.appDashboard')
@section('title', 'Contactanos')
@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-md-12 mt-5 pt-5">
                    <div class="card">
                        @include('flash-message')
                        <div class="card-body">
                            <div class="toolbar">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Titulo</th>
                                                <th class="text-center">Mensaje</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Titulo</th>
                                                <th class="text-center">Mensaje</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            @foreach ($mensajes as $mensaje)
                                                <tr>
                                                    <td class="text-center">{{ $mensaje->nombre }}</td>
                                                    <td class="text-center">{{ $mensaje->email }}</td>
                                                    <td class="text-center">{{ $mensaje->titulo }}</td>
                                                    <td class="text-center">{{ $mensaje->mensaje }}</td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::create($mensaje->crated_at)->format('d-m-Y H:i') }}
                                                    </td>
                                                    <td class=" text-center">
                                                        {!! Form::open(['route' => ['contactanos.destroy', [$mensaje->id]], 'method' => 'delete']) !!}
                                                        <div class='btn-group'>


                                                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-link btn-danger btn-just-icon remove ',
                                                                'onclick' => 'return confirm("Estás seguro de eliminar este registro?")',
                                                                'name' => 'z',
                                                            ]) !!}
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
