<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUsuario',
        'fecha',
        'estado'
    ];

    protected $hidden = [
        'id'
    ];

    public function obtenerPedidos()
    {
        return Pedidos::all();
    }

    public function obtenerPedidoID($id){
        return Pedidos::find($id);
    }
    public function carrito()
    {
        return $this->belongsToMany(Carrito::class, 'idPedido', 'id');
    }
    public function usuario()
    {
        return $this->belongsToMany(User::class, 'idUsuario');
    }
}
