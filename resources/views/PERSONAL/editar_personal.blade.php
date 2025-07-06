@extends('layouts.base')

@section('title', 'Editar Personal')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('content')
<div class="contenedor-formulario">
    <h2>Editar Datos del Personal</h2>

    <form method="POST" action="{{ route('actualizar.personal', $personal->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="dni" placeholder="DNI" value="{{ $personal->dni }}" required>
        <input type="text" name="nombres" placeholder="Nombres" value="{{ $personal->nombres }}" required>
        <input type="text" name="apellidos" placeholder="Apellidos" value="{{ $personal->apellidos }}" required>

        <select name="sexo" required>
            <option value="">Sexo</option>
            <option value="masculino" {{ $personal->sexo == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ $personal->sexo == 'femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="otro" {{ $personal->sexo == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>

        <input type="date" name="fecha_nacimiento" value="{{ $personal->fecha_nacimiento }}" required>
        <input type="text" name="celular" placeholder="Celular" value="{{ $personal->celular }}" required>
        <input type="email" name="correo" placeholder="Correo (opcional)" value="{{ $personal->correo }}">

        <select name="area_id" required>
            <option value="">Área</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}" {{ $personal->area_id == $area->id ? 'selected' : '' }}>
                    {{ $area->nombre }}
                </option>
            @endforeach
        </select>

        <select name="cargo_id" required>
            <option value="">Cargo</option>
            @foreach($cargos as $cargo)
                <option value="{{ $cargo->id }}" {{ $personal->cargo_id == $cargo->id ? 'selected' : '' }}>
                    {{ $cargo->nombre }}
                </option>
            @endforeach
        </select>

        <select name="profesion_id" required>
            <option value="">Profesión</option>
            @foreach($profesiones as $profesion)
                <option value="{{ $profesion->id }}" {{ $personal->profesion_id == $profesion->id ? 'selected' : '' }}>
                    {{ $profesion->nombre }}
                </option>
            @endforeach
        </select>

        <select name="estado_personal" required>
            <option value="activo" {{ $personal->estado_personal == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="no activo" {{ $personal->estado_personal == 'no activo' ? 'selected' : '' }}>No Activo</option>
        </select>

        <button type="submit" class="btn-registrar">Guardar Cambios</button>
    </form>
</div>
@endsection
