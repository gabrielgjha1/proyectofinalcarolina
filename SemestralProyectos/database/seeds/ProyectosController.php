<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProyectosController extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('proyectos')->insert([

            'titulo'=> "Proyecto 1",
            'objetivo'=> "Completar El semestral",
            'descripcionP'=> "Proyecto semestral final de ingenieria web",
            'nivel'=> "Servicio Social",
            'modalidad'=> "Grupo",
            'cantidad_est'=> 15,
            'facultades'=> "FCyT, FIC, FIE",
            'perfil_est'=> "Perfil",
            'descripcion_producto'=> "Descripcion del producto",
            'tiempo_estimado'=> "21",
            'requiere_docente'=> "No",
            'materiales_requeridos'=> "Materiales Requeridos",
            'lugar'=> "Lugar",
            'descripcion_lugar'=> "Descripcion Del Lugar",
            'facilidades'=> "FAcilidaddes que ofrece",
            'proponete'=> "Proponete",
            'responsabilidades'=> "Responsable",
            'correo'=> "gabrielhernandezgjha1@gmail.com",
            'cedula'=> "8-954-1994",
            'telefono_oficina'=> "3333444",
            'telefono_movil'=> "33334444",
            'supervisor'=> "Juan Arosemena",
            'correo_supervisor'=> "JuanArosemena1@gmail.com",
            'telefono_oficina_supervisor'=> "3333444",
            'telefono_movil_supervisor'=> "33334444",
            'estado'=> "Pendiente",
            'created_at'=> "2021-03-01 22:50:47",
            'updated_at'=> "2021-03-01 22:50:47",
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);




    }
}


