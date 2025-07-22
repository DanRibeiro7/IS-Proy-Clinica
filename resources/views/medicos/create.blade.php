@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Médico</h1>
    <form method="POST" action="{{ route('medicos.store') }}">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="MedNombre" required><br>

        <label>Especialidad:</label>
        <input type="text" name="MedEspecialidad"><br>

        <button type="submit">Guardar</button>
    </form>
</div>
@endsection
