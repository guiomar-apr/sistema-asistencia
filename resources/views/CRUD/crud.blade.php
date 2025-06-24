@extends('layouts.base')

@section('title', 'Gestión CRUD')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
@endsection

@section('content')
<div class="container">
    <div id="contenedor-crud">
        {{-- Vista inicial del CRUD --}}
        @include('CRUD.seccion_usuarios')
    </div>
</div>

@if (session('success'))
    <div id="alerta-exito" class="alerta-flotante">
        {{ session('success') }}
    </div>
@endif


<!-- Modal Confirmación Rol -->
<div id="modal-confirmacion" class="modal-overlay" style="display: none;" onclick="cerrarModalConfirmacion(event)">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModalConfirmacion()">&times;</span>
        <h3>¿Estás seguro de crear un nuevo rol?</h3>
        <div style="margin-top: 20px;">
            <button onclick="abrirFormularioRol()" class="btn-add">Sí, continuar</button>
            <button onclick="cerrarModalConfirmacion()" class="btn-danger">Cancelar</button>
        </div>
    </div>
</div>

<!-- Modal Crear Rol -->
<div id="modal-rol" class="modal-overlay" style="display:none;" onclick="cerrarModalRol(event)">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModalRol()">&times;</span>
        <h3>Crear Nuevo Rol</h3>
<form method="POST" action="{{ route('roles.store') }}" onsubmit="return confirmarCreacionRol()">
    @csrf

    <label for="nombre">Nombre del rol:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" rows="3" required></textarea>

    <div class="modal-btn-group">
        <button type="submit" class="btn-add">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="cerrarModalRol()">Cancelar</button>
    </div>
</form>

    </div>
</div>

<!-- Modal Crear Usuario -->
<div id="modal-crear-usuario" class="modal-overlay" style="display: none;" onclick="cerrarModalUsuario(event)">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModalUsuario()">&times;</span>
        <h3>Registrar Nuevo Usuario</h3>
        <div id="contenido-formulario-usuario">
            {{-- Vacío al cargar --}}
        </div>
    </div>
</div>

<!-- Modal Editar Usuario -->
<div id="modal-editar-usuario" class="modal-overlay" style="display: none;" onclick="cerrarModalEditar(event)">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModalEditar()">&times;</span>
        <h3>Editar Usuario</h3>
        <div id="contenido-formulario-editar">
            <!-- Aquí se carga el formulario -->
        </div>
    </div>
</div>




<script>
    function mostrarModalConfirmacion() {
        document.getElementById("modal-confirmacion").style.display = "flex";
    }

    function cerrarModalConfirmacion(e) {
        if (!e || e.target.id === "modal-confirmacion") {
            document.getElementById("modal-confirmacion").style.display = "none";
        }
    }

    function abrirFormularioRol() {
        cerrarModalConfirmacion();
        document.getElementById("modal-rol").style.display = "flex";
    }

    function cerrarModalRol(e) {
        if (!e || e.target.id === "modal-rol") {
            document.getElementById("modal-rol").style.display = "none";
        }
    }

    function confirmarCreacionRol() {
        return confirm("¿Deseas confirmar el registro de este nuevo rol?");
    }

    function mostrarModalUsuario() {
        const contenedor = document.getElementById('contenido-formulario-usuario');
        contenedor.innerHTML = '<p style="text-align:center;">Cargando...</p>';

        fetch('/crud/crear-usuario')
            .then(res => res.text())
            .then(html => {
                contenedor.innerHTML = html;
                document.getElementById('modal-crear-usuario').style.display = 'flex';
            })
            .catch(err => {
                console.error('Error al cargar el formulario:', err);
                contenedor.innerHTML = '<p style="color:red;">Error al cargar el formulario.</p>';
            });
    }

    function cerrarModalUsuario(e) {
        if (!e || e.target.id === "modal-crear-usuario") {
            document.getElementById("modal-crear-usuario").style.display = "none";
        }
    }

    function cargarCrud(tipo) {
        fetch('/crud/' + tipo)
            .then(res => res.text())
            .then(html => {
                document.getElementById('contenedor-crud').innerHTML = html;
            })
            .catch(err => console.error('Error al cargar sección:', err));
    }

    // Ocultar modales al cargar por seguridad
    window.addEventListener('DOMContentLoaded', () => {
        document.getElementById("modal-crear-usuario").style.display = "none";
        document.getElementById("modal-confirmacion").style.display = "none";
        document.getElementById("modal-rol").style.display = "none";
    });

    function mostrarModalEditar(id) {
    const contenedor = document.getElementById('contenido-formulario-editar');
    contenedor.innerHTML = '<p style="text-align:center;">Cargando...</p>';

    fetch('/crud/editar-usuario/' + id)
        .then(res => res.text())
        .then(html => {
            contenedor.innerHTML = html;
            document.getElementById('modal-editar-usuario').style.display = 'flex';
        })
        .catch(err => {
            console.error('Error al cargar el formulario:', err);
            contenedor.innerHTML = '<p style="color:red;">Error al cargar el formulario.</p>';
        });
}

function cerrarModalEditar(e) {
    if (!e || e.target.id === "modal-editar-usuario") {
        document.getElementById("modal-editar-usuario").style.display = "none";
    }
}

// Alerta flotante: dura 5 segundos y desaparece con animación
window.addEventListener('DOMContentLoaded', () => {
    const alerta = document.getElementById('alerta-exito');
    if (alerta) {
        setTimeout(() => {
            alerta.classList.add('ocultar');
        }, 3000); // comienza a desvanecerse a los 3s
        setTimeout(() => {
            alerta.remove();
        }, 4000); // se elimina del DOM después
    }
});


</script>
@endsection
