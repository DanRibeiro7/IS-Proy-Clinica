@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Diagnósticos</h1>
    <a href="{{ route('diagnosticos.create') }}">Nuevo Diagnóstico</a>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($diagnosticos as $diagnostico)
            <tr>
                <td>{{ $diagnostico->DiaCodigo }}</td>
                <td>{{ $diagnostico->DiaDescripcion }}</td>
                <td>
                    <a href="{{ route('diagnosticos.edit', $diagnostico->DiaID) }}">Editar</a>
                    <form action="{{ route('diagnosticos.destroy', $diagnostico->DiaID) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Deseas eliminar este diagnóstico?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
