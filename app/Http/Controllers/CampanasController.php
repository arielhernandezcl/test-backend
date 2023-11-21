<?php

namespace App\Http\Controllers;

use App\Models\Campanas;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Hash; // Import Hash
use Illuminate\Database\Eloquent\Builder;



class CampanasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCampanas(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'fecha' => 'required',
            'alimentacion' => 'required',
            'capacidad' => 'required',
            'tipo' => 'required',
            'galeria' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'inOex' => 'required',
        ]);

        $imagen = $request->file('galeria');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        $imagen->storeAs('public/galeria', $nombreImagen);
    
        // Crear una nueva instancia de Campana y asignar valores
        $campanas = new Campanas();
        $campanas->nombre = $request->input('nombre');
        $campanas->descripcion = $request->input('descripcion');
        $campanas->ubicacion = $request->input('ubicacion');
        $campanas->fecha = $request->input('fecha');
        $campanas->alimentacion = $request->input('alimentacion');
        $campanas->capacidad = $request->input('capacidad');
        $campanas->tipo = $request->input('tipo');
        $campanas->galeria = $nombreImagen;
        $campanas->inOex = $request->input('inOex');
    
        // Guardar el objeto Campana en la base de datos
        $campanas->save();
    
        // Respuesta de la API
        return response()->json([
            'status' => 1,
            'msg' => '¡Datos agregados exitosamente!',
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Campanas $campanas)
    {
        $campanas = Campanas::all();
        return $campanas;
    }

    public function showID($id)
    {
       
        $campanas = Campanas::find($id);

        if (!$campanas) {
            return response()->json(['message' => 'Campaña no encontrada'], 404);
        }

        return response()->json($campanas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campanas $campanas)
    {
        //
    }

    public function updateCampanas(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'fecha' => 'required',
            'alimentacion' => 'required',
            'capacidad' => 'required',
            'tipo' => 'required',
            'galeria' => 'image|mimes:jpeg,png,jpg,gif|max:4096', // Permitir archivos de hasta 4MB
            'inOex' => 'required',
        ]);
    
        $campanas = Campanas::find($id);

        if (!$campanas) {
            return response()->json([
                "status" => 0,
                "msg" => "Campaña no encontrada!"
            ], 404);
        }
        
        $campanas->nombre = $request->input('nombre', $campanas->nombre);
        $campanas->descripcion = $request->input('descripcion', $campanas->descripcion);
        $campanas->ubicacion = $request->input('ubicacion', $campanas->ubicacion);
        $campanas->fecha = $request->input('fecha', $campanas->fecha);
        $campanas->alimentacion = $request->input('alimentacion', $campanas->alimentacion);
        $campanas->capacidad = $request->input('capacidad', $campanas->capacidad);
        $campanas->tipo = $request->input('tipo', $campanas->tipo);

        if ($request->hasFile('galeria')) {
            $imagen = $request->file('galeria');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/galeria', $nombreImagen);
            $campanas->galeria = $nombreImagen;
        }
        $campanas->inOex = $request->input('inOex', $campanas->inOex);
        $campanas->save();
        
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizada Correctamente!"
        ]);
        
    }



    


    public function destroy($id)
{
    $campanas = Campanas::find($id);

    if (!$campanas) {

        return response()->json([
            "status" => 0,
            "msg" => "Campaña no encontrada."
        ], 404);
    }

    
    $campanas->delete();

    
    return response()->json([
        "status" => 1,
        "msg" => "Campaña eliminada exitosamente."
    ]);
}
}