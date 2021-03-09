<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    protected $fillable = [
        'actividad',
        'tiempo',
        'tiempo_total',
        'proyecto_id',
    ];
    function proyecto(){

        return $this->belongsTo(Proyecto::class);

    }
}
