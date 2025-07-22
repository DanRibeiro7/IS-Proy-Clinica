@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pacientes</h2>

    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Registrar Paciente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Ingreso</th>
                <th>Nivel</th>
                <th>Cama</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->PacNombre }}</td>
                <td>{{ $paciente->PacDni }}</td>
                <td>{{ $paciente->PacFechaIngreso }}</td>
                <td>{{ $paciente->nivel->NivNombre ?? 'Sin nivel' }}</td>
                <td>{{ $paciente->cama->CamCodigo ?? 'Sin cama' }}</td>
                <td>
                    <a href="{{ route('pacientes.show', $paciente->PacID) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('pacientes.edit', $paciente->PacID) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente->PacID) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar paciente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
