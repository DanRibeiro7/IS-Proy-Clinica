<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $pacientes = \App\Models\Paciente::with(['medicos', 'diagnosticos'])->get();
    return view('asignaciones.index', compact('pacientes'));
}


    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $pacientes = \App\Models\Paciente::all();
    $medicos = \App\Models\Medico::all();
    $diagnosticos = \App\Models\Diagnostico::all();

    return view('asignaciones.create', compact('pacientes', 'medicos', 'diagnosticos'));
}


    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'paciente_id' => 'required|exists:pacientes,PacID',
        'medicos' => 'required|array',
        'diagnosticos' => 'required|array',
    ]);

    $paciente = \App\Models\Paciente::findOrFail($request->paciente_id);

    $paciente->medicos()->sync($request->medicos);
    $paciente->diagnosticos()->sync($request->diagnosticos);

    return redirect()->route('asignaciones.create')->with('success', 'Asignación realizada correctamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
