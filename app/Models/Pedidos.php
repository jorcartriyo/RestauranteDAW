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
        'estado',
        'comentarios' 
    ];

    protected $hidden = [
        'id'
    ];

    public function obtenerPedidos()
    {

        return Pedidos::orderBy('estado')->get();
    }

    public function obtenerPedidoID($id)
    {
        return Pedidos::find($id);
    }
    public function deletePedido($id)
    {
        $pedido= Pedidos::find($id);
        $pedido->delete();
    }
    public function productos()
    {
        return $this->hasMany(Productos::class, 'idPedido');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
