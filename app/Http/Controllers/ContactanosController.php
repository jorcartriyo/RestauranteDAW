<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactanos;



class ContactanosController extends Controller
{
    protected $mensajes;

    public function __construct(Contactanos $mensajes)
    {
        $this->mensajes = $mensajes;   
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = $this->mensajes->ObtenerMensajes();
        return view('contactanos', ['mensajes' => $mensajes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'titulo' => ['required', 'string', 'max:555'],
            'mensaje'   => ['required'],
        ]);
        $mensaje =  Contactanos::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'titulo' => $request->titulo,
            'mensaje' => $request->mensaje,
        ]);

        if (!$mensaje) {
            return redirect(route('quienesSomos'))->with('warning', "Se ha producido un error al enviar el mensaje");
        }
        return redirect(route('quienesSomos'))->with('info', "Mensaje enviado con éxito");
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
        $mensaje = $this->mensajes->obtenermensajeID($id);

        if (empty($mensaje)) {
            return redirect(route('contactanos.index'))->with('warning', "No existe esa mensaje");
        }

        $this->mensajes->deletemensaje($id);
        return redirect(route('contactanos.index'))->with('info', "mensaje borrado con exito");
    }
}
