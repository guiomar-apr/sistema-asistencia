<div class="container">
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        <label>Nombre de usuario:</label>
        <input type="text" name="nombre_usuario" required>

        <label>Contraseña:</label>
        <input type="password" name="contraseña" required>

        <label>Rol:</label>
        <select name="rol_id" required>
            <option value="">Seleccione un rol</option>
            @foreach ($roles as $rol)
                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
            @endforeach
        </select>

        <div class="modal-btn-group">
            <button type="submit" class="btn-add">Guardar</button>
            <button type="button" class="btn btn-secondary" onclick="cerrarModalUsuario()">Cancelar</button>
        </div>
    </form>
</div>
