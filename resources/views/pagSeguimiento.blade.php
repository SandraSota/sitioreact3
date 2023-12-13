@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina seguimiento - Sandra Sota</h1>
@endsection

@section('seccion')
@if(session('msj'))
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action= "" method="POST"> <!--{{ route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2"-->
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El <strong>Código</strong> es requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                Los <strong>Id Estudiante</strong> son requeridos
            </div>
        @enderror

        @if($errors ->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Los <strong>Apellidos</strong> son requeridos
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        
        @error('fnEst')
            <div class="alert alert-danger">
                La fecha de nacimiento es requerida
            </div>
        @enderror

        @error('turMat')
            <div class="alert alert-danger">
                El turno de matricula es requerido
            </div>
        @enderror

        @error('semMat')
            <div class="alert alert-danger">
                El semestre de matricula es requerido
            </div>
        @enderror

        @error('estMat')
            <div class="alert alert-danger">
                El estado de estudiante es requerido
            </div>
        @enderror
                    
        @endif
    

        <input type="text" name="IdSeg" placeholder="Id de Seguimiento" value="{{old('IdSeg')}}" class="form-control mb-2">
        <input type="text" name="idEst" placeholder="Id Estudiante" value="{{old('nomEst')}}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">Trabaja Actualmente...</option>
            <option value="1">SI</option>
            <option value="2">NO</option>
        </select>
        <select name="ofiAct" class="form-control mb-2">
            <option value="">Oficio Actual...</option>
            <option value="1">1cp Mecanica automotriz</option>
            <option value="2">2cp Mecanica automotriz</option>
            <option value="3">1cp Computacion e Informatica</option>
            <option value="4">2cp Computacion e Informatica</option>
            <option value="5">1cp Enfermeria</option>
            <option value="6">2cp Enfermeria</option>
            <option value="7">1cp Metalurgia</option>
            <option value="8">2cp Metalurgia</option>
        </select>
        <select name="satEst" class="form-control mb-2">
            <option value="">Satisfacción estudiantil...</option>
            <option value="1">No esta satisfecho</option>
            <option value="2">Regular</option>
            <option value="3">Bueno</option>
            <option value="4">Muy Bueno</option>
        </select>
        <input type="date" name="fcSeg" placeholder="Fecha de Seguimiento" value="{{old('fecSeg')}}" class="form-control mb-2">
        <select name="estSeg" class="form-control mb-2">
            <option value="">Estado de Seguimiento...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

        <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimiento</div>

        <table class="table">
            <thead class="table-danger">
                <br/>
                <tr>
                    <th scope="col">Id </th>
                    <th scope="col">Id Estudiante</th>
                    <th scope="col">Trabajo Actual</th>
                    <th scope="col">Oficio Actual</th>
                    <th scope="col">Satisfaccion</th>
                    <th scope="col">Fecha de seguimiento</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($xSegAlumnos as $item)
                    <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->codEst }}</td>
                    <td>
                        <a href="{{ route('Estudiante.xDetalle', $item->id ) }}">
                            {{ $item->apeEst }}, {{ $item->nomEst }}
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('Estudiante.xEliminar', $item->id) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                        </form>
                        <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar', $item->id ) }}">
                            ...A
                        </a>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection