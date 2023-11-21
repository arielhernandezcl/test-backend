<?php

namespace App\Http\Controllers;

use App\Models\NuevosPuntos;
use Illuminate\Http\Request;

class NuevosPuntosController extends Controller
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
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'nombrePunto' => 'required',
                'descripcionPunto' => 'required',
                'ubicacionPunto' => 'required',
                'galeria' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Permitir archivos de hasta 4MB
            ]);
        
            $imagen = $request->file('galeria');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/galeria', $nombreImagen);
        
            $nuevosPuntos = new NuevosPuntos();
            $nuevosPuntos->nombrePunto = $request->input('nombrePunto');
            $nuevosPuntos->descripcionPunto = $request->input('descripcionPunto');
            $nuevosPuntos->ubicacionPunto = $request->input('ubicacionPunto');
            $nuevosPuntos->galeria = $nombreImagen;
            $nuevosPuntos->save();
        
            return response()->json([
                'status' => 1,
                'msg' => '¡Nuevo punto de interes agregado exitosamente!',
            ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(NuevosPuntos $nuevosPuntos)
    {
        $nuevosPuntos = NuevosPuntos::all();
        return $nuevosPuntos;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NuevosPuntos $nuevosPuntos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NuevosPuntos $nuevosPuntos, $id)
    {
        $request->validate([
            'nombrePunto' => 'required',
            'descripcionPunto' => 'required',
            'ubicacionPunto' => 'required',
            'galeria' => 'image|mimes:jpeg,png,jpg,gif|max:4096', // Permitir archivos de hasta 4MB
        ]);

        $nuevosPuntos = NuevosPuntos::find($id);

        if (!$nuevosPuntos) {
            return response()->json([
                'status' => 0,
                'msg' => 'Registro no encontrado',
            ]);
        }

        // Actualiza los campos si se proporcionan en la solicitud
        $nuevosPuntos->nombrePunto = $request->input('nombrePunto', $nuevosPuntos->nombrePunto);
        $nuevosPuntos->descripcionPunto = $request->input('descripcionPunto', $nuevosPuntos->descripcionPunto);
        $nuevosPuntos->ubicacionPunto = $request->input('ubicacionPunto', $nuevosPuntos->ubicacionPunto);

        // Verifica si se proporcionó una nueva imagen
        if ($request->hasFile('galeria')) {
            $imagen = $request->file('galeria');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/galeria', $nombreImagen);
            $nuevosPuntos->galeria = $nombreImagen;
        }

        $nuevosPuntos->save();

        return response()->json([
            'status' => 1,
            'msg' => '¡Datos actualizados exitosamente!',
        ]);

    }


    public function showID($id)
    {
        // Buscar un usuario por su ID
        $nuevosPuntos = NuevosPuntos::find($id);

        if (!$nuevosPuntos) {
            return response()->json(['message' => 'Punto de interes sostenible no encontrado'], 404);
        }

        return response()->json($nuevosPuntos);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NuevosPuntos $nuevosPuntos, $id)
    {
        $nuevosPuntos = NuevosPuntos::find($id);
        if(!$nuevosPuntos){
            return response()->json([
                "status" => 0,
                "msg" => "Punto no encontrado."
            ], 404);
        }
        
        $nuevosPuntos->delete();
    
        return response()->json([
            "status" => 1,
            "msg" => "Punto eliminado exitosamente."
        ]);
    }

}
