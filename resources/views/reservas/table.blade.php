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
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Telefono</th>
                                            <th class="text-center">Fecha</th>
                                            <th class="text-center">Mesa</th>
                                            <th class="text-center">Comensales</th>
                                            <th class="text-center">Comentarios</th>
                                            <th class="text-center">Creada</th>
                                            <th class="text-center">Editada</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Telefono</th>
                                            <th class="text-center">Fecha</th>
                                            <th class="text-center">Mesa</th>
                                            <th class="text-center">Comensales</th>
                                            <th class="text-center">Comentarios</th>
                                            <th class="text-center">Creada</th>
                                            <th class="text-center">Editada</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($reservas as $reserva)
                                            <tr>
                                                <td colspam="2" class="text-center">{{ $reserva->id }}</td>
                                                <td class="text-center">{{ $reserva->nombre }}</td>
                                                <td class="text-center">{{ $reserva->email }}</td>
                                                <td class="text-center">{{ $reserva->telefono }}</td>
                                                <td class="text-center">{{  \Carbon\Carbon::create($reserva->fecha_reserva )->format('d-m-Y H:i')  }}</td>
                                                <td class="text-center">{{ $reserva->mesas->nombre }}</td>
                                                <td class="text-center">{{ $reserva->comensales }}</td>
                                                <td class="text-center">{{ $reserva->comentarios ? 'Si' : 'No' }}</td>
                                                <td class="text-center">{{ $reserva->created_at }}</td>
                                                <td class="text-center">{{ $reserva->updated_at }}</td>

                                                <td class=" text-center">
                                                    {!! Form::open(['route' => ['reservas.destroy', [$reserva->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('reservas.show', [$reserva->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('reservas.edit', [$reserva->id]) !!}"
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
