@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Diagnóstico</h1>
    <form method="POST" action="{{ route('diagnosticos.store') }}">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="DiaNombre" required><br>

        <label>Descripción:</label>
        <input type="text" name="DiaDescripcion" required><br>

        <button type="submit">Guardar</button>
    </form>
</div>
@endsection
