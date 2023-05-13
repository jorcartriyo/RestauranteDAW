<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulos;
use App\Models\Categorias;

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
        $articulos = $this->articulos->obtenerArticulos();
        $categorias = $this->categorias->obtenerCategorias();



        return view('menu', ['articulos' => $articulos, 'categorias' => $categorias]);
    }
}
