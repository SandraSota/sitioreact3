<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante1;
use App\Models\estudiante_detalle;
use App\Models\seguimiento;

class PagesController extends Controller
{
    public function fnInicio () {
        return view('welcome');
    }

    public function fnEstDetalle($id) {
        $xDetAlumnos = estudiante_detalle::findOrFail($id); //Datos de BD
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnSeguimiento() {
        $xSegAlumnos = seguimiento::all(); //Datos de BD
        return view('pagSeguimiento', compact('xSegAlumnos'));
    }
    
    /*public function fnEstDetalle ($id) {
        $xDetAlumnos = Estudiante1::findOrFail($id); //Datos de BD
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }*/
   
    public function fnEstActualizar($id) {
        $xActAlumnos = Estudiante1::findOrFail($id); //Datos de BD
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id) {

        $xUpdateAlumnos = Estudiante1::findOrFail($id); //Datos de BD

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnEst  = $request -> fnEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();

        return back()->with('msj', 'Se actualizo con éxito...');
    }

    public function fnRegistrar (Request $request) {
        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $nuevoEstudiante = new Estudiante1;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnEst = $request->fnEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();

        return back()->with('msj', 'Se registro con éxito...');
    }

    public function fnEliminar($id) {
        $deleteAlumno = Estudiante1::findOrFail($id); //Datos de BD
        $deleteAlumno->delete();
        return back()->with('msj', 'Se eliminó con éxito...');
    }

    public function fnLista () {
        $xAlumnos = Estudiante1::paginate(4); //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }
    
    public function fnGaleria ($numero=null){
        $valor  = $numero;
        $otro   = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }
}
