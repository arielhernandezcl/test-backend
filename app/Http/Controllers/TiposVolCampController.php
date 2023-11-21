<?php

namespace App\Http\Controllers;

use App\Models\tiposVolCamp;
use Illuminate\Http\Request;

class TiposVolCampController extends Controller
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
    public function createTipo(Request $request)
    {
        $request->validate([
            'nombreTipo' => "required",
        ]);
            $tiposVolCamp = new tiposVolCamp();
            $tiposVolCamp->nombreTipo = $request->nombreTipo;
            $tiposVolCamp->save();
            //Respuesta de la api
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
    public function show(tiposVolCamp $tiposVolCamp)
    {
        $tiposVolCamp = tiposVolCamp::all();
        return $tiposVolCamp;
    }

    public function showID(tiposVolCamp $tiposVolCamp, $id){
        $tiposVolCamp = tiposVolCamp::find($id);

        if (!$tiposVolCamp) {
            return response()->json(['message' => 'reservacion no encontrada'], 404);
        }

        return response()->json($tiposVolCamp);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tiposVolCamp $tiposVolCamp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTipoVC(Request $request, tiposVolCamp $tiposVolCamp , $id)
    {
        $tiposVolCamp = tiposVolCamp::find($id);

        if (!$tiposVolCamp) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Tipo no encontrado!"
            ], 404);
        }
    
        $request->validate([
            'nombreTipo' => 'required', 
        ]);
    
        // Asignar los valores solo si están presentes en la solicitud
        $tiposVolCamp->nombreTipo = $request->input('nombreTipo', $tiposVolCamp->nombreTipo);
    
        $tiposVolCamp->save();
    
        return response()->json([
            "status" => 1,
            "msg" => "¡Tipo actualizado correctamente!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tiposVolCamp $tiposVolCamp, $id)
    {
        $tiposVolCamp = tiposVolCamp::find($id);
    
        if (!$tiposVolCamp) {
            return response()->json([
                "status" => 0,
                "msg" => "Tipo no encontrado."
            ], 404);
        }
    
        $tiposVolCamp->delete();
    
        return response()->json([
            "status" => 1,
            "msg" => "Tipo eliminado exitosamente."
        ]);
    }
}
