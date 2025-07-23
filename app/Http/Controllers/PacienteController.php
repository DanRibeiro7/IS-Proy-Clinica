<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Cama;
use App\Models\Nivel;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Mostrar todos los pacientes
    public function index()
    {
        $pacientes = Paciente::with(['cama', 'nivel'])->get();
        return view('pacientes.index', compact('pacientes'));
    }

    // Formulario para crear un nuevo paciente
    public function create()
    {
        $camas = Cama::where('CamEstado', 'disponible')->get();
        $niveles = Nivel::all();
        return view('pacientes.create', compact('camas', 'niveles'));
    }

    // Guardar nuevo paciente
    public function store(Request $request)
{
    $request->validate([
        'PacNombre' => 'required|string|max:100',
        'PacDni' => 'required|string|max:15|unique:pacientes,PacDni',
        'PacFechaIngreso' => 'required|date',
        'PacFechaNacimiento' => 'nullable|date',
        'PacCorreo' => 'nullable|email|max:100',
        'PacCelular' => 'nullable|string|max:20',
        'CamID' => 'nullable|exists:camas,CamID',
        'NivID' => 'required|exists:niveles,NivID',
    ]);

    Paciente::create($request->all());

    if ($request->CamID) {
        Cama::where('CamID', $request->CamID)->update(['CamEstado' => 'ocupada']);
    }

    return redirect()->route('pacientes.index')->with('success', 'Paciente registrado correctamente.');
}


    // Ver detalles de un paciente
    public function show($id)
    {
        $paciente = Paciente::with(['cama', 'nivel', 'visitas', 'medicos', 'diagnosticos'])->findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    // Formulario para editar un paciente
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $camas = Cama::where('CamEstado', 'disponible')->orWhere('CamID', $paciente->CamID)->get();
        $niveles = Nivel::all();
        return view('pacientes.edit', compact('paciente', 'camas', 'niveles'));
    }

    // Actualizar paciente
   public function update(Request $request, $id)
{
    $paciente = Paciente::findOrFail($id);

    $request->validate([
        'PacNombre' => 'required|string|max:100',
        'PacDni' => 'required|string|max:15|unique:pacientes,PacDni,' . $paciente->PacID . ',PacID',
        'PacFechaIngreso' => 'required|date',
        'PacFechaNacimiento' => 'nullable|date',
        'PacCorreo' => 'nullable|email|max:100',
        'PacCelular' => 'nullable|string|max:20',
        'CamID' => 'nullable|exists:camas,CamID',
        'NivID' => 'required|exists:niveles,NivID',
    ]);

    $paciente->update($request->all());

    return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
}


    // Eliminar paciente
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado.');
    }
}
