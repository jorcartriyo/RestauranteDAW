<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fotos;
use App\Models\Articulos;
use App\Models\Categorias;

class CartaController extends Controller
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
        $fotos = Fotos:: where('seccion', 'carta')->get();

        foreach ($fotos as $foto) {
            if ($foto->activo) {
                $activas++;
            }
        }



        return view('carta', ['articulos' => $articulos, 'categorias' => $categorias, 'activas' => $activas, 'fotos'=>$fotos]);
    }
}
