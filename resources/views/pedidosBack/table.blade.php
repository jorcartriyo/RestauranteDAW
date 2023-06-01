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
                                            <th class="text-center">Nº Pedido</th>
                                            <th class="text-center">Usuario</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Fecha del Pedido</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">Nº Pedido</th>
                                            <th class="text-center">Usuario</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Fecha del Pedido</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($pedidos as $pedido)
                                            @if ($pedido->estado != 'iniciado')
                                                <tr>
                                                    <td colspam="2" class="text-center">{{ $pedido->id }}</td>
                                                    <td class="text-center">{{ $pedido->usuario->name }}</td>
                                                    <td class="text-center">{{ $pedido->estado }}</td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::create($pedido->fecha)->format('d-m-Y H:i') }}
                                                    </td>
                                                    <td class=" text-center">
                                                        {!! Form::open(['route' => ['pedidosBack.destroy', [$pedido->id]], 'method' => 'delete']) !!}
                                                        <div class='btn-group'>
                                                            <a href="{!! route('pedidosBack.show', [$pedido->id]) !!}"
                                                                class='btn btn-link btn-info btn-just-icon like'>
                                                                <i class="fa fa-eye"></i>
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
                                            @endif
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
