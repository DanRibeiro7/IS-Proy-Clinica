<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = 'visitas';
    protected $primaryKey = 'VisID';
    public $timestamps = false;

    protected $fillable = [
        'PacID',
        'Viscodigo',
        'VisFecha_generado',
        'VisEstado',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'PacID', 'PacID');
    }
}
