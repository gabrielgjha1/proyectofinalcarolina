<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(ProyectosController::class);
        $this->call(ParticipantesSeeder::class);
        $this->call(ActividadesSeeder::class);
    }
}
