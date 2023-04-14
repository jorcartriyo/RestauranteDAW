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
                                            <th class="text-center">Permisos Asignados</th>
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
                                            <th class="text-center">Permisos Asignados</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Actualizado</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>

                                        @foreach ($roles as $rol)
                                            <tr>
                                                <td colspam="2" class="text-center">{{ $rol->id }}</td>
                                                <td class="text-center">{{ $rol->name }}</td>
                                                <td class="text-center">{{ $rol->guard_name }}</td>

                                                <td class="text-center">

                                                    @foreach ($rol->permisos as $permiso)
                                                        <div class="text-center">
                                                            {{ $permiso->name }}
                                                        </div>
                                                    @endforeach

                                                </td>

                                                <td class="text-center">{{ $rol->created_at }}</td>
                                                <td class="text-center">{{ $rol->updated_at }}</td>

                                                <td class="row text-center">
                                                    {!! Form::open(['route' => ['roles.destroy', [$rol->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('roles.show', [$rol->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('roles.edit', [$rol->id]) !!}"
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
</div>
