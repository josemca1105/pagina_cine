<?php

use App\Http\Controllers\PeliculasController;
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

Route::get('peliculas/', [PeliculasController::class, 'index']);
Route::get('pelicula/{id}', [PeliculasController::class, 'show']);
Route::post('peliculas/create', [PeliculasController::class, 'store']);
Route::delete('peliculas/delete/{id}', [PeliculasController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
