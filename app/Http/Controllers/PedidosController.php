<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PedidosController extends Controller
{

    protected $pedidos;

    protected $productos;

    public function __construct(Pedidos $pedidos, Productos $productos)
    {

        $this->pedidos = $pedidos;
        $this->productos = $productos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos  = Pedidos::Where('idUsuario', Auth::user()->id)->orderBy('estado')->get();
        return view('pedidos')->with(['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idArticulo' => ['required'],
            'cantidad'  => ['required', function ($attribute, $value, $fail) {
                if ($value != 'carta' || $value != 'menui') {
                    $fail($attribute . ' No son correctos los datos.');
                }
            }],
            'cantidad'  => ['required', function ($attribute, $value, $fail) {
                if ($value < 1 || $value > 10) {
                    $fail($attribute . ' No es correcta la cantidad introducida.');
                }
            }],
            'comentarios' => ['string'],

        ]);


        $pedido  = Pedidos::Where([['idUsuario', Auth::user()->id], ['estado', 'iniciado']])->get();

        if ($request->cantidad > 0 && $request->cantidad < 11) {

            if (!isset($pedido) || count($pedido) == 0) {
                $pedido =  Pedidos::create([
                    'idUsuario' => Auth::user()->id
                ]);
                Productos::create([
                    'idPedido' => $pedido->id,
                    'idArticulo' => $request->idArticulo,
                    'cantidad' => $request->cantidad,
                    'comentarios' => $request->comentarios
                ]);
            } elseif (count($pedido) == 2) {
                return redirect(route('carta.index'))->with('info', "Existen dos pedidos abiertos");
            } else {

                $productoAgregado  = Productos::Where([
                    ['idArticulo', $request->idArticulo],
                    ['idPedido',  $pedido[0]->id]
                ])->get();

                if (count($productoAgregado) == 0) {
                    $producto = Productos::create([
                        'idPedido' => $pedido[0]->id,
                        'idArticulo' => $request->idArticulo,
                        'cantidad' => $request->cantidad,
                        'comentarios' => $request->comentarios
                    ]);
                } else {
                    return redirect(route($request->ruta == 'carta' ? 'carta.index' : 'menu.index'))->with('error', "Este Producto ya Existe en el Pedido");
                }
            }

            return redirect(route($request->ruta == 'carta' ? 'carta.index' : 'menu.index'))->with('info', "Producto agregado con exito");
        } else {
            return redirect(route($request->ruta == 'carta' ? 'carta.index' : 'menu.index'))->with('error', "Tienes que seleccionar una cantidad entre 1 y 10");
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pedido = $this->pedidos->obtenerPedidoID($id);
        $pedidoUpdate = $pedido->update([
            'estado' => 'pendiente'
        ]);
        if (!$pedidoUpdate) {

            return redirect(route('pedidos.index'))->with('warning', "Se ha producido un error al tramitar el pedido");
        }

        return redirect(route('pedidos.index'))->with('info', "Pedido Tramitado con exito");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'idArticulo' => ['required'],
            'cantidad'  => ['required', function ($attribute, $value, $fail) {
                if ($value < 1 || $value > 10) {
                    $fail($attribute . ' No es correcta la cantidad introducida.');
                }
            }]
        ]);


        $pedido = $this->pedidos->obtenerPedidoID($id);
        if ($pedido == null || !$pedido  || $pedido->estado != 'iniciado') {
            return redirect(route('pedidos.index'))->with('error', "No se puede modificar un pedido Cerrado");
        }
        $producto =  $this->productos->obtenerProductosID($request->idArticulo);
        $productoUpdate = $producto->update([
            'cantidad' => $request->cantidad
        ]);
        if (!$productoUpdate) {

            return redirect(route('pedidos.index'))->with('warning', "Se ha producido un error al actualizar la cantidad");
        }


        return redirect(route('pedidos.index'))->with('info', "Cantidad actualizada con exito");
    }

    public function updatePedido(Request $request, string $id)
    {
        $request->validate([
            'comentarios' => ['string']
        ]);


        $pedido = $this->pedidos->obtenerPedidoID($id);
        if ($pedido == null || !$pedido  || $pedido->estado != 'iniciado') {
            return redirect(route('pedidos.index'))->with('error', "No se puede modificar un pedido Cerrado");
        }
        $pedidoUpdate = $pedido->update([
            'comentarios' => $request->comentarios
        ]);
        if (!$pedidoUpdate) {

            return redirect(route('pedidos.index'))->with('warning', "Se ha producido un error al actualizar el comentario");
        }


        return redirect(route('pedidos.index'))->with('info', "Comentario actualizado con exito");
    }

    public function destroyProduct(string $idPedido, string $idProducto)
    {
        $pedido = $this->pedidos->obtenerPedidoID($idPedido);
        if ($pedido == null || !$pedido  || $pedido->estado != 'iniciado') {
            return redirect(route('pedidos.index'))->with('error', "No se puede modificar un pedido Cerrado");
        }
        $producto =  $this->productos->obtenerProductosID($idProducto);


        if (empty($producto)) {

            return redirect(route('pedidos.index'))->with('warning', "No existe ese producto");
        }

        $this->productos->deleteProducto($idProducto);
        return redirect(route('pedidos.index'))->with('info', "producto borrado con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = $this->pedidos->obtenerPedidoID($id);




        if (empty($pedido)) {

            return redirect(route('pedidos.index'))->with('warning', "No existe ese pedido");
        }

        $this->pedidos->deletePedido($id);
        return redirect(route('pedidos.index'))->with('info', "Pedido borrado con exito");
    }
}
