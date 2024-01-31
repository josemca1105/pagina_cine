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
Route::get('usuarios/', [UsuariosController::class, 'index']);
Route::get('usuario/{id}', [UsuariosController::class, 'show']);
Route::post('usuarios/create', [UsuariosController::class, 'store']);
Route::put('usuarios/update/{id}', [UsuariosController::class, 'update']);
Route::delete('usuarios/delete/{id}', [UsuariosController::class, 'destroy']);

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
