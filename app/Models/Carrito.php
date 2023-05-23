<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPedido',
        'idArticulo',
        'cantidad'            
    ];  

    protected $hidden = [
        'id'
    ];

    public function Pedidos(){
        return $this->hasMany(\App\Models\Pedidos::class);
    }
    public function Articulos(){
        return $this->hasMany(\App\Models\Articulos::class);
    }

}
