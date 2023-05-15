<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcionCorta',
        'descripcion',
        'dia',
        'mes',
        'imagen',   
        'activo'      
    ];  

    protected $hidden = [
        'id'
    ];

    public function obtenerEventos()
    {
        return Eventos::all();
    }

    public function obtenerEventosID($id)
    {
        return Eventos::find($id);
    }

    public function deleteEvento($id)
    {
        $evento = Eventos::find($id);
        $evento->delete();
    }
}
