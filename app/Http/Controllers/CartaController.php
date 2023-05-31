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
        $categorias = $this->categorias->obtenerCategorias();
        $articulosUtilizados= Articulos::Where([['tipo', 'carta'], ['activo',true]])->orWhere([['tipo', 'cartamenu',['activo',true]]])->get();
        $categoriasUtilizadas=[];
        $categoriasFiltradas=[];
        $categoriasFinales=[];
        foreach($articulosUtilizados as $articulo){
         
            $categoriasUtilizadas[] = Categorias::Where([['id',$articulo->categoria]] )->get() ;
        }

        foreach($categoriasUtilizadas as $categorias){
            $categoriasFiltradas[] = $categorias[0]->categoria;
        }
        $categoriasFinales= array_unique( $categoriasFiltradas);
      
     
        //Imagenes del carrusel
        $fotos = Fotos:: where('seccion', 'carta')->get();
        foreach ($fotos as $foto) {
            //Si hay fotos activas las agrego para mostrar o no el carrusel
            if ($foto->activo) {
                $activas++;
            }
        }



        return view('carta', ['articulos' => $articulosUtilizados, 'categorias' => $categoriasFinales, 'activas' => $activas, 'fotos'=>$fotos]);
    }
}
