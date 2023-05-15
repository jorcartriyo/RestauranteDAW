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
                                            <th class="disabled-sorting text-left">Imagen</th>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Titulo</th>
                                            <th class="text-center">Descripcion Corta</th>
                                            <th class="text-center">Descripcion Larga</th>
                                            <th class="text-center">Dia</th>
                                            <th class="text-center">Mes</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Editado</th>
                                            <th class="text-center">Activo</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="disabled-sorting text-left">Imagen</th>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Titulo</th>
                                            <th class="text-center">Descripcion Corta</th>
                                            <th class="text-center">Descripcion Larga</th>
                                            <th class="text-center">Dia</th>
                                            <th class="text-center">Mes</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Editado</th>
                                            <th class="text-center">Activo</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($eventos as $evento)
                                            <tr>
                                                <div class="row">
                                                    <div class="col-xs-1">
                                                        <td><img class="elevation-3 " width="125" height="125"
                                                                @if ($evento->imagen != 'default') src="{{ asset('storage/images/eventos/' . $evento->imagen) }}"
                                                        @else src="{{ asset('assets/img/product.png') }}" @endif
                                                                alt="{{ $evento->imagen }}"></td>
                                                    </div>
                                                </div>
                                                <td colspam="2" class="text-center">{{ $evento->id }}</td>
                                                <td class="text-center">{{ $evento->titulo }}</td>
                                                <td class="text-center">{{ $evento->descripcionCorta }}</td>
                                                <td class="text-center">{{ $evento->descripcion }}</td>
                                                <td class="text-center">{{ $evento->dia }}</td>
                                                <td class="text-center">{{ $evento->mes }}</td>
                                                <td class="text-center">{{ $evento->created_at }}</td>
                                                <td class="text-center">{{ $evento->updated_at }}</td>
                                                <td class="text-center">{{ $evento->activo ? 'Si' : 'No' }}</td>

                                                <td class=" text-center">
                                                    {!! Form::open(['route' => ['eventos.destroy', [$evento->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('eventos.show', [$evento->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('eventos.edit', [$evento->id]) !!}"
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
