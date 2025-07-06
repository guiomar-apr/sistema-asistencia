<aside class="sidebar">
    <nav class="menu">

        <!-- Principal -->
        <button class="menu-btn" onclick="mostrarSeccion('home')">
            <i data-lucide="home"></i> Home
        </button>

        <!-- Asistencias -->
        <button class="menu-btn" onclick="mostrarSeccion('asistencias')">
            <i data-lucide="check-square"></i> Asistencias
        </button>

        <!-- Cronograma -->
        <button class="menu-btn" onclick="mostrarSeccion('cronograma')">
            <i data-lucide="calendar"></i> Cronograma
        </button>

        <!-- Papeletas -->
        <button class="menu-btn" onclick="mostrarSeccion('papeletas')">
            <i data-lucide="clipboard"></i> Papeletas
        </button>

        <!-- Submenú Personal -->
        <button class="menu-btn" onclick="toggleSubmenu('submenu-personal')">
            <i data-lucide="users"></i> Personal
        </button>
        <div id="submenu-personal" class="submenu" style="display: none; padding-left: 15px;">
            <button class="submenu-btn" onclick="mostrarSeccion('ver_personal')">Ver Personal</button>
            <button class="submenu-btn" onclick="mostrarSeccion('agregar_datos')">Agregar Datos</button>
        </div>

        <!-- Reportes -->
        <button class="menu-btn" onclick="mostrarSeccion('reportes')">
            <i data-lucide="bar-chart-2"></i> Reportes
        </button>

        <!-- Submenú CRUD -->
        <button class="menu-btn" onclick="toggleSubmenu('submenu-crud')">
            <i data-lucide="file-text"></i> CRUD
        </button>
        <div id="submenu-crud" class="submenu" style="display: none; padding-left: 15px;">
            <button class="submenu-btn" onclick="mostrarSeccion('crud/usuarios')">Usuarios</button>
            <button class="submenu-btn" onclick="mostrarSeccion('crud/roles')">Roles</button>
        </div>

        <!-- Configuración -->
        <button class="menu-btn bottom">
            <i data-lucide="settings"></i> Configuración
        </button>

    </nav>
</aside>
