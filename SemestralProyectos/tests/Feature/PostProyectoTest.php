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
        // $this->withoutExceptionHandling();

        //valores de prueba
        $response = $this->post('/proyectos',[
              'titulo'=> "Panamá dia de campo",
              'objetivo'=> "Convivir con muchas familias para crear una resocializacion despues de la pandemia",
              'descripcionP'=> "Reunir entre 8 a 9 familias para realizar una convivencia múltiple",
              'nivel'=> "Servicio Social",
              'modalidad'=> "Grupo",
              'cantidad_est'=> 10,
              'facultades'=>['FCyT', 'FIC', 'FIE'],
              'perfil_est'=> "Jóvenes con cualidades de liderar un grupo de personas",
              'descripcion_producto'=> "Comida",
              'tiempo_estimado'=> 30,
              'requiere_docente'=> "No",
              'materiales_requeridos'=> "Alimentos secos azúcar",
              'lugar'=> "Santa clara",
              'descripcion_lugar'=> "A lado del supermercado de las lagrimas",
              'facilidades'=> "Crear un ambiente de tranquilidad",
              'proponete'=> "Sasha López",
              'responsabilidades'=> "Mariano Pérez",
              'correo'=> "Mariano@gamil.com",
              'cedula'=> "89541994",
              'telefono_oficina'=> "2134676",
              'telefono_movil'=> "67890344",
              'supervisor'=> "Kiana Laurens",
              'correo_supervisor'=> "Kiana_Laurens@gmail.com",
              'telefono_oficina_supervisor'=> "3333444",
              'telefono_movil_supervisor'=> "33334444",
              //participantes

              'actividad'=> ["Intercambio de comida entre las familias"],
              'tiempo'=> [2],
              //Actividades

              'nombre_participante' => ['Manuel Campos'],
              'cedula_participante' => ["82344515"],
              'telefono_participante' => ["64512342"],
              'telefono_residencial_p' => ["2345512"],
          ]);

          $response->assertRedirect('/');//verificamos Que todo salga bien redirige al home
          $this->assertCount(1,Proyecto::all());//verificamos Que los datos se hayan guardado en proyecto
          $this->assertCount(1,Actividade::all());//verificamos Que los datos se hayan guardado en Actividades
          $this->assertCount(1,Participante::all());//verificamos Que los datos se hayan guardado en participante

          //traemos los datos guardados en la base de datos para verificarlos que se hayan agragado correctamente
          $proyecto = Proyecto::first(); $actividades = Actividade::first(); $participantes = Participante::first();
          //dd($actividades);

          // comprobamos que los datos concuerden  en la b ase de datos
          $this->assertSame([$proyecto->titulo,$proyecto->objetivo,$proyecto->descripcionP],['Panamá dia de campo','Convivir con muchas familias para crear una resocializacion despues de la pandemia','Reunir entre 8 a 9 familias para realizar una convivencia múltiple']);
          $this->assertSame([$proyecto->nivel,$proyecto->modalidad,$proyecto->cantidad_est],['Servicio Social','Grupo',10]);
          $this->assertSame([$proyecto->facultades,$proyecto->perfil_est,$proyecto->descripcion_producto],['FCyT, FIC, FIE','Jóvenes con cualidades de liderar un grupo de personas','Comida']);
          $this->assertSame([$proyecto->tiempo_estimado,$proyecto->requiere_docente,$proyecto->materiales_requeridos],[30,'No','Alimentos secos azúcar']);
          $this->assertSame([$proyecto->lugar,$proyecto->descripcion_lugar,$proyecto->facilidades],['Santa clara','A lado del supermercado de las lagrimas','Crear un ambiente de tranquilidad']);
          $this->assertSame([$proyecto->proponete,$proyecto->responsabilidades,$proyecto->correo],['Sasha López','Mariano Pérez','Mariano@gamil.com']);
          $this->assertSame([$proyecto->cedula,$proyecto->telefono_oficina,$proyecto->telefono_movil],['89541994','2134676','67890344']);
          $this->assertSame([$proyecto->supervisor,$proyecto->correo_supervisor,$proyecto->telefono_oficina_supervisor],['Kiana Laurens','Kiana_Laurens@gmail.com','3333444']);

          $this->assertSame([$actividades->actividad,$actividades->tiempo],['Intercambio de comida entre las familias',2]);

          $this->assertSame([$participantes->nombre_participante,$participantes->cedula_participante],['Manuel Campos','82344515']);
          $this->assertSame([$participantes->telefono_participante,$participantes->telefono_residencial_p],['64512342','2345512']);





    }

     /** @test  */
     public function Test_Listar_Proyecto()
     {

        $this->withoutExceptionHandling();

        //pruebas dobles utilizando fakes para llenar la informacion del metodo store de proyectos
        factory(Proyecto::class,       1)->create();
        factory(Participante::class,   1)->create();
        factory(Actividade::class,     1)->create();

        //metodo de listar proyectos
        $response = $this->get('/proyectos');

        //verifica que todo haya salido bien
        $response->assertOk();

        //lista todos los proyectos
        $proyectos =  Proyecto::all();
        // Verifica que la vista sea cargada y envie los datos de proyectos
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

         //Busca el metodo
         $response = $this->get("/proyectos/$proyecto->id/edit");
         //verifica que todo este correcto
         $response->assertOk();

         //carga la vista proyecto.edit y verifica que lleve la informacion del proyecto seleccionado
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

          $response = $this->put("/proyectos/confimarproyecto/$proyecto->id");

          $response->assertRedirect('/proyectos');//verificamos Que todo salga bien

       }

        /** @test  */
        public function Test_Rechazar_Un_Proyecto()
        {

         //   $this->withoutExceptionHandling();

           //pruebas dobles utilizando fakes para llenar la informacion del metodo store de proyectos
           $proyecto =  factory(Proyecto::class)->create();
           factory(Participante::class)->create();
           factory(Actividade::class)->create();

        //    Notification::fake();

           $response = $this->put("/proyectos/rechazarproyecto/$proyecto->id",[
            'motivo'=>''
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
              'password'=>'12345678'
             ]);


             $response->assertRedirect('/');//verificamos Que todo salga bien

          }


}

