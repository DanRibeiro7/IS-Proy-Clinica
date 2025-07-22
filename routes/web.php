<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\DiagnosticoController;


Route::get('/', function () {
    return view('welcome');
});

// Rutas RESTful para pacientes (index, create, store, show, edit, update, destroy)
Route::resource('pacientes', PacienteController::class);
Route::resource('visitas', VisitaController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('diagnosticos', DiagnosticoController::class);

Route::get('/asignaciones/create', [AsignacionController::class, 'create'])->name('asignaciones.create');
Route::post('/asignaciones', [AsignacionController::class, 'store'])->name('asignaciones.store');
Route::get('/asignaciones', [AsignacionController::class, 'index'])->name('asignaciones.index');

