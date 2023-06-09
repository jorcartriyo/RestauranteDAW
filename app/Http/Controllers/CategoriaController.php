<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;




class CategoriaController extends Controller
{
    protected $categorias;


    public function __construct(Categorias $categorias)
    {

        $this->categorias = $categorias;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = $this->categorias->obtenerCategorias();
        return view('categorias.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => ['max:80', 'required']
        ]);
        $file = $request->file;
        if ($file != null || isset($file)) {
            $file = $file;
            $fileName = time() . "." . $file->extension();
            Storage::putFileAs('categorias', $file, $fileName);
            Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('categorias/') . ' la imagen ' . $fileName);
        } else {
            Log::channel('baseroleslog')->info('La categoría a crear tiene una imagen por defecto ');

            $fileName = 'default';
        }
        $categoria =  Categorias::create([
            'categoria' => $request->categoria,
            'imagen' => $fileName
        ]);

        if (!$categoria) {
            Log::channel('baseroleslog')->info('Error al crear el articulo');
            return redirect(RouteServiceProvider::CATEGORIAS)->with('warning', "Se ha producido un error al crear la categoría");
        }
        Log::channel('baseroleslog')->info('Categoría ' . $categoria->categoria . ' creada con exito' . $categoria);
        return redirect(RouteServiceProvider::CATEGORIAS)->with('info', "Categoría creada con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = $this->categorias->find($id);
        if (empty($categoria)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar una categoria que no existe');

            return redirect(route('categorias.index'))->with('warning', "No existe esa categoria");
        }
        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = $this->categorias->obtenerCategoriaID($id);
     
        if (empty($categoria)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de una categoria que no existe');
            return redirect(route('home.index'))->with('warning', "No existe esa categoria");
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $categoria->name);
        return view('categorias.edit')->with(['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoria' => ['max:80', 'required']
        ]);

        $ruta = '';
        $categoria = $this->categorias->obtenerCategoriaID($id);
        if (empty($categoria)) {
            Log::channel('baseroleslog')->alert('Intendo de editar una categoria que no existe');
            $ruta = redirect(route('categorias.index'))->with('warning', "No existe esa categoria");
        } else {
            $input = $request->all();
            $file = $request->file;
            if ($file != null || isset($file)) {
                $file = $file;
                $fileName = time() . "." . $file->extension();
                Storage::putFileAs('categorias', $file, $fileName);
                Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('categorias/') . ' la imagen ' . $fileName . ' para la categoria ' . $categoria->categoria);

                $input['imagen'] = $fileName = time() . "." . $file->extension();
                Storage::delete('categorias/' . $categoria->imagen);
                Storage::putFileAs('categorias', $file, $fileName);
            } else {
                $fileName = 'default';
            }
            dd($fileName );
            $categoriaUpdate = $categoria->update($input);
  
            if (!$categoriaUpdate) {
                Log::channel('baseroleslog')->warning('Error al actualizar datos del usuario ' . $categoria->categoria);

                $ruta = redirect(route('categorias.index'))->with('warning', "Se ha producido un error al actualizar el usuario");
            } else {
                Log::channel('baseroleslog')->info('Categoria ' . $categoria->categoria . ' actualizada con exito' . $categoria);

                $ruta = redirect(route('categorias.index'))->with('info', "Categoria actualizada con exito");
            }
        }

        return $ruta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = $this->categorias->obtenerCategoriaID($id);

        if (empty($categoria)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de borrado de una categoria que no existe');

            return redirect(route('categorias.index'))->with('warning', "No existe esa categoria");
        }
        Storage::delete('categoria/' . $categoria->imagen);
        Log::channel('baseroleslog')->info('Se ha borrado de la ruta  ' . Storage::url('categoria/') . ' la imagen de la categoria ' . $categoria->nombre);
        $this->categorias->deleteCategoria($id);
        Log::channel('baseroleslog')->info('Categoria ' . $categoria->nombre . ' borrada con exito' . $categoria);
        return redirect(route('categorias.index'))->with('info', "Categoria borrada con exito");
    }
}
