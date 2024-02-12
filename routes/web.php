<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PuestoController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Divisiones
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/division/nueva', [DivisionController::class, 'view'])->name('nueva.division');
Route::post('/division/guardar', [DivisionController::class, 'store'])->name('guardar.division');
Route::get('/divisiones', [DivisionController::class, 'index'])->name('divisiones');
Route::get('/division/delete', [DivisionController::class, 'delete'])->name('delete.division');

//Profesores
Route::get('/profesores/nuevo', [ProfesorController::class, 'create'])->name('profesores.create');
Route::post('/profesores/guardar', [ProfesorController::class, 'store'])->name('profesores.store');
Route::get('/profesores/{id}/editar', [ProfesorController::class, 'edit'])->name('profesores.edit');
Route::get('/profesores/{id}/eliminar', [ProfesorController::class, 'delete'])->name('profesores.delete');
Route::get('/profesores/{id}', [ProfesorController::class, 'view'])->name('profesores.view');
Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores.index');

//Puesto
Route::get('/puesto/nuevo', [PuestoController::class, 'view'])->name('nuevo.puesto');
Route::post('/puesto/guardar', [PuestoController::class, 'store'])->name('guardar.puesto');
Route::get('/puestos', [PuestoController::class, 'index'])->name('puestos');
Route::get('/puesto/delete', [PuestoController::class, 'delete'])->name('delete.puesto');
