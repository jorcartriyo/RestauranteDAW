<div class="content pt-6 mx-5">

    <div class="container-fluid pt-5 mx-5">
        <div class="row">
            <div class="col-md-12 mt-5">
                @include('flash-message')
                @include('layouts.agregarBtn', ['texto' => 'un pedido', 'ruta' => 'fechafront'])

                <div class="card">
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="material-datatables">                            
                                @if (count($pedidos)>0)
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Telefono</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Mesa</th>
                                                <th class="text-center">Comensales</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Telefono</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Mesa</th>
                                                <th class="text-center">Comensales</th>
                                                <th class="text-center">Acciones</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            @foreach ($pedidos as $pedido)
                                                <tr>
                                                    <td class="text-center">{{ $pedido->nombre }}</td>
                                                    <td class="text-center">{{ $pedido->email }}</td>
                                                    <td class="text-center">{{ $pedido->telefono }}</td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::create($pedido->fecha_pedido)->format('d-m-Y H:i') }}
                                                    </td>
                                                    <td class="text-center">{{ $pedido->mesas->nombre }}</td>
                                                    <td class="text-center">{{ $pedido->comensales }}</td>
                                                    <td class=" text-center">
                                                        {!! Form::open(['route' => ['front.destroy', [$pedido->id]], 'method' => 'delete']) !!}
                                                        <div class='btn-group'>
                                                            <a href="{!! route('front.show', [$pedido->id]) !!}"
                                                                class='btn btn-link btn-info btn-just-icon like'>
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="{!! route('front.edit', [$pedido->id]) !!}"
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
                                @else
                                <h1 class="text-center">No tiene ninguna pedido</h1>                              
                                @endif
                                <div class="section text-center section-landing">
                                    <div class="features">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="info">
                                                    <div class="icon icon-primary">
                                                        <i class="material-icons">chat</i>
                                                    </div>
                                                    <h4 class="info-title">Atención personalizada</h4>
                                                    <p>Atendemos rápidamente cualquier duda a través de nuestro teléfono</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info">
                                                    <div class="icon icon-success">
                                                        <i class="material-icons">verified_user</i>
                                                    </div>
                                                    <h4 class="info-title">Confirmación segura</h4>
                                                    <p>Tus pedidos serán confirmadas mediante una llamada telefónica o tu email.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info">
                                                    <div class="icon icon-danger">
                                                        <i class="material-icons">fingerprint</i>
                                                    </div>
                                                    <h4 class="info-title">Información privada</h4>
                                                    <p>Los datos de tus pedidos, solo son visibles para ti dentro de tu cuenta, nadie mas tiene acceso a la información</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sections.footer')
