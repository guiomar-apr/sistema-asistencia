<link rel="stylesheet" href="{{ asset('css/personal.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="contenedor-principal">
    <h2>Gestión de Datos del Personal</h2>

    <div class="btn-group-modular">
        <button class="btn-verde" onclick="mostrarModal('modal-personal')">
            <i class="fas fa-user-plus"></i> Agregar Personal
        </button>
        <button class="btn-verde" onclick="mostrarModal('modal-area')">
            <i class="fas fa-sitemap"></i> Agregar Área
        </button>
        <button class="btn-verde" onclick="mostrarModal('modal-cargo')">
            <i class="fas fa-briefcase"></i> Agregar Cargo
        </button>
        <button class="btn-verde" onclick="mostrarModal('modal-profesion')">
            <i class="fas fa-graduation-cap"></i> Agregar Profesión
        </button>
    </div>
</div>

{{-- MODAL PERSONAL --}}
<div id="modal-personal" class="modal-overlay" onclick="cerrarModal(event, 'modal-personal')">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModal(null, 'modal-personal')">&times;</span>
        <div class="modal-header-icon"><i class="fas fa-user-plus icon-solid-white"></i></div>
        <h3>Registrar Personal</h3>
        <form method="POST" action="{{ route('guardar.personal') }}">
            @csrf
            <input type="text" name="dni" placeholder="DNI" required>
            <input type="text" name="nombres" placeholder="Nombres" required>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <select name="sexo" required>
                <option value="">Sexo</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
            <input type="date" name="fecha_nacimiento" required>
            <input type="text" name="celular" placeholder="Celular" required>
            <input type="email" name="correo" placeholder="Correo (opcional)">
            <select name="area_id" required>
                <option value="">Área</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
            <select name="cargo_id" required>
                <option value="">Cargo</option>
                @foreach($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                @endforeach
            </select>
            <select name="profesion_id" required>
                <option value="">Profesión</option>
                @foreach($profesiones as $profesion)
                    <option value="{{ $profesion->id }}">{{ $profesion->nombre }}</option>
                @endforeach
            </select>
            <div class="modal-btn-group-fixed">
                <button type="submit" class="btn-modal-igual btn-guardar">Guardar</button>
                <button type="button" class="btn-modal-igual btn-cancelar" onclick="cerrarModal(null, 'modal-personal')">Cancelar</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL ÁREA --}}
<div id="modal-area" class="modal-overlay" onclick="cerrarModal(event, 'modal-area')">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModal(null, 'modal-area')">&times;</span>
        <div class="modal-header-icon"><i class="fas fa-sitemap icon-solid-white"></i></div>
        <h3>Registrar Área</h3>
        <form method="POST" action="{{ route('guardar.area') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del Área" required>
            <div class="modal-btn-group-fixed">
                <button type="submit" class="btn-modal-igual btn-guardar">Guardar</button>
                <button type="button" class="btn-modal-igual btn-cancelar" onclick="cerrarModal(null, 'modal-area')">Cancelar</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL CARGO --}}
<div id="modal-cargo" class="modal-overlay" onclick="cerrarModal(event, 'modal-cargo')">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModal(null, 'modal-cargo')">&times;</span>
        <div class="modal-header-icon"><i class="fas fa-briefcase icon-solid-white"></i></div>
        <h3>Registrar Cargo</h3>
        <form method="POST" action="{{ route('guardar.cargo') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del Cargo" required>
            <div class="modal-btn-group-fixed">
                <button type="submit" class="btn-modal-igual btn-guardar">Guardar</button>
                <button type="button" class="btn-modal-igual btn-cancelar" onclick="cerrarModal(null, 'modal-cargo')">Cancelar</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL PROFESIÓN --}}
<div id="modal-profesion" class="modal-overlay" onclick="cerrarModal(event, 'modal-profesion')">
    <div class="modal-content-box" onclick="event.stopPropagation();">
        <span class="modal-close" onclick="cerrarModal(null, 'modal-profesion')">&times;</span>
        <div class="modal-header-icon"><i class="fas fa-graduation-cap icon-solid-white"></i></div>
        <h3>Registrar Profesión</h3>
        <form method="POST" action="{{ route('guardar.profesion') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre de la Profesión" required>
            <div class="modal-btn-group-fixed">
                <button type="submit" class="btn-modal-igual btn-guardar">Guardar</button>
                <button type="button" class="btn-modal-igual btn-cancelar" onclick="cerrarModal(null, 'modal-profesion')">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrarModal(id) {
        document.getElementById(id).style.display = "flex";
    }

    function cerrarModal(e, id) {
        if (!e || e.target.id === id) {
            document.getElementById(id).style.display = "none";
        }
    }
</script>
