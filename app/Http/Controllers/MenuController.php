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
        $categorias = $this->categorias->obtenerCategorias();
        $articulosUtilizados= Articulos::Where([['tipo', 'menu'], ['activo',true]])->orWhere([['tipo', 'cartamenu',['activo',true]]])->get();
        $categoriasUtilizadas=[];
        $categoriasFiltradas=[];
      

        foreach($articulosUtilizados as $articulo){
         
            $categoriasUtilizadas[] = Categorias::Where([['id',$articulo->categoria]] )->get() ;
        }

        foreach($categoriasUtilizadas as $categorias){
            $categoriasFiltradas[] = $categorias[0]->categoria;
        }    
        foreach($categoriasUtilizadas as $categorias){
            $categoriasFiltradas[] = $categorias[0]->categoria;
        }
        $categoriasFinalesDesordenadas= array_unique( $categoriasFiltradas);
        sort($categoriasFinalesDesordenadas, SORT_REGULAR);
       
        
        foreach( $categoriasFinalesDesordenadas as $categoriaFinal) {
            $categoriasOrdenadas[] = substr( $categoriaFinal,1); 
        }     
      
        //Imagenes del carrusel
        $fotos = Fotos:: where('seccion', 'carta')->get();
        foreach ($fotos as $foto) {
            //Si hay fotos activas las agrego para mostrar o no el carrusel
            if ($foto->activo) {
                $activas++;
            }
        }



        return view('menu', ['articulos' => $articulosUtilizados, 'categorias' => $categoriasOrdenadas, 'activas' => $activas, 'fotos' => $fotos]);
    }
}
