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

    public function carta()
    {
        $articulos = $this->articulos->obtenerArticulos();
        $categorias = $this->categorias->obtenerCategorias();



        return view('carta', ['articulos' => $articulos, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = $this->categorias->obtenerCategorias();
        return view('articulos.register', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['max:80', 'required'],
            'descripcion' => ['max:1255'],
            'precio' => ['numeric'],
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'tipo'  =>  ['required'],
            'tipo[0]'  => [function ($attribute, $value, $fail) {
                if ($value != 'carta') {
                    $fail($attribute . ' No es correcto el tipo introducido.');
                }
            }],
            'tipo[1]'  => [function ($attribute, $value, $fail) {
                if ($value != 'menu') {
                    $fail($attribute . ' No es correcto el tipo introducido.');
                }
            }],
            'activo'   => ['boolean', 'required'],
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

        if (count($request->tipo) === 2) {
            $articulo =  Articulos::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'imagen' => $fileName,
                'categoria' =>  $request->categoria,
                'precio' =>  $request->precio,
                'tipo' =>  $request->tipo[0] . $request->tipo[1],
                'activo' =>  $request->activo,
            ]);
        } else {
            $articulo =  Articulos::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'imagen' => $fileName,
                'categoria' =>  $request->categoria,
                'precio' =>  $request->precio,
                'tipo' =>  $request->tipo[0],
                'activo' =>  $request->activo,
            ]);
        }


        if (!$articulo) {
            Log::channel('baseroleslog')->info('Error al crear el articulo');
            return redirect(RouteServiceProvider::ARTICULOS)->with('warning', "Se ha producido un error al crear el Articulo");
        }
        Log::channel('baseroleslog')->info('Aticulo ' . $articulo->nombre . ' creado con exito' . $articulo);
        return redirect(RouteServiceProvider::ARTICULOS)->with('info', "Articulo creado con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articulo = $this->articulos->find($id);


        if (empty($articulo)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar un usuario que no existe');

            return redirect(route('home.index'))->with('warning', "No existe ese usuario");
        }

        return view('articulos.show')->with('articulo', $articulo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulo = $this->articulos->obtenerArticulosID($id);

        if (empty($articulo)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de un artículo que no existe');
            return redirect(route('articulos.index'))->with('warning', "No existe ese artículo");
        } else {
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $articulo->nombre);
        $categoria = $this->categorias->obtenerCategoriaID($articulo->categoria);
        $categorias = $this->categorias->obtenerCategorias();
        return view('articulos.edit')->with(['articulo' => $articulo, 'categoria' => $categoria, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => ['max:80', 'required'],
            'descripcion' => ['max:1255'],
            'precio' => ['numeric'],
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'tipo'  =>  ['required'],
            'tipo[0]'  => [function ($attribute, $value, $fail) {
                if ($value != 'carta') {
                    $fail($attribute . ' No es correcto el tipo introducido.');
                }
            }],
            'tipo[1]'  => [function ($attribute, $value, $fail) {
                if ($value != 'menu') {
                    $fail($attribute . ' No es correcto el tipo introducido.');
                }
            }],
            'activo'   => ['boolean', 'required'],
        ]);
        $ruta = '';
        $articulo = $this->articulos->obtenerArticulosID($id);
        if (empty($articulo)) {
            Log::channel('baseroleslog')->alert('Intendo de editar un articulo que no existe');
            $ruta = redirect(route('articulos.index'))->with('warning', "No existe ese articulo");
        } else {
            $input = $request->all();
            $file = $request->file;
            $tipo =   $request->tipo[0];
            if ($file != null || isset($file)) {
                $file = $file;
                $fileName = time() . "." . $file->extension();
                Storage::putFileAs('articulos', $file, $fileName);
                Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('articulos/') . ' la imagen ' . $fileName . ' para el articulo ' . $articulo->nombre);

                $input['imagen'] = $fileName = time() . "." . $file->extension();
                Storage::delete('articulos/' . $articulo->imagen);
                Storage::putFileAs('articulos', $file, $fileName);
            } else {
                $fileName = 'default';
            }

            if (count($request->tipo) === 2) {
                $articuloUpdate = $articulo->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'imagen' => $fileName,
                    'categoria' =>  $request->categoria,
                    'precio' =>  $request->precio,
                    'tipo' =>  $request->tipo[0] . $request->tipo[1],
                    'activo' =>  $request->activo,
                ]);
            } else {
                $articuloUpdate = $articulo->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'imagen' => $fileName,
                    'categoria' =>  $request->categoria,
                    'precio' =>  $request->precio,
                    'tipo' =>  $request->tipo[0],
                    'activo' =>  $request->activo,
                ]);
            }
            if (!$articuloUpdate) {
                Log::channel('baseroleslog')->warning('Error al actualizar datos del articulo ' . $articulo->nombre);

                $ruta = redirect(route('articulos.index'))->with('warning', "Se ha producido un error al actualizar el articulo");
            } else {
                Log::channel('baseroleslog')->info('Articulo ' . $articulo->nombre . ' actualizado con exito' . $articulo);

                $ruta = redirect(route('articulos.index'))->with('info', "Articulo actualizado con exito");
            }
        }
        return $ruta;
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
