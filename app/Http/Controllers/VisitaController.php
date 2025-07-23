<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use App\Models\Paciente;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    // Mostrar todas las visitas
    public function index()
    {
        $visitas = Visita::with('paciente')->get();
        return view('visitas.index', compact('visitas'));
    }

    // Mostrar formulario para crear nueva visita
    public function create()
    {
        $pacientes = Paciente::all();
        return view('visitas.create', compact('pacientes'));
    }

    // Guardar la nueva visita
    public function store(Request $request)
{
    $request->validate([
        'PacID' => 'required|exists:pacientes,PacID',
        // otros campos de la visita
    ]);

    // Verificar cuántas visitas tiene el paciente
    $visitasCount = \App\Models\Visita::where('PacID', $request->PacID)->count();

    if ($visitasCount >= 4) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['PacID' => 'Este paciente ya tiene el número máximo de 4 visitas.']);
    }

    // Crear la visita si no ha alcanzado el límite
    \App\Models\Visita::create($request->all());

    return redirect()->route('visitas.index')->with('success', 'Visita registrada correctamente.');
}

}
