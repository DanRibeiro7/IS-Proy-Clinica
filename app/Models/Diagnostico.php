<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnosticos';
    protected $primaryKey = 'DiaID';
    public $timestamps = false;

    protected $fillable = [
        'DiaNombre',
        'DiaDescripcion',
    ];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'paciente_diagnostico', 'DiaID', 'PacID');
    }

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'medico_diagnostico', 'DiaID', 'MedID');
    }
}
