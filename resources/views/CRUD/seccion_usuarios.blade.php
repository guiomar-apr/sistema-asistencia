<h2>Gestión de Usuarios</h2>

<div style="margin-bottom: 15px;">
    <button class="btn btn-success" onclick="mostrarModalUsuario()">+ Crear Usuario</button>
</div>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre_usuario }}</td>
                <td>{{ $usuario->rol->nombre }}</td>
                <td>{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <button class="btn btn-primary" onclick="mostrarModalEditar('{{ $usuario->id }}')">Editar</button>


                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
