<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Mesas;
use Carbon\Carbon;
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

    public function fecha()
    {
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek(2);

        return view('reservas.fecha', compact('min_date', 'max_date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function datos(Request $request)
    {

        $mesas = $this->mesas->obtenerMesas();
        $reservas = $this->reservas->obtenerreservas();
        $datos = $request;
        $fecha_reserva = Carbon::create($request->fecha_reserva);
        $mesasLibres = [];
        $mesasOcupadas = [];
        $horas = Carbon::create($fecha_reserva)->format('H:m');


        if ($horas <= '14:00' ||  $horas >= '17:00' && $horas <= '20:00' ||  $horas >= '24:00') {
            return redirect(route('fecha', ['ruta' => $request->ruta]))->with('warning', "Debe de seleccionar una hora entre las 14:00-17:00 para el almuerzo y las 20:00-24:00 para la cena");
        }

        foreach ($mesas as $mesa) {
            if ($request->comensales == $mesa->comensales || $request->comensales + 1 == $mesa->comensales) {

                if ($mesa->estado == 'disponible') {
                    array_push($mesasLibres, $mesa);
                }
            }
        }

        foreach ($reservas as $reserva) {
            if (
                Carbon::create($reserva->fecha_reserva)->format('Y-m-d H:m') == Carbon::create($request->fecha_reserva)->format('Y-m-d H:m')
                || Carbon::create($reserva->fecha_reserva)->subHours(1)->format('Y-m-d H:m') == Carbon::create($request->fecha_reserva)->format('Y-m-d H:m')
                || Carbon::create($reserva->fecha_reserva)->addHours(1)->format('Y-m-d H:m') == Carbon::create($request->fecha_reserva)->format('Y-m-d H:m')

            ) {

                $mesaOcupada = $this->mesas->obtenerMesaID($reserva->mesa);


                array_push($mesasOcupadas, $mesaOcupada);
            }
        }
        $mesasDisponibles = array_diff($mesasLibres, $mesasOcupadas);
       

        if ($request->ruta == 'front') {
            return view('reserva', ['mesasDisponibles' => $mesasDisponibles, 'datos' => $datos, 'fecha_reserva' => $fecha_reserva]);
        } else {
            return view('reservas.register', ['mesasDisponibles' => $mesasDisponibles, 'datos' => $datos, 'fecha_reserva' => $fecha_reserva]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('reservas.show');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fecha =  Carbon::create($request->fecha_reserva);

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
            'fecha_reserva' =>  $fecha,
            'mesa' =>  $request->mesa,
            'comensales' =>  $request->comensales,
            'comentarios' => $request->comentarios
        ]);

        if (!$reserva) {
            Log::channel('baseroleslog')->info('Error al crear la reserva');
            return redirect(RouteServiceProvider::RESERVAS)->with('warning', "Se ha producido un error al crear la reserva");
        }
        if ($request->ruta == 'front') {
            return redirect(route('reserva', ['email' => $request->email]))->with('info', "reserva creada con éxito");
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
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek(2);
        return view('reservas.edit')->with(['reserva' => $reserva, 'min_date' => $min_date, 'max_date' => $max_date]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => ['max:50', 'required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'numeric'],
            'fecha_reserva' => ['required', 'date'],
            'mesa' => ['required'],
            'comensales' => ['required', 'numeric'],
            'comentarios' => ['string']

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
        $this->reservas->deleteReserva($id);
        Log::channel('baseroleslog')->info('reserva ' . $reserva->nombre . ' borrada con exito' . $reserva);
        return redirect(route('reservas.index'))->with('info', "reserva borrada con exito");
    }
}
