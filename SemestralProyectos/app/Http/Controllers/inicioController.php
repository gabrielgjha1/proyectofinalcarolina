<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;

class inicioController extends Controller
{
    function inicio (){

        $proyectos = Proyecto::where('estado','Aprobado')->take(3)->get();
        return view('inicio.index')->with('proyecto',$proyectos);

    }

}
