@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina lista- Sandra Sota</h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2">
        @csrf

        @if($errors ->has('codEst'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>código</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @if($errors ->has('nomEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            El <strong>nombre</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @if($errors ->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>apellido</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        @if($errors ->has('fnEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                La <strong>fecha de nacimiento</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        @if($errors ->has('turMat'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>turno de matricula</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        @if($errors ->has('semMat'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>semestre de matricula</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        @if($errors ->has('estMat'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>estado de matricula</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        <input type="text" name="codEst" placeholder="Código" value="{{old('codEst')}}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombres" value="{{old('nomEst')}}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{old('apeEst')}}" class="form-control mb-2">
        <input type="date" name="fnEst" placeholder="Fecha de nacimiento" value="{{old('fnEst')}}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1">Turno día</option>
            <option value="2">Turno noche</option>
            <option value="3">Turno tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=0; $i < 7; $i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

        <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimiento</div>

        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Apellidos y Nombres</th>
                    <th scope="col">Actuaizar/eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($xAlumnos as $item)
                <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td>{{ $item->codEst }}</td>
                    <td>
                        <a href="{{route('Estudiante.xDetalle', $item->id)}}">
                            {{ $item->apeEst }}, {{ $item->nomEst }}
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('Estudiante.xEliminar', $item->id) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">x</button>    
                        </form>
                        <a class="btn btn-warning btn-sm" href="{{route('Estudiante.xActualizar', $item->id)}}">
                            ...A
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    {{ $xAlumnos->links() }}
@endsection