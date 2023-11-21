<?php

namespace App\Http\Controllers;

use App\Models\Reservaciones;
use Illuminate\Http\Request;

class ReservacionesController extends Controller
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
    public function createReservacion( Request $request )
    {
        $request->validate([
            'nombreVis' => "required",
            'apell1Vis' => "required",
            'apell2Vis' => "required",
            'cedulaVis'=>"required",
            'fechaReserva'=>"required",
            'cupo'=> "required",
            'telefonoVis'=>"required",
            'email'=> "required",
        ]);
            $reservaciones = new Reservaciones();
            $reservaciones->nombreVis = $request->nombreVis;
            $reservaciones->apell1Vis = $request->apell1Vis;
            $reservaciones->apell2Vis = $request->apell2Vis;
            $reservaciones->cedulaVis = $request->cedulaVis;
            $reservaciones->fechaReserva = $request->fechaReserva;
            $reservaciones->cupo = $request->cupo;
            $reservaciones->telefonoVis = $request->telefonoVis;
            $reservaciones->email = $request->email;
            $reservaciones->save();
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

    public function updateReserva(Request $request, $id)
{
    $reservaciones = Reservaciones::find($id);

    if (!$reservaciones) {
        return response()->json([
            "status" => 0,
            "msg" => "¡Reserva no encontrada!"
        ], 404);
    }

    $request->validate([
        'fechaReserva' => 'required',
        'Cupo' => 'required',
        'status' => 'required|in:Nueva,Terminada,Cancelada', // Valida que el valor esté entre las opciones permitidas
    ]);

    // Asignar los valores solo si están presentes en la solicitud
    $reservaciones->fechaReserva = $request->input('fechaReserva', $reservaciones->fechaReserva);
    $reservaciones->Cupo = $request->input('Cupo', $reservaciones->Cupo);
    $reservaciones->status = $request->input('status', $reservaciones->status);

    $reservaciones->save();

    return response()->json([
        "status" => 1,
        "msg" => "¡Reserva actualizada correctamente!"
    ]);
}
    /**
     * Display the specified resource.
     */
    public function show(Reservaciones $reservaciones)
    {
        $reservaciones = Reservaciones::all();
        return $reservaciones;
    }

    public function showID($id)
    {
        // Buscar un reservaciones por su ID
        $reservaciones = Reservaciones::find($id);

        if (!$reservaciones) {
            return response()->json(['message' => 'reservacion no encontrada'], 404);
        }

        return response()->json($reservaciones);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservaciones = Reservaciones::find($id);
    
        if (!$reservaciones) {
            return response()->json([
                "status" => 0,
                "msg" => "Reservacion no encontrada."
            ], 404);
        }
    
        $reservaciones->delete();
    
        return response()->json([
            "status" => 1,
            "msg" => "Reservacion eliminada exitosamente."
        ]);
    }
}
