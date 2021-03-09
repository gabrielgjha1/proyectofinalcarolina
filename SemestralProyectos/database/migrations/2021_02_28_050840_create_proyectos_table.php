<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {




        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('objetivo');
            $table->text('descripcionP');
            $table->enum('nivel',['Voluntariado','Servicio Social']);
            $table->enum('modalidad',['Individual','Grupo']);
            $table->integer('cantidad_est');
            $table->string('facultades');
            $table->text('perfil_est');


            $table->text('descripcion_producto')->nullable();
            $table->integer('tiempo_estimado')->nullable();
            $table->enum('requiere_docente',['No','Si'])->nullable();

            $table->text('materiales_requeridos');
            $table->text('lugar');
            $table->text('descripcion_lugar');
            $table->text('facilidades');

            $table->string('proponete');
            $table->string('responsabilidades');
            $table->string('correo');
            $table->string('cedula');
            $table->string('telefono_oficina');
            $table->string('telefono_movil');

            $table->string('supervisor');
            $table->string('correo_supervisor');
            $table->string('telefono_oficina_supervisor');
            $table->string('telefono_movil_supervisor');

            $table->enum('estado',['Pendiente','Aprobado','Rechazado'])->default('Pendiente');


            $table->timestamps();
        });

        Schema::create('actividades', function (Blueprint $table) {

            $table->id();
            $table->text('actividad')->nullable();
            $table->integer('tiempo')->nullable();
            $table->integer('tiempo_total')->nullable();

            $table->foreignId('proyecto_id')->nullable();


            $table->timestamps();

        });

        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_participante')->nullable();
            $table->string('cedula_participante')->nullable();

            $table->foreignId('proyecto_id')->nullable();

            $table->string('telefono_participante')->nullable();
            $table->string('telefono_residencial_p')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
        Schema::dropIfExists('nivelproyectos');
        Schema::dropIfExists('facultades');
        Schema::dropIfExists('participantes');
    }
}
