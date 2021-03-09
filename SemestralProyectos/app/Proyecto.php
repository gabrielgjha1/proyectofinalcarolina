<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{

    protected $fillable = [
        'titulo',
        'objetivo',
        'descripcionP',
        'nivel',
        'modalidad',
        'cantidad_est',
        'facultades',
        'perfil_est',
        'tiempo_estimado',
        'requiere_docente',
        'materiales_requeridos',
        'lugar',
        'descripcion_lugar',
        'facilidades',
        'proponete',
        'responsabilidades',
        'descripcion_producto',
        'correo',
        'supervisor',
        'cedula',
        'telefono_oficina',
        'telefono_movil',
        'correo_supervisor',
        'telefono_oficina_supervisor',
        'telefono_movil_supervisor',
    ];


    function actividades(){

        return $this->hasMany(Actividade::class);

    }

    function participantes(){

        return $this->hasMany(Participante::class);

    }

}
