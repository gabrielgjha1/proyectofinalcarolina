<?php

namespace Tests\Feature;

use App\User;
use App\Proyecto;
use App\Actividade;
use Tests\TestCase;
use App\Participante;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostProyectoTest extends TestCase
{

    use RefreshDatabase;

    /** @test  */
    public function Test_Guardar_Proyecto()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/proyectos',[
              'titulo'=> "Proyecto 1",'objetivo'=> "Completar El semestral",'descripcionP'=> "Proyecto semestral final de ingenieria web",
              'nivel'=> "Servicio Social", 'modalidad'=> "Grupo", 'cantidad_est'=> 15, 'facultades'=>['FCyT', 'FIC', 'FIE'],
              'perfil_est'=> "Perfil", 'descripcion_producto'=> "Descripcion del producto", 'tiempo_estimado'=> 21,
              'requiere_docente'=> "No", 'materiales_requeridos'=> "Materiales Requeridos", 'lugar'=> "Lugar",
              'descripcion_lugar'=> "Descripcion  Lugar", 'facilidades'=> "FAcilidaddes ", 'proponete'=> "Proponete",
              'responsabilidades'=> "Responsable", 'correo'=> "JuanArosemena1@gmail.com", 'cedula'=> "8-954-1994",
              'telefono_oficina'=> "3333444", 'telefono_movil'=> "33334444", 'supervisor'=> "Juan Arosemena",
              'correo_supervisor'=> "JuanArosemena1@gmail.com", 'telefono_oficina_supervisor'=> "3333444",'telefono_movil_supervisor'=> "33334444",
              //participantes
              'actividad'=> ["Distribuir roles"],'tiempo'=> [5],
              //Actividades
              'nombre_participante' => ['Daniel Torres'],'cedula_participante' => ["8-978-588"],'telefono_participante' => ["33334444"],
              'telefono_residencial_p' => ["3333444"],
          ]);
          $response->assertRedirect('/');//verificamos Que todo salga bien
          $this->assertCount(1,Proyecto::all());//verificamos Que los datos se hayan guardado en proyecto
          $this->assertCount(1,Actividade::all());//verificamos Que los datos se hayan guardado en Actividades
          $this->assertCount(1,Participante::all());//verificamos Que los datos se hayan guardado en participante

          //traemos los datos guardados en la base de datos para verificarlos que se hayan agragado correctamente
          $proyecto = Proyecto::first(); $actividades = Actividade::first(); $participantes = Participante::first();
          //dd($actividades);
          $this->assertSame([$proyecto->titulo,$proyecto->objetivo,$proyecto->descripcionP],['Proyecto 1','Completar El semestral','Proyecto semestral final de ingenieria web']);
          $this->assertSame([$proyecto->nivel,$proyecto->modalidad,$proyecto->cantidad_est],['Servicio Social','Grupo',15]);
          $this->assertSame([$proyecto->facultades,$proyecto->perfil_est,$proyecto->descripcion_producto],['FCyT, FIC, FIE','Perfil','Descripcion del producto']);
          $this->assertSame([$proyecto->tiempo_estimado,$proyecto->requiere_docente,$proyecto->materiales_requeridos],[21,'No','Materiales Requeridos']);
          $this->assertSame([$proyecto->lugar,$proyecto->descripcion_lugar,$proyecto->facilidades],['Lugar','Descripcion  Lugar','FAcilidaddes']);
          $this->assertSame([$proyecto->proponete,$proyecto->responsabilidades,$proyecto->correo],['Proponete','Responsable','JuanArosemena1@gmail.com']);
          $this->assertSame([$proyecto->cedula,$proyecto->telefono_oficina,$proyecto->telefono_movil],['8-954-1994','3333444','33334444']);
          $this->assertSame([$proyecto->supervisor,$proyecto->correo_supervisor,$proyecto->telefono_oficina_supervisor],['Juan Arosemena','JuanArosemena1@gmail.com','3333444']);

          $this->assertSame([$actividades->actividad,$actividades->tiempo],['Distribuir roles',5]);

          $this->assertSame([$participantes->nombre_participante,$participantes->cedula_participante],['Daniel Torres','8-978-588']);
          $this->assertSame([$participantes->telefono_participante,$participantes->telefono_residencial_p],['33334444','3333444']);





    }

     /** @test  */
     public function Test_Listar_Proyecto()
     {

        $this->withoutExceptionHandling();

        //pruebas dobles utilizando fakes para llenar la informacion del metodo store de proyectos
        factory(Proyecto::class,       1)->create();
        factory(Participante::class,   1)->create();
        factory(Actividade::class,     1)->create();

        $response = $this->get('/proyectos');
        $response->assertOk();
        $proyectos =  Proyecto::all();
        // dd($proyectos);
        $response->assertViewIs('proyecto.index');
        $response->assertViewHas('proyectos',$proyectos);


     }

      /** @test  */
      public function Test_Listar_Un_Proyecto()
      {

         $this->withoutExceptionHandling();

         //pruebas dobles utilizando fakes para llenar la informacion del metodo store de proyectos
         $proyecto =  factory(Proyecto::class)->create();
         factory(Participante::class)->create();
         factory(Actividade::class)->create();

         $response = $this->get("/proyectos/$proyecto->id/edit");
         $response->assertOk();

         // dd($proyectos);
         $response->assertViewIs('proyecto.edit');
         $response->assertViewHas('proyecto',$proyecto);



      }

       /** @test  */
       public function Test_Confimar_Un_Proyecto()
       {

          $this->withoutExceptionHandling();

          //pruebas dobles utilizando fakes para llenar la informacion del metodo store de proyectos
          $proyecto =  factory(Proyecto::class)->create();
          factory(Participante::class)->create();
          factory(Actividade::class)->create();

        //   Notification::fake();

          $response = $this->put("/proyectos/confimarproyecto/$proyecto->id");


          $response->assertRedirect('/proyectos');//verificamos Que todo salga bien

       }

        /** @test  */
        public function Test_Rechazar_Un_Proyecto()
        {

           $this->withoutExceptionHandling();

           //pruebas dobles utilizando fakes para llenar la informacion del metodo store de proyectos
           $proyecto =  factory(Proyecto::class)->create();
           factory(Participante::class)->create();
           factory(Actividade::class)->create();

        //    Notification::fake();

           $response = $this->put("/proyectos/rechazarproyecto/$proyecto->id",[
            'motivox'=>'hola'
           ]);


           $response->assertRedirect('/proyectos');//verificamos Que todo salga bien

        }

          /** @test  */
          public function Test_Login()
          {

             $this->withoutExceptionHandling();

             //pruebas dobles utilizando fakes para llenar la informacion del metodo store de proyectos
             $user =  factory(User::class)->create();


             $response = $this->post("/login",[
              'email'=>'administrador@administrador.com',
              'password'=>'123456789'
             ]);


             $response->assertRedirect('/');//verificamos Que todo salga bien

          }


}

