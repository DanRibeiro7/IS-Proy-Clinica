@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Diagnóstico</h1>
    <form method="POST" action="{{ route('diagnosticos.store') }}">
        @csrf
        <label>Código:</label>
        <input type="text" name="DiaCodigo" required><br>

        <label>Descripción:</label>
        <input type="text" name="DiaDescripcion" required><br>

        <button type="submit">Guardar</button>
    </form>
</div>
@endsection
