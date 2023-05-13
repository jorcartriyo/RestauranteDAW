<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categorias extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria',    
        'imagen'       
    ];

    protected $hidden = [
        'id'
    ];

    public function obtenerCategorias()
    {
        return Categorias::all();
    }
    public function obtenerCategoriaID($id)
    {
        return Categorias::find($id);
    }
    public function deleteCategoria($id)
    {
        $categoria = Categorias::find($id);
        $categoria->delete();
    }
    public function articulos(){
        return $this->hasMany(Articulos::class);
    }

}
