@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Médicos</h1>
    <a href="{{ route('medicos.create') }}">Nuevo Médico</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->MedNombre }}</td>
                <td>{{ $medico->MedEspecialidad }}</td>
                <td>
                    <a href="{{ route('medicos.edit', $medico->MedID) }}">Editar</a> |
                    <form action="{{ route('medicos.destroy', $medico->MedID) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar este médico?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
