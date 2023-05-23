<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;


class Articulos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'imagen',
        'precio',
        'activo',
        'recomendado',
        'tipo',
        'agotado'
    ];  

    protected $hidden = [
        'id'
    ];

    public function obtenerArticulos()
    {
        return Articulos::all();
    }

    public function obtenerArticulosID($id)
    {
        return Articulos::find($id);
    }

    public function deleteArticulo($id)
    {
        $articulo = Articulos::find($id);
        $articulo->delete();
    }
    public function categorias()
    {
        return $this->belongsTo(\App\Models\Categorias::class, 'categoria');
    }
    public function Pedidos(){
        return $this->belongsToMany(\App\Models\Carrito::class);
    }

}
