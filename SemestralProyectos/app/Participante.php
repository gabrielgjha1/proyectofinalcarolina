<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'nombre_participante',
        'cedula_participante',
        'telefono_participante',
        'telefono_residencial_p',
        'proyecto_id',
    ];

    function proyecto(){

        return $this->belongsTo(Proyecto::class);

    }
}
