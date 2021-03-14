<?php

namespace App\Http\Controllers;

use App\User;
use App\Proyecto;
use Carbon\Carbon;
use App\Actividade;
use App\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',Auth()->user());

        $proyectos = Proyecto::all();

        return view('proyecto.index')->with('proyectos',$proyectos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('proyecto.create')->with('hoy',$hoy);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'nombre_participante'=>'required',
            'cedula_participante'=>'required',
            'telefono_participante'=>'required',
            'telefono_residencial_p'=>'required',
            'actividad'=>'required',
            'tiempo'=>'required|integer|min:0|',
            'titulo'=>'required',
            'objetivo'=>'required',
            'descripcionP'=>'required',
            'nivel'=>'required',
            'modalidad'=>'required',
            'cantidad_est'=>'required|integer|min:1',
            'facultades'=>'required',
            'perfil_est'=>'required',

            'descripcion_producto'=>'required',
            'tiempo_estimado'=>'required|integer|min:1',
            'requiere_docente'=>'required',
            'materiales_requeridos'=>'required',
            'lugar'=>'required',
            'descripcion_lugar'=>'required',
            'facilidades'=>'required',
            'proponete'=>'required',
            'responsabilidades'=>'required',

            'correo'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'cedula'=>'required',
            'telefono_oficina'=>'required|integer|min:0|digits:7',
            'telefono_movil'=>'required|integer|min:0|digits:8',

            'supervisor'=>'required',
            'correo_supervisor'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'telefono_oficina_supervisor'=>'required|integer|min:0|digits:7',
            'telefono_movil_supervisor'=>'required|integer|min:0|digits:8',

        ]);


        $string_facultades = implode(', ', $data['facultades']);
        $data['facultades']=$string_facultades;

        $proyecto = Proyecto::create($data);


        // agregar los datos de los participantes

        $nombre_participante =  $data['nombre_participante'];
        $cedula_participante =  $data['cedula_participante'];
        $telefono_participante =  $data['telefono_participante'];
        $telefono_residencial_p =  $data['telefono_residencial_p'];

        $contador = count($data['nombre_participante']);

        for( $i=0;$i<$contador;$i++ )
        {

            $participante = Participante::create([

            'nombre_participante'=>$nombre_participante[$i],
            'cedula_participante'=>$cedula_participante[$i],
            'telefono_participante'=>$telefono_participante[$i],
            'telefono_residencial_p'=> $telefono_residencial_p[$i],
            'proyecto_id'=>$proyecto->id
            ]);


        }



        $actividad =  $data['actividad'];
        $tiempo =  $data['tiempo'];
        $contador = count($data['actividad']);


        for( $i=0;$i<$contador;$i++ )
        {

            $actividades = Actividade::create([

            'actividad'=>$actividad[$i],
            'tiempo'=>$tiempo[$i],
            'proyecto_id'=>$proyecto->id
            ]);


        }


        return redirect()->route('inicio.index')->with('confirmar','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        // dd($proyecto);
        return view('proyecto.edit')->with('proyecto',$proyecto);

        // dd($proyecto)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function rechazarProyecto(Request $request, Proyecto $proyecto)
    {

        $data = $request->validate([

            'motivo'=>'required'

        ]);

        $usuario = User::where('email',$proyecto->correo)->get();


        //verifica si el usuario ya le han aceptado un proyecto con anterioridad
        if($usuario->count() ==1 ){

            $usuario[0]->notify(new \App\Notifications\RechazarProyecto($data['motivo']));

            $proyecto->estado = "Rechazado";
            $proyecto->save();

            return redirect()->route('proyecto.index')->with('rechazar','ok');
        }

        //Si no, crea el usuario
        $psswd = substr( md5(microtime()), 1, 8);
        $usuario = User::create([

            'password'=>Hash::make($psswd),
            'name'=>'$proyecto->cedula',
            'email'=>'gabrielgjhaxs2@fasdf.com'

        ]);
        //Se le envia la notificacion
        $usuario->notify(new \App\Notifications\RechazarProyecto($data['motivo']));

        //Se borra el usuario
        $usuario->delete();
        $proyecto->estado = "Rechazado";
        $proyecto->save();
        return redirect()->route('proyecto.index')->with('rechazar','ok');

    }

    public function ConfirmarProyecto(Request $request, Proyecto $proyecto)
    {
        $mensaje = "";
        $usuario = User::where('email',$proyecto->correo)->get();
        if($usuario->count() ==1 ){
            $mensaje = $proyecto->titulo." a sido aceptado, ingrese con la cuenta que ya tiene creada con su correo: ".$proyecto->correo;

            $usuario[0]->notify(new \App\Notifications\ConfirmarProyecto($mensaje));

            $proyecto->estado = "Aprobado";
            $proyecto->save();

            return redirect()->route('proyecto.index')->with('confirmar','ok');

        }

         //Si no, crea el usuario
         $psswd = substr( md5(microtime()), 1, 8);
         $usuario = User::create([

            'password'=>Hash::make($psswd),
            'name'=>$proyecto->cedula,
            'email_verified_at'=>Carbon::now(),

            'email'=>$proyecto->correo

        ]);

        $mensaje = $proyecto->titulo."a sido aceptado, Puede iniciar sesión con el correo: ".$proyecto->correo. " y la contraseña: ".$psswd;
        $usuario->notify(new \App\Notifications\ConfirmarProyecto($mensaje));

        $proyecto->estado = "Aprobado";
        $proyecto->save();

        return redirect()->route('proyecto.index')->with('confirmar','ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
