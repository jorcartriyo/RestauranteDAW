<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulos;
use App\Models\Categorias;
use App\Models\Fotos;



class MenuController extends Controller
{
    protected $articulos;
    protected $categorias;

    public function __construct(Articulos $articulos, Categorias $categorias)
    {
        $this->articulos = $articulos;
        $this->categorias = $categorias;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activas = 0;
        $articulos = $this->articulos->obtenerArticulos();
        $categorias = $this->categorias->obtenerCategorias();
        $fotos = Fotos:: where('seccion', 'menu')->get();

        foreach ($fotos as $foto) {
            if ($foto->activo) {
                $activas++;
            }
        }



        return view('menu', ['articulos' => $articulos, 'categorias' => $categorias, 'activas' => $activas, 'fotos'=>$fotos]);
    }
}
