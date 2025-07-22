<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';
    protected $primaryKey = 'MedID';
    public $timestamps = false;

    protected $fillable = [
        'MedNombre',
        'MedEspecialidad',
    ];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'paciente_medico', 'MedID', 'PacID');
    }

    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class, 'medico_diagnostico', 'MedID', 'DiaID');
    }
}
