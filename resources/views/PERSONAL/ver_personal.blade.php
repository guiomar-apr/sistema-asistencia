<link rel="stylesheet" href="{{ asset('css/personal.css') }}">
<script src="https://unpkg.com/lucide@latest"></script>

<div class="contenedor-formulario">
    <h2>Listado de Personal Registrado</h2>

    <!-- Conteo por Área -->
    <div class="sin-fondo">
        <table class="tabla-conteo">
            <thead>
                <tr>
                    <th>Área</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conteoAreas as $area)
                    <tr>
                        <td>{{ $area->nombre }}</td>
                        <td>{{ $area->personal_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Conteo por Profesión -->
    <div class="sin-fondo">
        <table class="tabla-conteo">
            <thead>
                <tr>
                    <th>Profesión</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conteoProfesiones as $profesion)
                    <tr>
                        <td>{{ $profesion->nombre }}</td>
                        <td>{{ $profesion->personal_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Filtro de búsqueda -->
    <form method="GET" action="{{ route('ver.personal') }}" class="buscador-form">
        <input type="text" name="buscar" placeholder="Buscar por DNI, nombres o apellidos" value="{{ request('buscar') }}">
        <select name="area_id">
            <option value="">-- Todas las Áreas --</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>
                    {{ $area->nombre }}
                </option>
            @endforeach
        </select>
        <select name="profesion_id">
            <option value="">-- Todas las Profesiones --</option>
            @foreach($profesiones as $profesion)
                <option value="{{ $profesion->id }}" {{ request('profesion_id') == $profesion->id ? 'selected' : '' }}>
                    {{ $profesion->nombre }}
                </option>
            @endforeach
        </select>
        <button type="submit"><i data-lucide="search"></i> Buscar</button>
    </form>

    <!-- Tabla principal -->
    @if($personal->isEmpty())
        <p>No hay personal registrado aún.</p>
    @else
        <div class="sin-fondo">
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
                        <th>Acciones</th>
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
                            <td style="display: flex; gap: 5px;">
                                <a href="{{ route('editar.personal', $p->id) }}" class="btn-editar">
                                    <i data-lucide="pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('eliminar.personal', $p->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-eliminar" onclick="return confirm('¿Deseas eliminar este registro?')">
                                        <i data-lucide="trash-2"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
    lucide.createIcons();
</script>
