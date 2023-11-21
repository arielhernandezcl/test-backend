<?php

namespace App\Http\Controllers;

use App\Models\Voluntarios;
use Illuminate\Http\Request;

class VoluntariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'Nombre' => 'required',
            'Apellido1' => 'required',
            'Apellido2' => 'required',
            'AñoIngreso' => 'required',
            'Carrera' => 'required',
        ]);

        $voluntario = Voluntarios::create($data);

        return response([
            "status" => 1,
            "msg" => "¡Datos agregados exitosamente!"
        ]);
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
    public function show(Voluntarios $voluntarios)
    {
        //
        $voluntarios = Voluntarios::all();
        return $voluntarios;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voluntarios $voluntarios)
    {
        //
    }
}
