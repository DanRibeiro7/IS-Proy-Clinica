@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Panel de Control - Sistema de Pacientes</h1>

    <div class="row g-4">
        <!-- Pacientes -->
        <div class="col-md-4">
            <div class="card border-primary shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">👨‍⚕️ Pacientes</h5>
                    <p class="card-text">Gestiona los datos de los pacientes registrados.</p>
                    <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Ver Pacientes</a>
                </div>
            </div>
        </div>

        <!-- Médicos -->
        <div class="col-md-4">
            <div class="card border-success shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">🩺 Médicos</h5>
                    <p class="card-text">Administra los datos de los médicos de la clínica.</p>
                    <a href="{{ route('medicos.index') }}" class="btn btn-success">Ver Médicos</a>
                </div>
            </div>
        </div>

        <!-- Diagnósticos -->
        <div class="col-md-4">
            <div class="card border-warning shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">📋 Diagnósticos</h5>
                    <p class="card-text">Consulta los diagnósticos registrados.</p>
                    <a href="{{ route('diagnosticos.index') }}" class="btn btn-warning text-white">Ver Diagnósticos</a>
                </div>
            </div>
        </div>

        <!-- Asignaciones -->
        <div class="col-md-6">
            <div class="card border-info shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">📌 Asignaciones</h5>
                    <p class="card-text">Asigna médicos a pacientes para su atención.</p>
                    <a href="{{ route('asignaciones.index') }}" class="btn btn-info text-white">Ver Asignaciones</a>
                </div>
            </div>
        </div>

        <!-- Visitas -->
        <div class="col-md-6">
            <div class="card border-danger shadow h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">📅 Visitas</h5>
                    <p class="card-text">Registra las visitas médicas a los pacientes.</p>
                    <a href="{{ route('visitas.index') }}" class="btn btn-danger">Ver Visitas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
