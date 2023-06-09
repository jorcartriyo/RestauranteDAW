@extends('layouts.app')
@section('title', 'Pedidos')
@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-body mt-5">
                            @include('flash-message')
                            <div class="toolbar">
                                <div class="material-datatables">
                                    @if (count($pedidos) > 0)
                                        @foreach ($pedidos as $pedido)
                                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                                cellspacing="0" width="100%" style="width:100%">
                                                <input type="hidden" name="precioTotal" value=" {{ $precioTotal = 0 }} }">
                                                <thead>
                                                    <tr class="cabecera bg-primary text-white">
                                                        <th class="text-center">Nº Pedido</th>
                                                        <th class="text-center">Usuario</th>
                                                        <th class="text-center">Estado</th>
                                                        <th class="text-center">Fecha del Pedido</th>
                                                        <th class="text-center">Comentarios</th>
                                                        <th class="text-center">Acciones</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="cabecera">
                                                        <td class="text-center">{{ $pedido->id }}</td>
                                                        <td class="text-center">{{ $pedido->usuario->name }}</td>
                                                        <td class="text-center">{{ $pedido->estado }}</td>
                                                        <td class="text-center">
                                                            {{ \Carbon\Carbon::create($pedido->fecha)->format('d-m-Y H:i') }}
                                                        </td>
                                                        {!! Form::open(['route' => ['updatePedido', [$pedido->id]], 'method' => 'put']) !!}
                                                        @if ($pedido->estado == 'iniciado')
                                                            <td class="text-center">
                                                                <textarea class="form-control rounded-0" style="resize: both;" id="comentarios" name="comentarios" rows="3">{{ $pedido->comentarios }}</textarea>
                                                            </td>
                                                        @else
                                                            <td class="text-center">{{ $pedido->comentarios }}</td>
                                                        @endif
                                                        <td class="text-center">
                                                            @if ($pedido->estado == 'iniciado')
                                                                {!! Form::button('<i class="fa fa-edit"></i>', [
                                                                    'type' => 'submit',
                                                                    'class' => 'btn btn-link btn-warning btn-just-icon edit ',
                                                                    'name' => 'e',
                                                                ]) !!}
                                                            @endif

                                                            {!! Form::close() !!}

                                                            {!! Form::open(['route' => ['pedidos.destroy', [$pedido->id]], 'method' => 'delete']) !!}

                                                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-link btn-danger btn-just-icon remove ',
                                                                'onclick' => 'return confirm("Estás seguro de eliminar este pedido?")',
                                                                'name' => 'z',
                                                            ]) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    <tr>
                                                </tbody>

                                                <table id="datatables"
                                                    class="table table-striped table-no-bordered table-hover"
                                                    cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                        <tr class="cabecera bg-primary text-white">
                                                            <th class="text-center">Producto</th>
                                                            <th class="text-center">Precio</th>
                                                            <th class="text-center">Cantidad</th>
                                                            <th class="text-center">Subtotal</th>
                                                            <th class="text-center">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pedido->productos as $producto)
                                                            <tr>
                                                                <td class="text-center">{{ $producto->articulos->nombre }}
                                                                </td>
                                                                <td class="text-center">{{ $producto->articulos->precio }}E
                                                                </td>


                                                                {!! Form::open(['route' => ['pedidos.update', [$pedido->id]], 'method' => 'put']) !!}
                                                                @if ($pedido->estado == 'iniciado')
                                                                    <td class="text-center">
                                                                        <input type="number" name="cantidad" min='1'
                                                                            class="inputCantidad" max='10'
                                                                            value="{{ $producto->cantidad }}">
                                                                    </td>
                                                                @else
                                                                    <td class="text-center">{{ $producto->cantidad }}</td>
                                                                @endif
                                                                <td class="text-center">
                                                                    {{ $precio = $producto->articulos->precio * $producto->cantidad }}E
                                                                </td>
                                                                <input type="hidden" name="precioTotal"
                                                                    value=" {{ $precioTotal = $precio + $precioTotal }} }">
                                                                <input type="hidden" name="idArticulo"
                                                                    value="{{ $producto->id }}">
                                                                @if ($pedido->estado == 'iniciado')
                                                                    <td class=" text-center">
                                                                        <div class='btn_pedidos btn-group '>
                                                                            {!! Form::button('<i class="fa fa-edit"></i>', [
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-link btn-warning btn-just-icon edit ',
                                                                                'name' => 'e',
                                                                            ]) !!}

                                                                            {!! Form::close() !!}
                                                                            {!! Form::open(['route' => ['destroyProduct', [$pedido->id, $producto->id]], 'method' => 'delete']) !!}

                                                                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-link btn-danger btn-just-icon remove ',
                                                                                'onclick' => 'return confirm("Estás seguro de eliminar este registro?")',
                                                                                'name' => 'z',
                                                                            ]) !!}
                                                                        </div>

                                                                        {!! Form::close() !!}
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        @if ($pedido->estado == 'iniciado')
                                                            {!! Form::open(['route' => ['pedidos.edit', [$pedido->id]], 'method' => 'get']) !!}
                                                            {!! Form::button('<span>Tramitar El Pedido</span>', [
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-info btn-simple ',
                                                                'onclick' => 'return confirm("Estás seguro de Tramitar el Pedido? Una vez Tramitado no se podrá modificar")',
                                                                'name' => 'o',
                                                            ]) !!}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="bg-secondary ">
                                                            <th class="text-center" colspan="5">Precio Total
                                                                {{ $precioTotal }}€</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                        @endforeach
                                    @else
                                        <h1 class="text-center mt-5">No tiene ningún pedido</h1>
                                    @endif
                                    </table>
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
@endsection
