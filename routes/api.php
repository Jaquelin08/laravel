<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PuestoController;
use App\Models\Division;
use App\Models\Profesor;
use App\Models\Puesto;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[LoginController::class,'login']);

Route::post('/division/guardar', [DivisionController::class, "storeAPI"]);
Route::get('/division/eliminar', [DivisionController::class, "deleteAPI"]);

Route::post('/profesor/guardar', [ProfesorController::class, "storeAPI"]);
Route::get('/profesor/eliminar', [ProfesorController::class, "deleteAPI"]);

Route::post('/puesto/guardar', [PuestoController::class, "storeAPI"]);
Route::get('/puesto/eliminar', [PuestoController::class, "deleteAPI"]);

Route::post('/permiso/guardar', [PermisoController::class, "storeAPI"]);
Route::get('/permiso/eliminar', [PermisoController::class, "deleteAPI"]);
Route::get('/permisos', [PermisoController::class, "list"]);
Route::post('/permiso', [PermisoController::class, "indexAPI"]);