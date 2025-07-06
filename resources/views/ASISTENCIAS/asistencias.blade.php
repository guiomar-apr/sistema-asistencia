<link rel="stylesheet" href="{{ asset('css/asistencia.css') }}">

<div class="contenedor-asistencias">
    <h2 class="titulo-seccion">Registro de Asistencias</h2>

    <table class="tabla">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Turno</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Juan Pérez</td>
                <td>01/07/2025</td>
                <td>07:58</td>
                <td>16:00</td>
                <td>M</td>
                <td class="estado-asistio">✔ Asistió</td>
            </tr>
            <tr>
                <td>Ana Torres</td>
                <td>01/07/2025</td>
                <td>—</td>
                <td>—</td>
                <td>T</td>
                <td class="estado-falta">✖ Falta</td>
            </tr>
            <tr>
                <td>Carlos Ríos</td>
                <td>01/07/2025</td>
                <td>08:01</td>
                <td>16:05</td>
                <td>M/T</td>
                <td class="estado-asistio">✔ Asistió</td>
            </tr>
            <tr>
                <td>Lucía Mendoza</td>
                <td>01/07/2025</td>
                <td>—</td>
                <td>—</td>
                <td>GO</td>
                <td class="estado-falta">✖ Falta</td>
            </tr>
            <tr>
                <td>Julio Zambrano</td>
                <td>01/07/2025</td>
                <td>07:59</td>
                <td>15:58</td>
                <td>M</td>
                <td class="estado-asistio">✔ Asistió</td>
            </tr>
            <tr>
                <td>Milagros Lazo</td>
                <td>01/07/2025</td>
                <td>—</td>
                <td>—</td>
                <td>GO</td>
                <td class="estado-falta">✖ Vacaciones</td>
            </tr>
        </tbody>
    </table>
</div>
