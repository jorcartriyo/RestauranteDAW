<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Articulos;
use App\Models\Categorias;
use App\Models\Eventos;

class MainController extends Controller
{

    protected $articulos;
    protected $categorias;
    protected $eventos;

    public function __construct(Articulos $articulos, Categorias $categorias, Eventos $eventos)
    {
        $this->articulos = $articulos;
        $this->categorias = $categorias;
        $this->eventos = $eventos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recomendados = 0;  
        $activos = 0;   
        $articulos = $this->articulos->obtenerArticulos();
        $eventos = $this->eventos->obtenerEventos();
        foreach($articulos as $articulo){
            if($articulo->recomendado && $articulo->activo){
                $recomendados++;
            }
        }
       
        foreach ($eventos as $evento) {
            if ($evento->activo) {
                $activos++;
            }
        }

        return view('main', ['articulos' => $articulos, 'recomendados'=>$recomendados, 'activos' => $activos, 'eventos'=>$eventos]);
    }
}
