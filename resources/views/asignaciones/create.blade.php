@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Asignar Médico(s) y Diagnóstico(s) a un Paciente</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('asignaciones.store') }}" method="POST">
        @csrf

        <!-- Selección del paciente -->
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="">-- Selecciona un paciente --</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->PacID }}">{{ $paciente->PacNombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Selección múltiple de médicos -->
        <div class="mb-3">
            <label for="medicos" class="form-label">Médico(s)</label>
            <select name="medicos[]" id="medicos" class="form-control" multiple required>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->MedID }}">{{ $medico->MedNombre }} - {{ $medico->MedEspecialidad }}</option>
                @endforeach
            </select>
            <small>Pulsa Ctrl (o Cmd) para seleccionar varios.</small>
        </div>

        <!-- Selección múltiple de diagnósticos -->
        <div class="mb-3">
            <label for="diagnosticos" class="form-label">Diagnóstico(s)</label>
            <select name="diagnosticos[]" id="diagnosticos" class="form-control" multiple required>
                @foreach($diagnosticos as $diagnostico)
                    <option value="{{ $diagnostico->DiaID }}">{{ $diagnostico->DiaNombre }}</option>
                @endforeach
            </select>
            <small>Pulsa Ctrl (o Cmd) para seleccionar varios.</small>
        </div>

        <button type="submit" class="btn btn-primary">Asignar</button>
    </form>
</div>
@endsection
