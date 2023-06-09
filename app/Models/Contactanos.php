<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactanos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'titulo',
        'mensaje'     
    ];
    
    protected $hidden = [
        'id'
    ];

    public function obtenerMensajes()
    {
        return Contactanos::all();
    }
    public function obtenerMensajeID($id)
    {
        return Contactanos::find($id);
    }
    public function deleteMensaje($id)
    {
        $mensaje = Contactanos::find($id);
        $mensaje->delete();
    }

}
