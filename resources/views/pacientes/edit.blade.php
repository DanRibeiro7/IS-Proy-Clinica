@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Arrendatario</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.update', $paciente->PacID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="PacNombre" class="form-label">Nombre</label>
            <input type="text" name="PacNombre" class="form-control" value="{{ old('PacNombre', $paciente->PacNombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="PacDni" class="form-label">DNI</label>
            <input type="text" name="PacDni" class="form-control" value="{{ old('PacDni', $paciente->PacDni) }}" required>
        </div>

        <div class="mb-3">
            <label for="PacFechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="PacFechaNacimiento" class="form-control" value="{{ old('PacFechaNacimiento', $paciente->PacFechaNacimiento) }}">
        </div>

        <div class="mb-3">
            <label for="PacCorreo" class="form-label">Correo Electrónico</label>
            <input type="email" name="PacCorreo" class="form-control" value="{{ old('PacCorreo', $paciente->PacCorreo) }}">
        </div>

        <div class="mb-3">
            <label for="PacCelular" class="form-label">Celular</label>
            <input type="text" name="PacCelular" class="form-control" value="{{ old('PacCelular', $paciente->PacCelular) }}">
        </div>

        <div class="mb-3">
            <label for="PacFechaIngreso" class="form-label">Fecha de Ingreso</label>
            <input type="date" name="PacFechaIngreso" class="form-control" value="{{ old('PacFechaIngreso', $paciente->PacFechaIngreso) }}" required>
        </div>

        <div class="mb-3">
            <label for="NivID" class="form-label">Nivel</label>
            <select name="NivID" class="form-control" required>
                <option value="">-- Seleccione --</option>
                @foreach($niveles as $nivel)
                    <option value="{{ $nivel->NivID }}" {{ old('NivID', $paciente->NivID) == $nivel->NivID ? 'selected' : '' }}>
                        {{ $nivel->NivNombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="CamID" class="form-label">Cama</label>
            <select name="CamID" class="form-control">
                <option value="">-- Sin asignar --</option>
                @foreach($camas as $cama)
                    <option value="{{ $cama->CamID }}" {{ old('CamID', $paciente->CamID) == $cama->CamID ? 'selected' : '' }}>
                        {{ $cama->CamCodigo }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
