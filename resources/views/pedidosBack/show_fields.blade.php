<div class="card">
    <div class="card-body">
        <div class="toolbar">
            <div class="material-datatables">

                <input type="hidden" name="precioTotal" value=" {{ $precioTotal = 0 }} }">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                    width="100%" style="width:100%">
                    <thead>
                        <tr class="cabecera bg-primary text-white">
                            <th class="text-center">Nº Pedido</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Fecha del Pedido</th>
                            <th class="text-center">Comentarios</th>
                            <th class="text-center">Terminado</th>                          
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
                            <td class="text-center">{{ $pedido->comentarios }}</td>
                            <td class="text-center">
                                <div class='btn-group'>
                                    <a href="{!! route('pedidosBack.edit', [$pedido->id]) !!}" class='btn btn-link btn-info btn-just-icon like'>
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                </div>
                            </td>
                        <tr>
                    </tbody>
                </table>
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                    width="100%" style="width:100%">
                    <thead>
                        <tr class="cabecera bg-primary text-white">
                            <th class="text-center">Agregado</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Agregar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->productos as $producto)
                            <tr>
                                <td class="text-center">
                                    <div class='btn-group'>
                                     
                                        @if($producto->agregado)
                                        <a  class='btn btn-link btn-info btn-just-icon like'>
                                            <i class="fa-solid fa-cart-shopping"></i>                                        </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">{{ $producto->articulos->nombre }}</td>
                                <td class="text-center">{{ $producto->articulos->precio }}E</td>


                                {!! Form::open(['route' => ['pedidosBack.update', [$pedido->id]], 'method' => 'put']) !!}

                                <td class="text-center">{{ $producto->cantidad }}</td>
                                <td class="text-center">
                                    {{ $precio = $producto->articulos->precio * $producto->cantidad }}E
                                </td>
                                <input type="hidden" name="precioTotal"
                                    value=" {{ $precioTotal = $precio + $precioTotal }} }">
                                <input type="hidden" name="idArticulo" value="{{ $producto->id }}">
                                <td class="text-center">
                                    {!! Form::button(' <i class="fa-solid fa-cart-arrow-down"></i>   ', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-info btn-simple ',
                                        'name' => 'o',
                                    ]) !!}                                
                                 
                                </td>
                                
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-secondary ">
                            <th class="text-center" colspan="5">Precio Total
                                {{ $precioTotal }}€</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
