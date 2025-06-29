<aside class="sidebar">
    <nav class="menu">
        <button class="menu-btn" onclick="mostrarSeccion('home')"><i data-lucide="home"></i> Home</button>
        <button class="menu-btn" onclick="mostrarSeccion('asistencias')"><i data-lucide="check-square"></i> Asistencias</button>
        <button class="menu-btn" onclick="mostrarSeccion('cronograma')"><i data-lucide="calendar"></i> Cronograma</button>

        <!-- Submenú Personal -->
        <button class="menu-btn" onclick="toggleSubmenu('submenu-personal')">
            <i data-lucide="users"></i> Personal
        </button>
        <div id="submenu-personal" class="submenu" style="display: none; padding-left: 15px;">
            <button class="submenu-btn" onclick="mostrarSeccion('ver_personal')">Ver Personal</button>
            <button class="submenu-btn" onclick="mostrarSeccion('agregar_datos')">Agregar Datos</button>
        </div>

        <button class="menu-btn" onclick="mostrarSeccion('reportes')"><i data-lucide="bar-chart-2"></i> Reportes</button>
        <button class="menu-btn" onclick="mostrarSeccion('papeletas')"><i data-lucide="clipboard"></i> Papeletas</button>

        <!-- Submenú CRUD -->
        <button class="menu-btn" onclick="toggleSubmenu('submenu-crud')">
            <i data-lucide="file-text"></i> CRUD
        </button>
        <div id="submenu-crud" class="submenu" style="display: none; padding-left: 15px;">
            <button class="submenu-btn" onclick="cargarVistaCrud('usuarios')">Usuarios</button>
            <button class="submenu-btn" onclick="cargarVistaCrud('roles')">Roles</button>
        </div>

        <button class="menu-btn bottom"><i data-lucide="settings"></i> Configuración</button>
    </nav>
</aside>

<script>
    function cargarVistaCrud(seccion) {
        fetch('/crud')
            .then(res => res.text())
            .then(html => {
                document.getElementById('contenido').innerHTML = html;
                lucide.createIcons?.();
                setTimeout(() => cargarCrud(seccion), 100); // esperar a que el contenedor se haya cargado
            });
    }
</script>
