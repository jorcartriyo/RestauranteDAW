<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;


class Articulos extends Model
{
    use HasFactory;
    
    public function obtenerArticulos()
    {
        return Articulos::all();
    }

    public function obtenerArticulosID($id)
    {
        return Articulos::find($id);
    }


    public function categorias(){
        return $this->belongsTo(Categorias::class,'id');
    }

 

}
