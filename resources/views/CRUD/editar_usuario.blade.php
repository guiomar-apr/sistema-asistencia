<div class="container">
    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
        @csrf
        @method('PUT')

        <label>Nombre de usuario:</label>
        <input type="text" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}" required>

        <label>Nueva contraseña (opcional):</label>
        <input type="password" name="contraseña">

        <label>Rol:</label>
        <select name="rol_id" required>
            @foreach ($roles as $rol)
                <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                    {{ $rol->nombre }}
                </option>
            @endforeach
        </select>

        <div class="modal-btn-group">
            <button type="submit" class="btn-add">Actualizar</button>
            <button type="button" class="btn btn-secondary" onclick="cerrarModalEditar()">Cancelar</button>
        </div>
    </form>
</div>
