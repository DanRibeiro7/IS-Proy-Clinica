@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Médico</h1>
    <form method="POST" action="{{ route('medicos.update', $medico->MedID) }}">
        @csrf
        @method('PUT')
        <label>Nombre:</label>
        <input type="text" name="MedNombre" value="{{ $medico->MedNombre }}" required><br>

        <label>Especialidad:</label>
        <input type="text" name="MedEspecialidad" value="{{ $medico->MedEspecialidad }}"><br>

        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection
