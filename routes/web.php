<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\DiagnosticoController;

// Redireccionar al dashboard como inicio
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Vista principal del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutas RESTful para recursos principales
Route::resource('pacientes', PacienteController::class);
Route::resource('visitas', VisitaController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('diagnosticos', DiagnosticoController::class);

// Rutas específicas para asignaciones
Route::get('/asignaciones', [AsignacionController::class, 'index'])->name('asignaciones.index');
Route::get('/asignaciones/create', [AsignacionController::class, 'create'])->name('asignaciones.create');
Route::post('/asignaciones', [AsignacionController::class, 'store'])->name('asignaciones.store');
