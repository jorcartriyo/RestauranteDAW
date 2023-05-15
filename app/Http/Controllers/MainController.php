<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Articulos;
use App\Models\Categorias;
use App\Models\Eventos;
use App\Models\Fotos;

class MainController extends Controller
{

    protected $articulos;
    protected $categorias;
    protected $eventos;
    protected $fotos;


    public function __construct(Articulos $articulos, Categorias $categorias, Eventos $eventos, Fotos $fotos)
    {
        $this->articulos = $articulos;
        $this->categorias = $categorias;
        $this->eventos = $eventos;
        $this->fotos = $fotos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recomendados = 0;  
        $activos = 0;   
        $activas = 0;
        $articulos = $this->articulos->obtenerArticulos();
        $eventos = $this->eventos->obtenerEventos();
        $fotos = Fotos:: where('seccion', 'inicio')->get();
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

        foreach ($fotos as $foto) {
            if ($foto->activo) {
                $activas++;
            }
        }

        return view('main', ['articulos' => $articulos, 'recomendados'=>$recomendados,
         'activos' => $activos, 'eventos'=>$eventos,
         'activas' => $activas, 'fotos'=>$fotos
        
        ]);
    }
}
