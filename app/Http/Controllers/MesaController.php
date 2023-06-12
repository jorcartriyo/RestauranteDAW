<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesas;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;

class MesaController extends Controller
{
    protected $mesas;

    public function __construct(Mesas $mesas)
    {
        $this->mesas = $mesas;
    }

    public function index()
    {
        $mesas = $this->mesas->obtenerMesas();

        return view('mesas.index', ['mesas' => $mesas]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('mesas.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => ['max:50', 'required'],
            'comensales' => ['numeric', 'required'],         
            'estado'   => [function ($attribute, $value, $fail) {
                if ($value != 'disponible' && $value != 'pendiente' && $value != 'reservada') {
                    $fail($attribute . ' No es correcto el estado introducida.');
                }
            }]        
        ]);

        $mesa =  mesas::create([
            'nombre' => $request->nombre,
            'comensales' => $request->comensales,
            'estado' => $request->estado
        ]);

        if (!$mesa) {
            Log::channel('baseroleslog')->info('Error al crear la mesa');
            return redirect(RouteServiceProvider::MESAS)->with('warning', "Se ha producido un error al crear la mesa");
        }
        Log::channel('baseroleslog')->info('mesa ' . $mesa->nombre . ' creada con exito' . $mesa);
        return redirect(RouteServiceProvider::MESAS)->with('info', "mesa creada con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mesa = $this->mesas->find($id);


        if (empty($mesa)) {
            Log::channel('baseroleslog')->alert('Intendo de mostrar una mesa que no existe');

            return redirect(route('mesas.index'))->with('warning', "No existe esa mesa");
        }

        return view('mesas.show')->with('mesa', $mesa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mesa = $this->mesas->obtenermesaID($id);

        if (empty($mesa)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de edición de una mesa que no existe');
            return redirect(route('mesas.index'))->with('warning', "No existe esa mesa");
        } else {
        }
        Log::channel('baseroleslog')->info('Acceso a la pantalla de edición de ' . $mesa->nombre);
        return view('mesas.edit')->with(['mesa' => $mesa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {      
        $request->validate([
            'nombre' => ['max:50', 'required'],
            'comensales' => ['numeric', 'required'],
            'estado'   => [function ($attribute, $value, $fail) {
                if ($value != 'disponible' && $value != 'pendiente' && $value != 'reservada') {
                    $fail($attribute . ' No es correcto el estado introducido.');
                }
            }],           
        ]);
   
        $ruta = '';
        $mesa = $this->mesas->obtenermesaID($id);
        if (empty($mesa)) {
            Log::channel('baseroleslog')->alert('Intendo de editar una mesa que no existe');
            $ruta = redirect(route('mesas.index'))->with('warning', "No existe esa mesa");
        } else {
            $input = $request->all();
            $mesaUpdate = $mesa->update($input);
            if (!$mesaUpdate) {
                Log::channel('baseroleslog')->warning('Error al actualizar datos de la mesa ' . $mesa->nombre);

                $ruta = redirect(route('mesas.index'))->with('warning', "Se ha producido un error al actualizar la mesa");
            } else {
                Log::channel('baseroleslog')->info('mesa ' . $mesa->nombre . ' actualizada con exito' . $mesa);

                $ruta = redirect(route('mesas.index'))->with('info', "mesa actualizada con exito");
            }
        }
        return $ruta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mesa = $this->mesas->obtenermesaID($id);

        if (empty($mesa)) {
            Log::channel('baseroleslog')->alert('Intendo de acceder a la pantalla de borrado de una mesa que no existe');

            return redirect(route('mesas.index'))->with('warning', "No existe esa mesa");
        }

        $this->mesas->deletemesa($id);
        Log::channel('baseroleslog')->info('mesa ' . $mesa->nombre . ' borrada con exito' . $mesa);
        return redirect(route('mesas.index'))->with('info', "mesa borrada con exito");
    }
}
