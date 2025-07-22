@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Paciente</h2>

    <form action="{{ route('pacientes.update', $paciente->PacID) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="PacNombre" class="form-control" value="{{ $paciente->PacNombre }}" required>
        </div>

        <div class="mb-3">
            <label>DNI</label>
            <input type="text" name="PacDni" class="form-control" value="{{ $paciente->PacDni }}" required>
        </div>

        <div class="mb-3">
            <label>Fecha de Ingreso</label>
            <input type="date" name="PacFechaIngreso" class="form-control" value="{{ $paciente->PacFechaIngreso }}" required>
        </div>

        <div class="mb-3">
            <label>Nivel</label>
            <select name="NivID" class="form-control">
                @foreach($niveles as $nivel)
                    <option value="{{ $nivel->NivID }}" {{ $paciente->NivID == $nivel->NivID ? 'selected' : '' }}>
                        {{ $nivel->NivNombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cama</label>
            <select name="CamID" class="form-control">
                @foreach($camas as $cama)
                    <option value="{{ $cama->CamID }}" {{ $paciente->CamID == $cama->CamID ? 'selected' : '' }}>
                        {{ $cama->CamCodigo }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
