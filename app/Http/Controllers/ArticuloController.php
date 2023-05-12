<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Laravel\Telescope\Telescope;
use App\Providers\RouteServiceProvider;



class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $articulos;
    protected $categorias;

    public function __construct(Articulos $articulos, Categorias $categorias)
    {
        $this->articulos = $articulos;
        $this->categorias = $categorias;
    }

    public function index()
    {
        $articulos = $this->articulos->obtenerArticulos();



        return view('articulos.index', ['articulos' => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = $this->categorias->obtenerCategoria();
        return view('articulos.register',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => [ 'string', 'max:255'],
        
            'descripcion' => ['string','max:1255'],
            'precio' => ['numeric'],         
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],

            'activo'   =>['boolean'],
        ]);

        $file = $request->file;
        if ($file != null || isset($file)) {
            $file = $file;
            $fileName = time() . "." . $file->extension();
            Storage::putFileAs('articulos', $file, $fileName);
            Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('articulos/') . ' la imagen ' . $fileName);
        } else {
            Log::channel('baseroleslog')->info('El producto a crear tiene una imagen por defecto ');

            $fileName = 'default';
        }

        $articulo =  Articulos::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $fileName,
            'categoria' =>  $request->categoria,
            'precio' =>  $request->precio,
            'tipo' =>  $request->tipo,
            'activo' =>  $request->activo,
        ]);

        if (!$articulo) {
            Log::channel('baseroleslog')->info('Error al crear el articulo');
            return redirect(RouteServiceProvider::Articulos)->with('warning', "Se ha producido un error al crear el Articulo");
        }
        Log::channel('baseroleslog')->info('Aticulo ' . $articulo->nombre . ' creado con exito' . $articulo);
        return redirect(RouteServiceProvider::Articulos)->with('info', "Articulo creado con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = $this->articulos->obtenerArticulosID($id);

        if (empty($articulo)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de borrado de un artículo que no existe');

            return redirect(route('articulos.index'))->with('warning', "No existe ese artículo");
        }
        Storage::delete('articulos/' . $articulo->imagen);
        Log::channel('baseroleslog')->info('Se ha borrado de la ruta  ' . Storage::url('articulos/') . ' la imagen del artículo ' . $articulo->nombre);
        $this->articulos->deleteArticulo($id);
        Log::channel('baseroleslog')->info('Artículo ' . $articulo->nombre . ' borrado con exito' . $articulo);
        return redirect(route('articulos.index'))->with('info', "Artículo borrado con exito");
    }
    
}
