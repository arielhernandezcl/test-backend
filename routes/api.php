<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoluntariosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReservacionesController;
use App\Http\Controllers\CampanasController;
use App\Http\Controllers\NuevosPuntosController;
use App\Http\Controllers\TiposVolCampController;
use App\Http\Controllers\VOluntariadosController;
use App\Http\Controllers\SolicitudesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization'); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ["auth:sanctum"]], function(){

    
    Route::get('usuario-profile',[UsuariosController::class, 'usuarioProfile']);
    Route::get('logout',[UsuariosController::class, 'logout']);
    
    Route::get('mostrar-campanas',[CampanasController::class, 'show']);
    
//Usuarios
Route::get('usuarios',[UsuariosController::class, 'show']);

Route::put('user-update/{id}',[UsuariosController::class,'updateUsuario']);

Route::delete('user-delete/{id}',[UsuariosController::class,'destroy']);

Route::get('usuarios/{id}', [UsuariosController::class, 'showID']);

Route::get('usuarios',[UsuariosController::class, 'show']);



//Reservaciones

Route::post('create-reservacion',[ReservacionesController::class, 'createReservacion']);

Route::get('reservaciones',[ReservacionesController::class, 'show']);

Route::get('reservaciones/{id}',[ReservacionesController::class, 'showID']);

Route::delete('reservaciones-delete/{id}',[ReservacionesController::class,'destroy']);

Route::put('reservaciones-update/{id}',[ReservacionesController::class,'updatereserva']);


// Route::get('voluntarios',[VoluntariosController::class, 'show']);

// Route::get('create-voluntarios',[VoluntariosController::class, 'create']);



Route::put('campañas-update/{id}', [CampañaController::class, 'updateCampaña']);

//Roles

Route::get('roles',[RolesController::class, 'show']);


//Campañas

Route::post('create-campana',[CampanasController::class,'store']);
                                                        
Route::put('campana-update/{id}',[CampanasController::class,'updateCampanas']);

Route::delete('campana-delete/{id}',[CampanasController::class,'destroy']);

Route::get('campana/{id}', [CampanasController::class, 'showID']);




//Tipo VolCamp
Route::post('create-tipoVolCamp',[TiposVolCampController::class, 'createTipo']);

Route::get('ver-tipo',[TiposVolCampController::class,'show']);

Route::delete('/delete-tipo/{id}',[TiposVolCampController::class,'destroy']);

Route::put('update-tipo/{id}',[TiposVolCampController::class,'updateTipoVC']);

Route::get('ver-tipo/{id}',[TiposVolCampController::class,'showID']);


//NuevosPuntosDeInteresSostenible
Route::post('nuevo-punto', [NuevosPuntosController::class, 'store']);

Route::get('Puntos',[NuevosPuntosController::class, 'show']);

Route::delete('/delete-punto/{id}',[NuevosPuntosController::class,'destroy']);

Route::put('update-punto/{id}', [NuevosPuntosController::class, 'update']);

Route::get('Puntos/{id}',[NuevosPuntosController::class, 'showID']);

////Voluntariados
Route::put('voluntariados-update/{id}', [VOluntariadosController::class, 'updateVOluntariado']);

Route::post('create-voluntariado',[VOluntariadosController::class,'createVOluntariados']);
                                                        
Route::put('voluntariado-update/{id}',[VOluntariadosController::class,'updateVOluntariados']);

Route::delete('voluntariado-delete/{id}',[VOluntariadosController::class,'destroy']);

Route::get('voluntariado/{id}', [VOluntariadosController::class, 'showID']);

Route::get('mostrar-voluntariado',[VOluntariadosController::class,'show']);


//Solicitudes
Route::post('crear-solicitud', [SolicitudesController::class, 'createSolicitud']);

Route::get('mostrar-solicitudes', [SolicitudesController::class, 'show']);

Route::delete('solicitud-delete/{id}', [SolicitudesController::class, 'destroy']);
});


//Login
Route::post('create-usuario',[UsuariosController::class,'createUsuarios']);
 
Route::post('login',[UsuariosController::class,'login']); 
