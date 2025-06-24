<h2>Gestión de Roles</h2>

<div style="margin-bottom: 15px;">
    <button class="btn btn-add" onclick="mostrarModalConfirmacion()">+ Crear Rol</button>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

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


