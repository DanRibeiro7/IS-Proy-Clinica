<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    // Mostrar lista de diagnósticos
    public function index()
    {
        $diagnosticos = Diagnostico::all();
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('diagnosticos.create');
    }

    // Guardar nuevo diagnóstico
    public function store(Request $request)
    {
        $request->validate([
            'DiaNombre' => 'required|string|max:100',
            'DiaDescripcion' => 'nullable|string',
        ]);

        Diagnostico::create($request->all());

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico creado exitosamente.');
    }

    // Mostrar detalles de un diagnóstico
    public function show(string $id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        return view('diagnosticos.show', compact('diagnostico'));
    }

    // Mostrar formulario para editar un diagnóstico
    public function edit(string $id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        return view('diagnosticos.edit', compact('diagnostico'));
    }

    // Actualizar un diagnóstico
    public function update(Request $request, string $id)
    {
        $request->validate([
            'DiaNombre' => 'required|string|max:100',
            'DiaDescripcion' => 'nullable|string',
        ]);

        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->update($request->all());

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico actualizado correctamente.');
    }

    // Eliminar un diagnóstico
    public function destroy(string $id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->delete();

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico eliminado correctamente.');
    }
}
