<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('participantes')->insert([


            'nombre_participante' => "Juan Torres",
            'cedula_participante' => "8-978-788",
            'proyecto_id' => 1,
            'telefono_participante' => "33334444",
            'telefono_residencial_p' => "3333444",
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ]);

        DB::table('participantes')->insert([


            'nombre_participante' => "Daniel Torres",
            'cedula_participante' => "8-978-588",
            'proyecto_id' => 1,
            'telefono_participante' => "33334444",
            'telefono_residencial_p' => "3333444",
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ]);


    }
}
