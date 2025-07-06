<link rel="stylesheet" href="{{ asset('css/papelta.css') }}">

<div class="contenedor-papeletas">
    <h2 class="titulo-seccion">Gestión de Papeletas</h2>

    <form class="formulario-papeleta">
        <label>Empleado:</label>
        <input type="text" placeholder="Ej: Juan Pérez">

        <label>Tipo de Papeleta:</label>
        <select>
            <option>Permiso</option>
            <option>Cambio de Turno</option>
            <option>Inasistencia - Vacaciones</option>
        </select>

        <label>Fecha de Inicio:</label>
        <input type="date">

        <label>Fecha de Fin:</label>
        <input type="date">

        <button type="submit">Registrar</button>
    </form>

    <h3>Papeletas Registradas</h3>

    <div class="tarjeta-papeleta">
        <p><strong>Empleado:</strong> Juan Pérez</p>
        <p><strong>Tipo:</strong> Permiso</p>
        <p><strong>Fecha:</strong> 01/07/2025</p>
        <p><strong>Hora Inicio:</strong> 10:00 a.m. - <strong>Fin:</strong> 12:00 p.m.</p>
    </div>

    <div class="tarjeta-papeleta">
        <p><strong>Empleado:</strong> Ana Torres</p>
        <p><strong>Tipo:</strong> Cambio de Turno</p>
        <p><strong>De:</strong> Mañana (M) <strong>A:</strong> Tarde (T)</p>
        <p><strong>Desde:</strong> 01/07/2025 <strong>Hasta:</strong> 03/07/2025</p>
    </div>

    <div class="tarjeta-papeleta">
        <p><strong>Empleado:</strong> Milagros Lazo</p>
        <p><strong>Tipo:</strong> Inasistencia - Vacaciones</p>
        <p><strong>Desde:</strong> 30/06/2025 <strong>Hasta:</strong> 07/07/2025</p>
    </div>
</div>
