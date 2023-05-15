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
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Descripcion</th>
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Editado</th>
                                            <th class="text-center">Activo</th>
                                            <th class="text-center">Recomendado</th>
                                            <th class="text-center">Agotado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="disabled-sorting text-left">Avatar</th>
                                            <th colspam="2" class="text-left"> Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Descripcion</th>
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Editado</th>
                                            <th class="text-center">Activo</th>
                                            <th class="text-center">Recomendasdo</th>
                                            <th class="text-center">Agotado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($articulos as $articulo)
                                            <tr>
                                                <div class="row">
                                                    <div class="col-xs-1">
                                                        <td><img class="elevation-3 " width="125" height="125"
                                                                @if ($articulo->imagen != 'default') src="{{ asset('storage/images/articulos/' . $articulo->imagen) }}"
                                                        @else src="{{ asset('assets/img/product.png') }}" @endif
                                                                alt="{{ $articulo->imagen }}"></td>
                                                    </div>
                                                </div>
                                                <td colspam="2" class="text-center">{{ $articulo->id }}</td>
                                                <td class="text-center">{{ $articulo->nombre }}</td>
                                                <td class="text-center">{{ $articulo->descripcion }}</td>
                                                <td class="text-center">{{ $articulo->categorias->categoria }}</td>
                                                <td class="text-center">{{ $articulo->precio }}</td>
                                                <td class="text-center">{{ $articulo->tipo }}</td>
                                                <td class="text-center">{{ $articulo->created_at }}</td>
                                                <td class="text-center">{{ $articulo->updated_at }}</td>
                                                <td class="text-center">{{ $articulo->activo ? 'Si' : 'No' }}</td>
                                                <td class="text-center">{{ $articulo->recomendado ? 'Si' : 'No' }}</td>
                                                <td class="text-center">{{ $articulo->agotado ? 'Si' : 'No' }}</td>
                                                <td class=" text-center">
                                                    {!! Form::open(['route' => ['articulos.destroy', [$articulo->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('articulos.show', [$articulo->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('articulos.edit', [$articulo->id]) !!}"
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
