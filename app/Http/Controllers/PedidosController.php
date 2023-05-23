<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class PedidosController extends Controller
{

    protected $pedidos;

    protected $user;

    public function __construct(Pedidos $pedidos, User $user)
    {

        $this->pedidos = $pedidos;
        $this->user = $user;
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


        $usuario = Auth::user()->id;

        $pedidos  = $this->pedidos->obtenerPedidos();

    

      foreach($pedidos as $pedido){
        dd($pedido->carrito );
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
