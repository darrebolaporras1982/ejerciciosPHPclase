<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function listarAlumnos(){
        $alumnos=Alumno::All();//nos va a devolver todos los alumnos en un array
        return view('alumnos/listaAlumnos',compact('alumnos'));
    }
    public function datosAlumno($id){
        $alumno=Alumno::find($id);
        return view('alumnos/datosAlumno',compact('alumno'));
    }
}
