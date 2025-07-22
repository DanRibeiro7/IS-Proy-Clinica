@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Paciente</h2>

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="PacNombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>DNI</label>
            <input type="text" name="PacDni" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fecha de Ingreso</label>
            <input type="date" name="PacFechaIngreso" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nivel</label>
            <select name="NivID" class="form-control">
                <option value="">-- Seleccionar --</option>
                @foreach($niveles as $nivel)
                    <option value="{{ $nivel->NivID }}">{{ $nivel->NivNombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cama</label>
            <select name="CamID" class="form-control">
                <option value="">-- Seleccionar --</option>
                @foreach($camas as $cama)
                    <option value="{{ $cama->CamID }}">{{ $cama->CamCodigo }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
