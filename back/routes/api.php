<?php

use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// rutas usuarios
Route::post('login/', [UsuariosController::class, 'login']);
Route::post('register/', [UsuariosController::class, 'store']);
Route::get('usuarios/', [UsuariosController::class, 'index']);
Route::get('usuario/{id}', [UsuariosController::class, 'show']);
Route::delete('usuario/delete/{id}', [UsuariosController::class, 'destroy']);

// rutas salas
Route::get('salas/', [SalasController::class, 'index']);
Route::get('sala/{id}', [SalasController::class, 'show']);
Route::post('salas/create', [SalasController::class, 'store']);
Route::delete('salas/delete/{id}', [SalasController::class, 'destroy']);

// rutas peliculas
Route::get('peliculas/', [PeliculasController::class, 'index']);
Route::get('pelicula/{id}', [PeliculasController::class, 'show']);
Route::post('peliculas/create', [PeliculasController::class, 'store']);
Route::delete('peliculas/delete/{id}', [PeliculasController::class, 'destroy']);

Route::get('imagen/{id}', [PeliculasController::class, 'getImage']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
