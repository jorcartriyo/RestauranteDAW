<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Mesas;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;


class ReservaController extends Controller
{
    protected $reservas;
    protected $mesas;

    public function __construct(Reservas $reservas, Mesas $mesas)
    {
        $this->reservas = $reservas;
        $this->mesas = $mesas;
    }

    public function index()
    {
        $reservas = $this->reservas->obtenerreservas();

        return view('reservas.index', ['reservas' => $reservas]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mesas = $this->mesas->obtenerMesas();
        $disponibles = 0;
        foreach($mesas as $mesa){
            if($mesa->estado == 'disponible'){
                $disponibles++;
            }
        }
        //MANDO RESERVAS
       
        return view('reservas.register', ['mesas' => $mesas, 'disponibles' => $disponibles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => ['max:50', 'required'],       
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'numeric'],
            'fecha_reserva' => ['required', 'date'],
            'mesa' => ['required'],
            'comensales' => ['required', 'numeric']
        ]);

        $reserva =  reservas::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'fecha_reserva' =>  $request->fecha_reserva,
            'mesa' =>  $request->mesa,
            'comensales' =>  $request->comensales
        ]);
        $mesa= $this->mesas->obtenerMesaID($request->mesa);
        $mesa->update([           
            'estado' => 'pendiente'   
        ]);


        if (!$reserva) {
            Log::channel('baseroleslog')->info('Error al crear la reserva');
            return redirect(RouteServiceProvider::RESERVAS)->with('warning', "Se ha producido un error al crear la reserva");
        }
        Log::channel('baseroleslog')->info('reserva ' . $reserva->nombre . ' creada con exito' . $reserva);
        return redirect(RouteServiceProvider::RESERVAS)->with('info', "reserva creada con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva = $this->reservas->find($id);


        if (empty($reserva)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar una reserva que no existe');

            return redirect(route('reservas.index'))->with('warning', "No existe esa reserva");
        }

        return view('reservas.show')->with('reserva', $reserva);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reserva = $this->reservas->obtenerreservaID($id);

        if (empty($reserva)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de una reserva que no existe');
            return redirect(route('reservas.index'))->with('warning', "No existe esa reserva");
        } else {
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $reserva->nombre);
        return view('reservas.edit')->with(['reserva' => $reserva]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => ['max:50', 'required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'tel'],
            'fecha_reserva' => ['required', 'date'],
            'mesa' => ['required', Mesas::class],
            'comensales' => ['required', 'numeric']
        ]);
        $ruta = '';
        $reserva = $this->reservas->obtenerreservaID($id);
        if (empty($reserva)) {
            Log::channel('baseroleslog')->alert('Intendo de editar una reserva que no existe');
            $ruta = redirect(route('reservas.index'))->with('warning', "No existe esa reserva");
        } else {
            $input = $request->all();
            $reservaUpdate = $reserva->update($input);

            if (!$reservaUpdate) {
                Log::channel('baseroleslog')->warning('Error al actualizar datos de la reserva ' . $reserva->nombre);

                $ruta = redirect(route('reservas.index'))->with('warning', "Se ha producido un error al actualizar la reserva");
            } else {
                Log::channel('baseroleslog')->info('reserva ' . $reserva->nombre . ' actualizada con exito' . $reserva);

                $ruta = redirect(route('reservas.index'))->with('info', "reserva actualizada con exito");
            }
        }
        return $ruta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = $this->reservas->obtenerreservaID($id);

        if (empty($reserva)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de borrado de una reserva que no existe');

            return redirect(route('reservas.index'))->with('warning', "No existe esa reserva");
        }
        $mesa= $this->mesas->obtenerMesaID($reserva->mesa);     
    
        $this->reservas->deletereserva($id);
        $mesa->update([           
            'estado' => 'disponible'   
        ]);
        Log::channel('baseroleslog')->info('reserva ' . $reserva->nombre . ' borrada con exito' . $reserva);
        return redirect(route('reservas.index'))->with('info', "reserva borrada con exito");
    }
}
