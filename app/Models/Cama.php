<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cama extends Model
{
    protected $table = 'camas';
    protected $primaryKey = 'CamID';
    public $timestamps = false;

    protected $fillable = [
        'CamCodigo',
        'NivID',
        'CamEstado',
    ];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'NivID', 'NivID');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'CamID', 'CamID');
    }
}
