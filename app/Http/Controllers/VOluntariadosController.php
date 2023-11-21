<?php

namespace App\Http\Controllers;

use App\Models\VOluntariados;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Hash; // Import Hash
use Illuminate\Database\Eloquent\Builder;



class VOluntariadosController extends Controller
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
    public function createVOluntariados(Request $request)
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
            'inOex' => 'required',
        ]);
    
        // Crear una nueva instancia de VOluntariado y asignar valores
        $voluntariados = new VOluntariados();
        $voluntariados->nombre = $request->input('nombre');
        $voluntariados->descripcion = $request->input('descripcion');
        $voluntariados->ubicacion = $request->input('ubicacion');
        $voluntariados->fecha = $request->input('fecha');
        $voluntariados->alimentacion = $request->input('alimentacion');
        $voluntariados->capacidad = $request->input('capacidad');
        $voluntariados->tipo = $request->input('tipo');
        $voluntariados->inOex = $request->input('inOex');
    
        // Guardar el objeto VOluntariado en la base de datos
        $voluntariados->save();
    
        // Respuesta de la API
        return response()->json([
            'status' => 1,
            'msg' => '¡Datos agregados exitosamente!',
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(VOluntariados $voluntariados)
    {
        $voluntariados = VOluntariados::all();
        return $voluntariados;
    }

    public function showID($id)
    {
       
        $voluntariados = VOluntariados::find($id);

        if (!$voluntariados) {
            return response()->json(['message' => 'VOluntariado no encontrada'], 404);
        }

        return response()->json($voluntariados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VOluntariados $voluntariados)
    {
        //
    }

    public function updateVOluntariados(Request $request, $id)
    {
        
    
        $voluntariados = VOluntariados::find($id);

        if (!$voluntariados) {
            return response()->json([
                "status" => 0,
                "msg" => "VOluntariado no encontrada!"
            ], 404);
        }
        
        $voluntariados->nombre = $request->input('nombre', $voluntariados->nombre);
        $voluntariados->descripcion = $request->input('descripcion', $voluntariados->descripcion);
        $voluntariados->ubicacion = $request->input('ubicacion', $voluntariados->ubicacion);
        $voluntariados->fecha = $request->input('fecha', $voluntariados->fecha);
        $voluntariados->alimentacion = $request->input('alimentacion', $voluntariados->alimentacion);
        $voluntariados->capacidad = $request->input('capacidad', $voluntariados->capacidad);
        $voluntariados->tipo = $request->input('tipo', $voluntariados->tipo);
        $voluntariados->inOex = $request->input('inOex', $voluntariados->inOex);
        
        $voluntariados->save();
        
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizada Correctamente!"
        ]);
        
    }



    


        public function destroy($id)
    {
        $voluntariados = VOluntariados::find($id);

        if (!$voluntariados) {

            return response()->json([
                "status" => 0,
                "msg" => "VOluntariado no encontrada."
            ], 404);
        }

        
        $voluntariados->delete();

        
        return response()->json([
                "status" => 1,
                "msg" => "VOluntariado eliminada exitosamente."
        ]);

    }
}