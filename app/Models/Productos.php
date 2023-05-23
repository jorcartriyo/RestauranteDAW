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
        'cantidad'
    ];

    protected $hidden = [
        'id'
    ];

    public function pedidos()
    {
        return $this->belongsTo(Pedidos::class);
    }
    public function articulos()
    {
        return $this->hasMany(Articulos::class,'id');
    }
}
