<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $articulos;

    public function __construct(Articulos $articulos)
    {
        $this->articulos = $articulos;
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
        
        return view('articulos.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
