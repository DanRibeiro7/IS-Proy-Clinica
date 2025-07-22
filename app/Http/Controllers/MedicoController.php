<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    // Mostrar lista de médicos
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('medicos.create');
    }

    // Guardar nuevo médico
    public function store(Request $request)
    {
        $request->validate([
            'MedNombre' => 'required|string|max:100',
            'MedEspecialidad' => 'required|string|max:100',
        ]);

        Medico::create($request->all());

        return redirect()->route('medicos.index')->with('success', 'Médico creado exitosamente.');
    }

    // Mostrar detalles de un médico
    public function show(string $id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.show', compact('medico'));
    }

    // Mostrar formulario para editar un médico
    public function edit(string $id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    // Actualizar un médico
    public function update(Request $request, string $id)
    {
        $request->validate([
            'MedNombre' => 'required|string|max:100',
            'MedEspecialidad' => 'required|string|max:100',
        ]);

        $medico = Medico::findOrFail($id);
        $medico->update($request->all());

        return redirect()->route('medicos.index')->with('success', 'Médico actualizado correctamente.');
    }

    // Eliminar un médico
    public function destroy(string $id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado correctamente.');
    }
}
