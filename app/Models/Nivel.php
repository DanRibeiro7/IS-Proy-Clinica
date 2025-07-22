<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';
    protected $primaryKey = 'NivID';
    public $timestamps = false;

    protected $fillable = [
        'NivNombre',
    ];

    public function camas()
    {
        return $this->hasMany(Cama::class, 'NivID', 'NivID');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'NivID', 'NivID');
    }
}
