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
                                            <th class="text-center">Comensales</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Localizacion</th>                                       
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Comensales</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Localizacion</th>                                       
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($mesas as $mesa)
                                            <tr>                                           
                                                <td colspam="2" class="text-center">{{ $mesa->id }}</td>
                                                <td class="text-center">{{ $mesa->nombre }}</td>
                                                <td class="text-center">{{ $mesa->comensales }}</td>
                                                <td class="text-center">{{ $mesa->estado}}</td>
                                                <td class="text-center">{{ $mesa->localizacion }}</td>                                                
                                                <td class=" text-center">
                                                    {!! Form::open(['route' => ['mesas.destroy', [$mesa->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('mesas.show', [$mesa->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('mesas.edit', [$mesa->id]) !!}"
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
