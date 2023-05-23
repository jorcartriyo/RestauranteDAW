<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Support\Facades\Auth;

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
        return view('pedidos');
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
        $pedidoIniciado = 0;
        $arti = [];


        $pedidos  = Pedidos::Where('idUsuario', Auth::user()->id)->get();



        foreach ($pedidos as $pedido) {
            if ($pedido->estado == 'iniciado') {
                $pedidoIniciado++;
            }
            
            $pedido = $pedido->Where('estado', 'iniciado')->get();
        }

        if ($pedidoIniciado == 0) {
            $pedido =  Pedidos::create([
                'idUsuario' => Auth::user()->id
            ]);
        }
        $producto = Productos::create([
            'idPedido' => $pedido[0]->id,
            'idArticulo' => $request->idArticulo,
            'cantidad' => $request->cantidad,


        ]);

        return redirect(route('carta.index'))->with('info', "Producto agregado con exito");

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
