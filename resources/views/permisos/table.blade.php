<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="material-datatables">

                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Ambito</th>
                                            <th class="text-center">Rol Asignado</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Actualizado</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Ambito</th>
                                            <th class="text-center">Rol Asignado</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Actualizado</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>

                                        @foreach ($permisos as $permiso)
                                            <tr>
                                                <td colspam="2" class="text-center">{{ $permiso->id }}</td>
                                                <td class="text-center">{{ $permiso->name }}</td>
                                                <td class="text-center">{{ $permiso->guard_name }}</td>

                                                <td class="text-center">
                                                    @foreach ($permiso->roles as $rol)
                                                        <div class="text-center">
                                                            {{ $rol->name }}
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">{{ $permiso->created_at }}</td>
                                                <td class="text-center">{{ $permiso->updated_at }}</td>

                                                <td class="row text-center">
                                                    {!! Form::open(['route' => ['permisos.destroy', [$permiso->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('permisos.show', [$permiso->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('permisos.edit', [$permiso->id]) !!}"
                                                            class='btn btn-link btn-warning btn-just-icon edit '>
                                                            <i class="fa fa-edit"></i>
                                                        </a>
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
