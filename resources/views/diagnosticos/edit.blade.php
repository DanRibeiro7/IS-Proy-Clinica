@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Diagnóstico</h1>
    <form method="POST" action="{{ route('diagnosticos.update', $diagnostico->DiaID) }}">
        @csrf
        @method('PUT')

        <label>Código:</label>
        <input type="text" name="DiaCodigo" value="{{ $diagnostico->DiaCodigo }}" required><br>

        <label>Descripción:</label>
        <input type="text" name="DiaDescripcion" value="{{ $diagnostico->DiaDescripcion }}" required><br>

        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection
