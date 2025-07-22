@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Visitas de Pacientes</h2>

    <!-- Botón para registrar nueva visita -->
    <a href="{{ route('visitas.create') }}" class="btn btn-primary mb-3">Registrar Nueva Visita</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Código de Visita</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->paciente->PacNombre }}</td>
                    <td>{{ $visita->Viscodigo }}</td>
                    <td>{{ $visita->VisFecha_generado }}</td>
                    <td>{{ ucfirst($visita->VisEstado) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
