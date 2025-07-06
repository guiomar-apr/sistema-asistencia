<h2>Gestión de Roles</h2>

<!-- Estilos -->
<link rel="stylesheet" href="{{ asset('css/crud.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Ícono superior -->
<div style="text-align: center;">
    <i class="fa-solid fa-user-shield icon-solid-white"></i>
</div>

<!-- Botón crear -->
<div style="margin-bottom: 15px;">
    <button class="btn btn-add" onclick="mostrarFormularioRol()">+ Crear Rol</button>
</div>

<!-- Tabla -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $rol)
            <tr>
                <td>{{ $rol->id }}</td>
                <td>{{ $rol->nombre }}</td>
                <td>{{ $rol->descripcion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Confirmación -->
<div id="modal-confirmacion" class="modal-overlay" style="display: none;" onclick="cerrarModalConfirmacion(event)">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModalConfirmacion()">&times;</span>
        <h3>¿Estás seguro de crear un nuevo rol?</h3>
        <div class="modal-btn-group-fixed">
            <button onclick="abrirFormularioRol()" class="btn-modal-igual btn-guardar">Sí, continuar</button>
            <button onclick="cerrarModalConfirmacion()" class="btn-modal-igual btn-cancelar">Cancelar</button>
        </div>
    </div>
</div>

<!-- Modal Crear Rol -->
<div id="modal-rol" class="modal-overlay" style="display:none;" onclick="cerrarModalRol(event)">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModalRol()">&times;</span>

        <!-- Cabecera con ícono -->
        <div class="modal-header-icon">
            <i class="fa-solid fa-user-shield icon-solid-white"></i>
        </div>

        <h3>Crear Nuevo Rol</h3>
        <form method="POST" action="{{ route('roles.store') }}" onsubmit="return confirmarCreacionRol()">
            @csrf

            <label for="nombre">Nombre del rol:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3" required></textarea>

            <div class="modal-btn-group-fixed">
                <button type="submit" class="btn-modal-igual btn-guardar">Guardar</button>
                <button type="button" class="btn-modal-igual btn-cancelar" onclick="cerrarModalRol()">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<!-- Script -->
<script>
    function mostrarFormularioRol() {
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
</script>
