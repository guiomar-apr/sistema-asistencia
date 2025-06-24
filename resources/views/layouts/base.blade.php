<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema Asistencia')</title>
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @yield('styles')

</head>
<body>
    <div class="page-wrapper">
        <!-- TOPBAR -->
        @include('partials.barrasuperior')

        <div class="layout">
            <!-- SIDEBAR -->
            @include('partials.barralateral')

            <!-- CONTENIDO -->
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- MODAL HORARIO -->
    <div id="modal-horario" class="modal-overlay" onclick="cerrarModalHorario(event)">
        <div class="modal-content-box" onclick="event.stopPropagation()">
            <span class="modal-close" onclick="cerrarModalHorario(event)">&times;</span>
            <div class="modal-clock">
                <div id="modal-hora" class="big-hour">--:--:--</div>
                <div id="modal-fecha" class="big-date">--/--/----</div>
            </div>
            <div class="modal-calendar" id="calendario-mes"></div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function mostrarSeccion(id) {
            document.querySelectorAll('.seccion').forEach(seccion => seccion.style.display = 'none');
            document.getElementById(id).style.display = 'block';

            document.querySelectorAll('.menu-btn').forEach(btn => btn.classList.remove('active-btn'));
            const botonActivo = document.querySelector(`.menu-btn[onclick="mostrarSeccion('${id}')"]`);
            if (botonActivo) botonActivo.classList.add('active-btn');
        }

        function actualizarReloj() {
            const now = new Date();
            const hora = now.getHours().toString().padStart(2, '0');
            const min = now.getMinutes().toString().padStart(2, '0');
            const seg = now.getSeconds().toString().padStart(2, '0');
            const dia = now.getDate().toString().padStart(2, '0');
            const mes = (now.getMonth() + 1).toString().padStart(2, '0');
            const anio = now.getFullYear();

            document.getElementById('hora-actual').textContent = `${hora}:${min}:${seg}`;
            document.getElementById('date').textContent = `${dia}/${mes}/${anio}`;

            const icono = document.getElementById('icono-hora');
            const h = parseInt(hora);
            icono.textContent = (h >= 6 && h < 12) ? "☀️" : (h >= 12 && h < 18) ? "🌥️" : "🌙";
        }

        setInterval(actualizarReloj, 1000);
        actualizarReloj();

        document.addEventListener('DOMContentLoaded', () => mostrarSeccion('home'));

        function abrirModalHorario() {
            document.getElementById('modal-horario').style.display = 'flex';
            if (window.modalTimer) clearInterval(window.modalTimer);
            actualizarModalHorario();
            window.modalTimer = setInterval(actualizarModalHorario, 1000);
            generarCalendario();
        }

        function cerrarModalHorario(e) {
            document.getElementById('modal-horario').style.display = 'none';
            if (window.modalTimer) clearInterval(window.modalTimer);
        }

        function actualizarModalHorario() {
            const now = new Date();
            const hora = now.getHours().toString().padStart(2, '0');
            const min = now.getMinutes().toString().padStart(2, '0');
            const seg = now.getSeconds().toString().padStart(2, '0');
            const dia = now.getDate().toString().padStart(2, '0');
            const mes = (now.getMonth() + 1).toString().padStart(2, '0');
            const anio = now.getFullYear();

            document.getElementById('modal-hora').textContent = `${hora}:${min}:${seg}`;
            document.getElementById('modal-fecha').textContent = `${dia}/${mes}/${anio}`;
        }

        function generarCalendario() {
            const now = new Date();
            const year = now.getFullYear();
            const month = now.getMonth();
            const primerDia = new Date(year, month, 1);
            const ultimoDia = new Date(year, month + 1, 0);
            const diasMes = ultimoDia.getDate();
            const primerDiaSemana = primerDia.getDay();

            let tabla = `<table><thead><tr>`;
            const dias = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
            dias.forEach(d => tabla += `<th>${d}</th>`);
            tabla += `</tr></thead><tbody><tr>`;

            for (let i = 0; i < primerDiaSemana; i++) {
                tabla += `<td></td>`;
            }

            for (let dia = 1; dia <= diasMes; dia++) {
                const fecha = new Date(year, month, dia);
                const esDomingo = fecha.getDay() === 0;
                const clase = esDomingo ? 'sunday' : '';
                tabla += `<td class="${clase}">${dia}</td>`;
                if (fecha.getDay() === 6 && dia !== diasMes) {
                    tabla += `</tr><tr>`;
                }
            }

            tabla += `</tr></tbody></table>`;
            document.getElementById('calendario-mes').innerHTML = tabla;
        }
    </script>
</body>
</html>
