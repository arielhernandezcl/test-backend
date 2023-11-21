<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
//use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash; // Import Hash
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;



class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function createUsuarios(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'apell1' => 'required',
        'apell2' => 'required',
        'cedula' => 'required',
        'numero' => 'required',
        'ocupacion' => 'required',
        // 'rol' => 'required',
        'email' => 'required|email|unique:usuarios,email', // 'usuarios' debe ser el nombre de la tabla de usuarios en tu base de datos
        'password' => 'required',
    ]);

    $usuarios = new Usuarios();
    $usuarios->nombre = $request->nombre;
    $usuarios->apell1 = $request->apell1;
    $usuarios->apell2 = $request->apell2;
    $usuarios->cedula = $request->cedula;
    $usuarios->numero = $request->numero;
    $usuarios->ocupacion = $request->ocupacion;
    // $usuarios->rol = $request->rol;
    $usuarios->email = $request->email;
    $usuarios->password = Hash::make($request->password);
    // $usuarios->status = $request->status;
    $usuarios->save();

    // Respuesta de la API
    return response([
        'status' => 1,
        'msg' => '¡Datos agregados exitosamente!'
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    // public function createUsuarios( Request $request )
    // {
    //     $request->validate([
    //         'nombre' => "required",
    //         'apell1' => "required",
    //         'apell2' => "required",
    //         'cedula'=>"required",
    //         'numero'=>"required",
    //         'ocupacion'=> "required",
    //         // 'rol'=>"required",
    //         'email'=> "required",
    //         'password'=>"required"
    //     ]);
        
           
    //         $usuarios = new Usuarios();
    //         $usuarios->nombre = $request->nombre;
    //         $usuarios->apell1 = $request->apell1;
    //         $usuarios->apell2 = $request->apell2;
    //         $usuarios->cedula = $request->cedula;
    //         $usuarios->numero = $request->numero;
    //         $usuarios->ocupacion = $request->ocupacion;
    //        // $usuarios->rol = $request->rol;
    //         $usuarios->email = $request->email;
    //         $usuarios->password = Hash::make($request->password);
    //        // $usuarios->status = $request->status;
    //         $usuarios->save();
    //         //Respuesta de la api
    //         return response([
    //             "status" => 1,
    //             "msg" => "¡Datos agregados exitosamente!"
    //         ]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        $usuarios = Usuarios::all();
        return $usuarios;
    }

    public function showID($id)
    {
        // Buscar un usuario por su ID
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }


    public function login(Request $request) {
        // Valida los datos de entrada
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
    
        // Busca al usuario por su dirección de correo electrónico
        $usuario = Usuarios::where("email", $request->email)->first();
    
        if ($usuario) { // Verifica si existe un usuario con el correo electrónico proporcionado
            if (Hash::check($request->password, $usuario->password)) { // Comprueba la contraseña utilizando Hash::check
                // Crea y devuelve un token de autenticación válido
                $token = $usuario->createToken("auth_token")->plainTextToken;
    
                return response()->json([
                    "status" => 'Success',
                    "token" => $token,    
                ]);
            } else {
                // Contraseña incorrecta
                return response()->json([
                    "status" => 0,
                    "msg" => "¡Contraseña incorrecta!"
                    
                ], 401); // 401 Unauthorized
            }
        } else {
            // Usuario no encontrado
            return response()->json([
                "status" => 0,
                "msg" => "¡Usuario no encontrado!"
            ], 404); // 404 Not Found
        }
    }

    public function logout(){

        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => 1,
            "msg"=> "Cierre de sesion",

        ]);
    }

    public function UsuarioProfile(){

        return response()->json([
            "status" => 0,
            "msg" => "acerca del usuario",
            "data" => auth()->user()
        ]);
    }
    
    public function updateUsuario(Request $request, $id)
    {
        
    
        $usuarios = Usuarios::find($id);

        if (!$usuarios) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Usuario no encontrado!" // Cambié el mensaje de error
            ], 404);
        }
        
        $request->validate([
            
            'rol' => 'required|in:Admin,Voluntario', // Valida que el valor esté entre las opciones permitidas
        ]);
        // No es necesario verificar "auth()->user()" aquí, ya que esto se usa para verificar
        // si el usuario autenticado es el propietario del recurso. Si no tienes un requisito
        // específico para verificar la propiedad del usuario, puedes omitir esto.
        
        // Asignar los valores solo si están presentes en la solicitud
        $usuarios->nombre = $request->input('nombre', $usuarios->nombre);
        $usuarios->apell1 = $request->input('apell1', $usuarios->apell1);
        $usuarios->apell2 = $request->input('apell2', $usuarios->apell2);
        $usuarios->cedula = $request->input('cedula', $usuarios->cedula);
        $usuarios->numero = $request->input('numero', $usuarios->numero);
        $usuarios->ocupacion = $request->input('ocupacion', $usuarios->ocupacion);
        $usuarios->rol = $request->input('rol', $usuarios->rol);
        $usuarios->email = $request->input('email', $usuarios->email);
        $usuarios->password = $request->input('password', $usuarios->password);
        
        $usuarios->save();
        
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizado Correctamente!"
        ]);
        
    }



    public function updateUsuarioAdmin(Request $request, Usuarios $id)
    {
        if (Usuarios::where([])){
        }else{}
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $usuarios = Usuarios::find($id);

    if (!$usuarios) {

        return response()->json([
            "status" => 0,
            "msg" => "Usuario no encontrado."
        ], 404);
    }

    
    $usuarios->delete();

    
    return response()->json([
        "status" => 1,
        "msg" => "Usuario eliminado exitosamente."
    ]);
}
}
