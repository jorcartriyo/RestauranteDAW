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
                                            <th class="text-center">Categoria</th>                               
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Editado</th>      
                                            <th class="text-center">Acciones</th>                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="disabled-sorting text-left">Imagen</th>     
                                            <th colspam="2" class="text-left"> Id</th>                             
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Creado</th>
                                            <th class="text-center">Editado</th>
                                            <th class="text-center">Acciones</th>                                  
                                        </tr>
                                    </tfoot>
                                    <tbody>
                           
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <div class="row">
                                                    <div class="col-xs-1">
                                                        <td><img class="elevation-3 " width="125" height="125"
                                                                @if ($categoria->imagen != 'default') src="{{ asset('storage/images/categorias/' . $categoria->imagen) }}"                                                             
                                                                @else src="{{ asset('assets/img/product.png') }}" @endif
                                                                alt="{{ $categoria->imagen }}"></td>
                                                    </div>
                                                </div>
                                                <td colspam="2" class="text-center">{{ $categoria->id }}</td>
                                                <td class="text-center">{{ $categoria->categoria }}</td>
                                                <td class="text-center">{{ $categoria->created_at }}</td> 
                                                <td class="text-center">{{ $categoria->updated_at }}</td>                                        
                                       
                                                <td class=" text-center">
                                                    {!! Form::open(['route' => ['categorias.destroy', [$categoria->id]], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('categorias.show', [$categoria->id]) !!}"
                                                            class='btn btn-link btn-info btn-just-icon like'>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{!! route('categorias.edit', [$categoria->id]) !!}"
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
