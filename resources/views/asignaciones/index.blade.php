@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Asignaciones</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($pacientes->isEmpty())
        <p>No hay pacientes asignados aún.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Médico(s) Asignado(s)</th>
                    <th>Diagnóstico(s) Asignado(s)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->PacNombre }}</td>
                        <td>
                            @if ($paciente->medicos->isEmpty())
                                <em>No asignado</em>
                            @else
                                <ul>
                                    @foreach ($paciente->medicos as $medico)
                                        <li>{{ $medico->MedNombre }} ({{ $medico->MedEspecialidad }})</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>
                            @if ($paciente->diagnosticos->isEmpty())
                                <em>No asignado</em>
                            @else
                                <ul>
                                    @foreach ($paciente->diagnosticos as $diagnostico)
                                        <li>{{ $diagnostico->DiaNombre }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('asignaciones.create') }}" class="btn btn-primary">Nueva Asignación</a>
</div>
@endsection
