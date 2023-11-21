<?php

namespace App\Http\Controllers;

use App\Models\Solicitudes;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Implementa la lógica para mostrar una lista de solicitudes.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createSolicitud(Request $request)
    {
        $request->validate([
            'nomSoli' => 'required',
            'apellSoli1' => 'required',
            'apellSoli2' => 'required',
            'numSoli' => 'required',
            'email' => 'required|email',
            'tituloVC' => 'required',
            'descripVC' => 'required',
            'lugarVC' => 'required',
            'alimentacion'=>'required',
            'tipoSoli' => 'required',
            'fechaSoli' => 'required',
            // 'statusSoli' => 'required',
        ]);

        $solicitudes = new Solicitudes();
        $solicitudes->nomSoli = $request->nomSoli;
        $solicitudes->apellSoli1 = $request->apellSoli1;
        $solicitudes->apellSoli2 = $request->apellSoli2;
        $solicitudes->numSoli = $request->numSoli;
        $solicitudes->email = $request->email;
        $solicitudes->tituloVC = $request->tituloVC;
        $solicitudes->descripVC = $request->descripVC;
        $solicitudes->lugarVC = $request->lugarVC;
        $solicitudes->alimentacion = $request->alimentacion;
        $solicitudes->tipoSoli = $request->tipoSoli;
        $solicitudes->fechaSoli = $request->fechaSoli;
        // $solicitudes->statusSoli = $request->statusSoli;
        $solicitudes->save();

        return response([
            'status' => 1,
            'msg' => '¡Solicitud creada exitosamente!'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implementa la lógica para almacenar una nueva solicitud en el almacenamiento.
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitudes $solicitudes)
    {
        $solicitudes = Solicitudes::all();
        return $solicitudes;
    }

    public function showID($id)
    {
        $solicitudes = Solicitudes::find($id);

        if (!$solicitudes) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        return response()->json($solicitudes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitudes $solicitudes)
    {
        // Implementa la lógica para mostrar el formulario de edición de solicitudes.
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSolicitud(Request $request, Solicitudes $solicitudes, $id)
    {
        $solicitudes = Solicitudes::find($id);

        if (!$solicitudes) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Solicitud no encontrada!"
            ], 404);
        }

        $request->validate([
            'tituloVC' => 'required',
            'descripVC' => 'required',
            'lugarVC' => 'required',
            'alimentacion'=>'required',
            'tipoSoli' => 'required',
            'fechaSoli' => 'required',
            'statusSoli' => 'required',
        ]);

        $solicitudes->update([
            'tituloVC' => $request->tituloVC,
            'descripVC' => $request->descripVC,
            'lugarVC' => $request->lugarVC,
            'alimentacion' => $request->alimentacion,
            'tipoSoli' => $request->tipoSoli,
            'fechaSoli' => $request->fechaSoli,
            'statusSoli' => $request->statusSoli,
        ]);

        return response([
            'status' => 1,
            'msg' => '¡Solicitud actualizada exitosamente!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitudes $solicitudes, $id)
    {
        $solicitudes = Solicitudes::find($id);

        if (!$solicitudes) {
            return response()->json([
                "status" => 0,
                "msg" => "Solicitud no encontrada."
            ], 404);
        }

        $solicitudes->delete();

        return response([
            "status" => 1,
            "msg" => "Solicitud eliminada exitosamente."
        ]);
    }
}