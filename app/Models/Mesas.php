<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'comensales',
        'estado'           
    ];  

    protected $hidden = [
        'id'
    ];
 
    public function obtenerMesas()
    {
        return Mesas::all();
    }

    public function obtenerMesaID($id)
    {
        return Mesas::find($id);
    }

    public function deleteMesa($id)
    {
        $mesa = Mesas::find($id);
        $mesa->delete();
    }
    public function reservas(){
        return $this->hasMany(Reservas::class);
    }


  
}
