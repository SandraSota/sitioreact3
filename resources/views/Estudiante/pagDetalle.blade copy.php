@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina de lista </h1>
@endsection

@section('seccion')
    <h3> Detalle de estudiante </h3>

    <p> Id:                    {{$xDetAlumnos->id}} </p>
    <p> Codigo:                {{$xDetAlumnos->codEst}} </p>
    <p> Apellidos y nombres:   {{$xDetAlumnos->apeEst}}, {{$xDetAlumnos->nomEst}} </p>
    <p> Fecha de nacimiento:   {{$xDetAlumnos->fnEst}} </p>
    <p> Turno:                 {{$xDetAlumnos->turMat}} </p>
    <p> Semestre:              {{$xDetAlumnos->semMat}} </p>
    <p> Estado de matricula:   {{$xDetAlumnos->estMat}} </p>
@endsection