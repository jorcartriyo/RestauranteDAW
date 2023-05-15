<?php

namespace App\Models;
use App\Models\Mesas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'fecha_reserva',
        'mesa',   
        'comensales'      
    ];  

    protected $hidden = [
        'id'
    ];

    public function obtenerReservas()
    {
        return Reservas::all();
    }

    public function obtenerReservasID($id)
    {
        return Reservas::find($id);
    }

    public function deleteReserva($id)
    {
        $reserva = Reservas::find($id);
        $reserva->delete();
    }
    public function mesas()
    {
        return $this->belongsTo(Mesas::class, 'mesa');
    }

}
