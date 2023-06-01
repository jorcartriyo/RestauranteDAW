<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPedido',
        'idArticulo',
        'cantidad',
        'agregado'
    ];

    protected $hidden = [
        'id'
    ];
    public function obtenerProductos()
    {
        return Productos::all();
    }
    public function obtenerProductosID($id)
    {
        return Productos::find($id);
    }
    public function deleteProducto($id)
    {
        $producto= Productos::find($id);
        $producto->delete();
    }
    public function pedidos()
    {
        return $this->belongsTo(Pedidos::class);
    }
    public function articulos()
    {
        return $this->belongsTo(Articulos::class, 'idArticulo');
    }
}
