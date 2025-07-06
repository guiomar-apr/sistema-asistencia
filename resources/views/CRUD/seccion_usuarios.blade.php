<h2>Gestión de Usuarios</h2>
<link rel="stylesheet" href="{{ asset('css/crud.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div style="margin-bottom: 15px;">
    <button class="btn btn-add" onclick="abrirModalUsuario()">
        <i class="fas fa-user-plus"></i> Crear Usuario
    </button>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre_usuario }}</td>
                <td>{{ $usuario->rol->nombre }}</td>
                <td>{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Crear Usuario -->
<div id="modal-crear-usuario" class="modal-overlay" onclick="cerrarModalUsuario(event)">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <!-- Botón de cierre -->
        <span class="modal-close" onclick="cerrarModalUsuario()" style="color: white;">&times;</span>

        <!-- CABECERA CON ÍCONO -->
        <div class="modal-header-icon">
            <i class="fas fa-user-plus icon-solid-white"></i>
        </div>

        <h3>Registrar Nuevo Usuario</h3>

        <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf
            <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>

            <select name="rol_id" required>
                <option value="">Seleccione un rol</option>
                @foreach (\App\Models\Rol::all() as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>

            <div class="modal-btn-group-fixed">
                <button type="submit" class="btn-modal-igual btn-guardar">Guardar</button>
                <button type="button" class="btn-modal-igual btn-cancelar" onclick="cerrarModalUsuario()">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function abrirModalUsuario() {
        document.getElementById("modal-crear-usuario").style.display = "flex";
    }

    function cerrarModalUsuario(e) {
        if (!e || e.target.id === "modal-crear-usuario") {
            document.getElementById("modal-crear-usuario").style.display = "none";
        }
    }
</script>
