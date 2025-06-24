@extends('layouts.base')

@section('title', 'Agregar Personal')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('content')
<div class="contenedor-formulario">
    <h2>Registro de Personal</h2>

    @if(session('success'))
        <div class="alert-exito">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('/personal') }}">
        @csrf

        <div class="form-group">
            <label>DNI:</label>
            <input type="text" name="dni" required>
        </div>

        <div class="form-group">
            <label>Nombres:</label>
            <input type="text" name="nombres" required>
        </div>

        <div class="form-group">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>
        </div>

        <div class="form-group">
            <label>Sexo:</label>
            <select name="sexo" required>
                <option value="">Seleccione</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>
        </div>

        <div class="form-group">
            <label>Celular:</label>
            <input type="text" name="celular" required>
        </div>

        <div class="form-group">
            <label>Correo (opcional):</label>
            <input type="email" name="correo">
        </div>

        <div class="form-group">
            <label>Área:</label>
            <select name="area_id" required>
                <option value="">Seleccione un área</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo_id" required>
                <option value="">Seleccione un cargo</option>
                @foreach($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Profesión:</label>
            <select name="profesion_id" required>
                <option value="">Seleccione una profesión</option>
                @foreach($profesiones as $profesion)
                    <option value="{{ $profesion->id }}">{{ $profesion->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-registrar">Registrar Personal</button>
    </form>
</div>
@endsection
