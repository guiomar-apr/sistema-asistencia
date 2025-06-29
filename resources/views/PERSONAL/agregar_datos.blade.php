<link rel="stylesheet" href="{{ asset('css/personal.css') }}">

<div class="contenedor-principal">
    <!-- Tarjeta de botones -->
    <div class="card-botones">
        <h2>Agregar Datos</h2>
        <div class="btn-group-modular">
            <button type="button" class="btn-verde" onclick="toggleFormulario('form-personal')">Agregar Personal</button>
            <button type="button" class="btn-verde" onclick="toggleFormulario('form-area')">Agregar Área</button>
            <button type="button" class="btn-verde" onclick="toggleFormulario('form-cargo')">Agregar Cargo</button>
            <button type="button" class="btn-verde" onclick="toggleFormulario('form-profesion')">Agregar Profesión</button>
        </div>
    </div>

    <!-- Formulario Personal -->
    <div id="form-personal" class="card-formulario oculto">
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
            <button type="submit" class="btn-registrar">Registrar Personal</button>
        </form>
    </div>

    <!-- Formulario Área -->
    <div id="form-area" class="card-formulario oculto">
        <form method="POST" action="{{ route('guardar.area') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del Área" required>
            <button type="submit" class="btn-registrar">Registrar Área</button>
        </form>
    </div>

    <!-- Formulario Cargo -->
    <div id="form-cargo" class="card-formulario oculto">
        <form method="POST" action="{{ route('guardar.cargo') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del Cargo" required>
            <button type="submit" class="btn-registrar">Registrar Cargo</button>
        </form>
    </div>

    <!-- Formulario Profesión -->
    <div id="form-profesion" class="card-formulario oculto">
        <form method="POST" action="{{ route('guardar.profesion') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre de la Profesión" required>
            <button type="submit" class="btn-registrar">Registrar Profesión</button>
        </form>
    </div>
</div>
