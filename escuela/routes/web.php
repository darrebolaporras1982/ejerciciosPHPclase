<?php

use App\Http\Controllers\AlumnoController;
use App\Models\Alumno;
use Illuminate\Support\Facades\Route;

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
Route::get('/alumnos',[AlumnoController::class,'listarAlumnos'])->name('listaAlumnos');
Route::get('/alumnos/{id}',[AlumnoController::class,'datosAlumno'])->name('muestraDatos');
Route::get('/alumnos/eliminarAlumno/{id}',[AlumnoController::class,'eliminar'])->name('eliminarAlumno');
Route::get('/alumnos/editarAlumno/{id}',[AlumnoController::class,'editar'])->name('editarAlumno');
