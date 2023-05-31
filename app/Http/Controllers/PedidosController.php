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
        $productos = $this->productos->obtenerProductos();
        // dd($productos[0]->articulos[0]->nombre);
        return view('pedidosFront.index')->with(['pedidos' => $pedidos]);
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

        $pedido  = Pedidos::Where([['idUsuario', Auth::user()->id], ['estado', 'iniciado']])->get();

        if ($request->cantidad > 0 && $request->cantidad < 11) {

            if (!isset($pedido) || count($pedido) == 0) {
                $pedido =  Pedidos::create([
                    'idUsuario' => Auth::user()->id
                ]);
                $producto = Productos::create([
                    'idPedido' => $pedido->id,
                    'idArticulo' => $request->idArticulo,
                    'cantidad' => $request->cantidad
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
    public function edit(string $id, int $cantidad)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pedido = $this->pedidos->obtenerPedidoID($id);

        if ($pedido == null || !$pedido  || $pedido->estado != 'iniciado') {
            return redirect(route('pedidos.index'))->with('error', "Error al actualizar la cantidad");
        }
        $producto =  $this->productos->obtenerProductosID( $request->idArticulo);
        $productoUpdate = $producto->update([
            'cantidad' => $request->cantidad
        ]);
        if (!$productoUpdate) {

            return redirect(route('pedidos.index'))->with('warning', "Se ha producido un error al actualizar la cantidad");
        }
        

        return redirect(route('pedidos.index'))->with('info', "Cantidad actualizada con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
//return $this->belongsTo(\App\Models\AppUser::class, 'id_user', 'id');
//return $this->hasMany(\App\Models\AppNot::class, 'id_user');
