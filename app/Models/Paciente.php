<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'PacID';
    public $timestamps = false;

    protected $fillable = [
        'PacNombre',
        'PacDni',
        'PacFechaIngreso',
        'PacFechaAlta',
        'CamID',
        'NivID',
    ];

    // Relación con Cama
    public function cama()
    {
        return $this->belongsTo(Cama::class, 'CamID');
    }

    // Relación con Nivel
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'NivID');
    }

    // Relación con Visitas
    public function visitas()
    {
        return $this->hasMany(Visita::class, 'PacID');
    }

    // Relación muchos a muchos con Médico
    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'paciente_medico', 'PacID', 'MedID');
    }

    // Relación muchos a muchos con Diagnóstico
    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class, 'paciente_diagnostico', 'PacID', 'DiaID');
    }
}
