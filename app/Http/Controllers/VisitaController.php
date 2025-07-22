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
            'Viscodigo' => 'required|string|max:100',
            'VisEstado' => 'required|string',
        ]);

        Visita::create([
            'PacID' => $request->PacID,
            'Viscodigo' => $request->Viscodigo,
            'VisEstado' => $request->VisEstado,
            'VisFecha_generado' => now(),
        ]);

        return redirect()->route('visitas.index')->with('success', 'Visita registrada correctamente.');
    }
}
