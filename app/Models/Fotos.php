<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'seccion',
        'texto1',
        'texto2',
        'texto3',
        'imagen',     
        'activo'      
    ]; 

    protected $hidden = [
        'id'
    ];

    public function obtenerFotos()
    {
        return Fotos::all();
    }

    public function obtenerFotoID($id)
    {
        return Fotos::find($id);
    }

    public function deleteFoto($id)
    {
        $foto = Fotos::find($id);
        $foto->delete();
    }
}
