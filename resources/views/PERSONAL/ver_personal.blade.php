@extends('layouts.base')

@section('title', 'Ver Personal')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endsection

@section('content')
<div class="contenedor-formulario">
    <h2>Listado de Personal Registrado</h2>

    @if($personal->isEmpty())
        <p>No hay personal registrado aún.</p>
    @else
        <div class="tabla-contenedor">
            <table class="tabla-personal">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Sexo</th>
                        <th>Fecha Nac.</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Área</th>
                        <th>Cargo</th>
                        <th>Profesión</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personal as $p)
                        <tr>
                            <td>{{ $p->dni }}</td>
                            <td>{{ $p->nombres }}</td>
                            <td>{{ $p->apellidos }}</td>
                            <td>{{ ucfirst($p->sexo) }}</td>
                            <td>{{ $p->fecha_nacimiento }}</td>
                            <td>{{ $p->celular }}</td>
                            <td>{{ $p->correo ?? '-' }}</td>
                            <td>{{ $p->area->nombre ?? '-' }}</td>
                            <td>{{ $p->cargo->nombre ?? '-' }}</td>
                            <td>{{ $p->profesion->nombre ?? '-' }}</td>
                            <td>{{ ucfirst($p->estado_personal) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
