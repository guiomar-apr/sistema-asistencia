<link rel="stylesheet" href="{{ asset('css/cronograma.css') }}">
<form class="formulario-cronograma">
    <label>Nombre del Personal:</label>
    <input type="text" placeholder="Ej: Juan Pérez">

    <label>Tipo de Turno:</label>
    <select>
        <option value="M">Mañana (M)</option>
        <option value="T">Tarde (T)</option>
        <option value="M/T">Mañana/Tarde (M/T)</option>
        <option value="GO">Guardia (GO)</option>
        <option value="V">Vacaciones (V)</option>
        <option value="DP">Descanso Prenatal (DP)</option>
    </select>

    <label>Desde:</label>
    <input type="date">

    <label>Hasta:</label>
    <input type="date">

    <button type="submit">Registrar Turno</button>
</form>


<div class="contenedor-cronograma">
    <h2 class="titulo-seccion">Cronograma del Personal - Junio 2025</h2>

    <div class="tabla-scroll">
        <table class="tabla-cronograma">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Apellidos y Nombres</th>
                    @for ($i = 1; $i <= 30; $i++)
                        <th>{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Arquinga Mendoza Lilia Pierina</td>
                    @for ($i = 1; $i <= 30; $i++)
                        <td class="{{ in_array($i, [1,2,3,5,6,7,8,10,12,14,15]) ? 'turno-gd' : '' }}">GD</td>
                    @endfor
                </tr>
                <tr>
                    <td>2</td>
                    <td>Zapata Montero Lesly Evelyn</td>
                    @for ($i = 1; $i <= 30; $i++)
                        <td class="{{ ($i >= 9 && $i <= 16) ? 'turno-vacaciones' : '' }}">
                            {{ ($i >= 9 && $i <= 16) ? 'VACACIONES' : 'GD' }}
                        </td>
                    @endfor
                </tr>
                <tr>
                    <td>3</td>
                    <td>Alburqueque Santiago Omayra</td>
                    @for ($i = 1; $i <= 30; $i++)
                        <td class="{{ in_array($i, [6,13,20,27]) ? 'turno-descanso' : 'turno-gd' }}">
                            {{ in_array($i, [6,13,20,27]) ? 'DESCANSO' : 'GD' }}
                        </td>
                    @endfor
                </tr>
                <!-- Puedes seguir agregando filas de ejemplo -->
            </tbody>
        </table>
    </div>
</div>
