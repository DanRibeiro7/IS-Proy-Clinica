@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Arrendatario</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $paciente->PacNombre }}</p>
            <p><strong>DNI:</strong> {{ $paciente->PacDni }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $paciente->PacFechaNacimiento ?? 'No registrada' }}</p>
            <p><strong>Correo:</strong> {{ $paciente->PacCorreo ?? 'No registrado' }}</p>
            <p><strong>Celular:</strong> {{ $paciente->PacCelular ?? 'No registrado' }}</p>
            <p><strong>Fecha de Ingreso:</strong> {{ $paciente->PacFechaIngreso }}</p>
            <p><strong>Fecha de Alta:</strong> {{ $paciente->PacFechaAlta ?? 'No definida' }}</p>
            <p><strong>Nivel:</strong> {{ $paciente->nivel->NivNombre ?? 'No asignado' }}</p>
            <p><strong>Cama:</strong> {{ $paciente->cama->CamCodigo ?? 'No asignada' }}</p>
        </div>
    </div>

    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</div>
@endsection
