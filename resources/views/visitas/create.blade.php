@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Registrar Nueva Visita</h2>

    <form action="{{ route('visitas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="PacID" class="form-label">Paciente</label>
            <select name="PacID" id="PacID" class="form-select" required>
                <option value="">-- Seleccione --</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->PacID }}">{{ $paciente->PacNombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Viscodigo" class="form-label">Código de Visita</label>
            <input type="text" name="Viscodigo" id="Viscodigo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="VisEstado" class="form-label">Estado</label>
            <select name="VisEstado" class="form-select" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Registrar Visita</button>
        <a href="{{ route('visitas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
