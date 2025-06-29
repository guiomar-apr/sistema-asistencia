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
        @include('partials.barrasuperior')
        <div class="layout">
            @include('partials.barralateral')

            <main class="content">
                <!-- Contenedor dinámico -->
                <div id="contenido">
                    {{-- Se usará solo si accedes directamente a una vista con layout --}}
                    @yield('content')
                </div>
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
            document.getElementById("calendario-mes").innerHTML = tabla;
        }

        function toggleSubmenu(id) {
            let submenu = document.getElementById(id);
            submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
        }

        function mostrarSeccion(seccion) {
            let url = "";

            // Rutas principales
            if (seccion === 'home') url = '/home';
            if (seccion === 'asistencias') url = '/asistencias';
            if (seccion === 'cronograma') url = '/cronograma';
            if (seccion === 'reportes') url = '/reportes';
            if (seccion === 'papeletas') url = '/papeletas';

            // Personal
            if (seccion === 'ver_personal') url = '/personal';
            if (seccion === 'agregar_datos') url = '/agregar_datos';

            // CRUD dinámico
            if (seccion === 'crud/usuarios' || seccion === 'crud/roles') {
                fetch('/crud')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("contenido").innerHTML = html;
                        lucide.createIcons();
                        setTimeout(() => {
                            cargarCrud(seccion.split('/')[1]);
                        }, 100);
                    })
                    .catch(error => {
                        document.getElementById("contenido").innerHTML = `<h2 style="padding: 2rem;">Error al cargar CRUD</h2>`;
                        console.error("Error al cargar CRUD:", error);
                    });
                return;
            }

            // Si es sección normal
            if (url !== "") {
                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        if (!response.ok) throw new Error('Vista no encontrada');
                        return response.text();
                    })
                    .then(html => {
                        document.getElementById("contenido").innerHTML = html;
                        lucide.createIcons();
                    })
                    .catch(error => {
                        document.getElementById("contenido").innerHTML = `<h2 style="padding: 2rem;">Error 404: Vista no encontrada</h2>`;
                        console.error("Error al cargar:", error);
                    });
            }
        }

        document.addEventListener('DOMContentLoaded', () => mostrarSeccion('home'));

        // mostrarFormulario() solo se define por si acaso se usa
        function mostrarFormulario(id) {
            document.querySelectorAll('.formulario').forEach(f => f.style.display = 'none');
            const target = document.getElementById(id);
            if (target) {
                target.style.display = 'block';
            }
        }
    </script>

    <script>
    function toggleFormulario(id) {
        let formulario = document.getElementById(id);
        let yaVisible = formulario && !formulario.classList.contains('oculto');
        document.querySelectorAll('.card-formulario').forEach(f => f.classList.add('oculto'));
        if (!yaVisible && formulario) {
            formulario.classList.remove('oculto');
        }
    }
</script>


    @yield('scripts')


    
</body>
</html>
