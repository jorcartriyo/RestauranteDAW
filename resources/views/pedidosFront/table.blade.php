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
                                @if (count($pedidos) > 0)
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <tr>
                                            <th class="text-center">Usuario</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Fecha del Pedido</th>
                                        </tr>
                                        <tbody>

                                            @foreach ($pedidos as $pedido)
                                                <tr>
                                                    <td class="text-center">{{ $pedido->usuario->name }}</td>
                                                    <td class="text-center">{{ $pedido->estado }}</td>

                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::create($pedido->fecha)->format('d-m-Y H:i') }}
                                                    </td>
                                                <tr>
                                                    <th class="text-center">Producto</th>
                                                    <th class="text-center">Precio</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                                @foreach ($pedido->productos as $producto)
                                                    <tr>
                                                        <td class="text-center">{{ $producto->articulos->nombre }}</td>
                                                        <td class="text-center">{{ $producto->articulos->precio }}E</td>
                                                        {!! Form::open(['route' => ['pedidos.update', [$pedido->id]], 'method' => 'put']) !!}

                                                        <td class="text-center"> <input type="number" name="cantidad"
                                                                min='0' max='10'
                                                                value="{{ $producto->cantidad }}"></td>
                                                        <input type="hidden" name="idArticulo"
                                                            value="{{ $producto->id }}">

                                                        <td class=" text-center">
                                                            {!! Form::button('<i class="fa fa-edit"></i>', [
                                                                'type' => 'submit',
                                                                'name' => 'z',
                                                            ]) !!}

                                                            {!! Form::close() !!}
                                                            {!! Form::open(['route' => ['front.destroy', [$pedido->id]], 'method' => 'delete']) !!}
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


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h1 class="text-center">No tiene ningún pedido</h1>
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
                                                    <p>Atendemos rápidamente cualquier duda a través de nuestro teléfono
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info">
                                                    <div class="icon icon-success">
                                                        <i class="material-icons">verified_user</i>
                                                    </div>
                                                    <h4 class="info-title">Confirmación segura</h4>
                                                    <p>Tus pedidos serán confirmadas mediante una llamada telefónica o
                                                        tu email.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info">
                                                    <div class="icon icon-danger">
                                                        <i class="material-icons">fingerprint</i>
                                                    </div>
                                                    <h4 class="info-title">Información privada</h4>
                                                    <p>Los datos de tus pedidos, solo son visibles para ti dentro de tu
                                                        cuenta, nadie mas tiene acceso a la información</p>
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
