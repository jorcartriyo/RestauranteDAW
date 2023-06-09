<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $eventos;

    public function __construct(Eventos $eventos)
    {
        $this->eventos = $eventos;
    }

    public function index()
    {
        $eventos = $this->eventos->obtenerEventos();
    
        return view('eventos.index', ['eventos' => $eventos]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('eventos.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => ['max:80', 'required'],
            'descripcionCorta' => ['max:125'],
            'descripcion' => ['max:1255'],
            'dia' => ['numeric'],
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'mes'   => ['string', 'max:80', 'required'],
            'activo'   => ['boolean', 'required'],
        ]);

        $file = $request->file;
        if ($file != null || isset($file)) {
            $file = $file;
            $fileName = time() . "." . $file->extension();
            Storage::putFileAs('eventos', $file, $fileName);
            Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('eventos/') . ' la imagen ' . $fileName);
        } else {
            Log::channel('baseroleslog')->info('El evento a crear tiene una imagen por defecto ');

            $fileName = 'default';
        }
        $evento =  Eventos::create([
            'titulo' => $request->titulo,
            'descripcionCorta' => $request->descripcionCorta,
            'descripcion' => $request->descripcion,
            'imagen' => $fileName,
            'dia' =>  $request->dia,
            'mes' =>  $request->mes,
            'activo' =>  $request->activo
        ]);

        if (!$evento) {
            Log::channel('baseroleslog')->info('Error al crear el evento');
            return redirect(RouteServiceProvider::EVENTOS)->with('warning', "Se ha producido un error al crear el Evento");
        }
        Log::channel('baseroleslog')->info('Evento ' . $evento->titulo . ' creado con exito' . $evento);
        return redirect(RouteServiceProvider::EVENTOS)->with('info', "Evento creado con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = $this->eventos->find($id);


        if (empty($evento)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar un evento que no existe');

            return redirect(route('eventos.index'))->with('warning', "No existe ese evento");
        }

        return view('eventos.show')->with('evento', $evento);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evento = $this->eventos->obtenerEventosID($id);

        if (empty($evento)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de un eventop que no existe');
            return redirect(route('eventos.index'))->with('warning', "No existe ese evento");
        } else {
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $evento->titulo);
        return view('eventos.edit')->with(['evento' => $evento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'titulo' => ['max:80', 'required'],
            'descripcionCorta' => ['max:125'],
            'descripcion' => ['max:1255'],
            'dia' => ['numeric'],
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'mes'   => ['string', 'max:80', 'required'],
            'activo'   => ['boolean', 'required'],
        ]);

        $ruta = '';
        $evento = $this->eventos->obtenerEventosID($id);
        if (empty($evento)) {
            Log::channel('baseroleslog')->alert('Intendo de editar un evento que no existe');
            $ruta = redirect(route('eventos.index'))->with('warning', "No existe ese evento");
        } else {
            $input = $request->all();
            $file = $request->file;

            if ($file != null || isset($file)) {
                $file = $file;
                $fileName = time() . "." . $file->extension();
                Storage::putFileAs('eventos', $file, $fileName);
                Log::channel('baseroleslog')->info('Agregado a la ruta  ' . Storage::url('eventos/') . ' la imagen ' . $fileName . ' para el evento ' . $evento->titulo);

                $input['imagen'] = $fileName = time() . "." . $file->extension();
                Storage::delete('eventos/' . $evento->imagen);
                Storage::putFileAs('eventos', $file, $fileName);
            } else {
                $fileName = 'default';
            }


            $eventoUpdate = $evento->update($input);

            if (!$eventoUpdate) {
                Log::channel('baseroleslog')->warning('Error al actualizar datos del evetno ' . $evento->titulo);

                $ruta = redirect(route('eventos.index'))->with('warning', "Se ha producido un error al actualizar el evento");
            } else {
                Log::channel('baseroleslog')->info('Evento ' . $evento->titulo . ' actualizado con exito' . $evento);

                $ruta = redirect(route('eventos.index'))->with('info', "Evento actualizado con exito");
            }
        }
        return $ruta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = $this->eventos->obtenerEventosID($id);

        if (empty($evento)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de borrado de un evento que no existe');

            return redirect(route('eventos.index'))->with('warning', "No existe ese evento");
        }
        Storage::delete('eventos/' . $evento->imagen);
        Log::channel('baseroleslog')->info('Se ha borrado de la ruta  ' . Storage::url('eventos/') . ' la imagen del evento ' . $evento->titulo);
        $this->eventos->deleteEvento($id);
        Log::channel('baseroleslog')->info('Evento ' . $evento->titulo . ' borrado con exito' . $evento);
        return redirect(route('eventos.index'))->with('info', "Evento borrado con exito");
    }
}
