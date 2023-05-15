<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;

class FotoController extends Controller
{
    protected $fotos;

    public function __construct(Fotos $fotos)
    {
        $this->fotos = $fotos;
    }

    public function index()
    {
        $fotos = $this->fotos->obtenerFotos();
    
        return view('fotos.index', ['fotos' => $fotos]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('fotos.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'seccion' => ['max:80', 'required',function ($attribute, $value, $fail) {
                if ($value != 'inicio' && $value != 'menu' && $value != 'carta') {
                    $fail($attribute . ' No es correcta la sccion introducida.');
                }
            }],
            'texto1' => ['max:50'],
            'texto2' => ['max:50'],    
            'texto3' => ['max:50'],      
            'activo'   => ['boolean', 'required'],
            'file' => ['required'],
        ]);

        $file = $request->file;
        if ($file != null || isset($file)) {
            $file = $file;
            $fileName = time() . "." . $file->extension();
            Storage::putFileAs('fotos', $file, $fileName);
            Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('fotos/') . ' la imagen ' . $fileName);
        } else {
            Log::channel('baseroleslog')->info('La foto a crear tiene una imagen por defecto ');

            $fileName = 'default';
        }
        $foto =  Fotos::create([
            'seccion' => $request->seccion,
            'texto1' => $request->texto1,
            'texto2' => $request->texto2, 
            'texto3' => $request->texto3, 
            'imagen' => $fileName,      
            'activo' =>  $request->activo
        ]);

        if (!$foto) {
            Log::channel('baseroleslog')->info('Error al crear la foto');
            return redirect(RouteServiceProvider::FOTOS)->with('warning', "Se ha producido un error al crear la foto");
        }
        Log::channel('baseroleslog')->info('foto ' . $foto->titulo . ' creada con exito' . $foto);
        return redirect(RouteServiceProvider::FOTOS)->with('info', "foto creada con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $foto = $this->fotos->find($id);


        if (empty($foto)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar una foto que no existe');

            return redirect(route('fotos.index'))->with('warning', "No existe esa foto");
        }

        return view('fotos.show')->with('foto', $foto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $foto = $this->fotos->obtenerfotoID($id);

        if (empty($foto)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de una foto que no existe');
            return redirect(route('fotos.index'))->with('warning', "No existe esa foto");
        } else {
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $foto->titulo);
        return view('fotos.edit')->with(['foto' => $foto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'seccion' => ['max:80', 'required',function ($attribute, $value, $fail) {
                if ($value != 'inicio' && $value != 'menu' && $value != 'carta') {
                    $fail($attribute . ' No es correcto el tipo introducido.');
                }
            }],
            'texto1' => ['max:50'],
            'texto2' => ['max:50'],  
            'texto3' => ['max:50'],       
            'activo'   => ['boolean', 'required'],
        ]);
        $ruta = '';
        $foto = $this->fotos->obtenerfotoID($id);
        if (empty($foto)) {
            Log::channel('baseroleslog')->alert('Intendo de editar una foto que no existe');
            $ruta = redirect(route('fotos.index'))->with('warning', "No existe esa foto");
        } else {
            $input = $request->all();
            $file = $request->file;

            if ($file != null || isset($file)) {
                $file = $file;
                $fileName = time() . "." . $file->extension();
                Storage::putFileAs('fotos', $file, $fileName);
                Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('fotos/') . ' la imagen ' . $fileName . ' para la foto ' . $foto->titulo);

                $input['imagen'] = $fileName = time() . "." . $file->extension();
                Storage::delete('fotos/' . $foto->imagen);
                Storage::putFileAs('fotos', $file, $fileName);
            } else {
                $fileName = 'default';
            }


            $fotoUpdate = $foto->update($input);

            if (!$fotoUpdate) {
                Log::channel('baseroleslog')->warning('Error al actualizar datos de la foto ' . $foto->titulo);

                $ruta = redirect(route('fotos.index'))->with('warning', "Se ha producido un error al actualizar la foto");
            } else {
                Log::channel('baseroleslog')->info('foto ' . $foto->titulo . ' actualizada con exito' . $foto);

                $ruta = redirect(route('fotos.index'))->with('info', "foto actualizada con exito");
            }
        }
        return $ruta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foto = $this->fotos->obtenerfotoID($id);

        if (empty($foto)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de borrado de una foto que no existe');

            return redirect(route('fotos.index'))->with('warning', "No existe esa foto");
        }
        Storage::delete('fotos/' . $foto->imagen);
        Log::channel('baseroleslog')->info('Se ha borrado de la ruta  ' . Storage::url('fotos/') . ' la imagen de la foto ' . $foto->titulo);
        $this->fotos->deletefoto($id);
        Log::channel('baseroleslog')->info('foto ' . $foto->titulo . ' borrada con exito' . $foto);
        return redirect(route('fotos.index'))->with('info', "foto borrada con exito");
    }
}
