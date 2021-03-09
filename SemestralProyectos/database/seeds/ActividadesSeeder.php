<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('actividades')->insert([


            'actividad'=> "Distribuir roles",
            'tiempo'=>5,
            'tiempo_total'=> null,
            'proyecto_id'=> 1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ]);

        DB::table('actividades')->insert([



            'actividad'=> "Distribuir Tareas",
            'tiempo'=> 2,
            'tiempo_total'=> null,
            'proyecto_id'=> 1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ]);


    }
}
