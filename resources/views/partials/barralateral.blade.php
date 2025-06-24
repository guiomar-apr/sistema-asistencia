<aside class="sidebar">
    <nav class="menu">
        <button class="menu-btn" onclick="mostrarSeccion('home')"><i data-lucide="home"></i> Home</button>
        <button class="menu-btn" onclick="mostrarSeccion('asistencias')"><i data-lucide="check-square"></i> Asistencias</button>
        <button class="menu-btn" onclick="mostrarSeccion('cronograma')"><i data-lucide="calendar"></i> Cronograma</button>
        <button class="menu-btn" onclick="mostrarSeccion('personal')"><i data-lucide="users"></i> Personal</button>
        <button class="menu-btn" onclick="mostrarSeccion('reportes')"><i data-lucide="bar-chart-2"></i> Reportes</button>
        <button class="menu-btn" onclick="mostrarSeccion('permisos')"><i data-lucide="clipboard"></i> Permisos</button>

        <!-- CRUD -->
        <a href="{{ route('crud.panel') }}" class="menu-btn"><i data-lucide="file-text"></i> CRUD</a>
        <div id="submenu-crud" class="submenu" style="margin-left: 20px;">
            <a href="javascript:void(0);" onclick="cargarCrud('usuarios')" class="menu-btn small-btn">Usuarios</a>
            <a href="javascript:void(0);" onclick="cargarCrud('roles')" class="menu-btn small-btn">Roles</a>
        </div>

        <button class="menu-btn" onclick="toggleSubMenu('submenu-personal')">
    <i data-lucide="user"></i> Personal
</button>
<div id="submenu-personal" class="submenu" style="display: none;">
    <button class="submenu-btn" onclick="mostrarSeccion('agregar_datos')">➕ Agregar Datos</button>
    <button class="submenu-btn" onclick="mostrarSeccion('ver_personal')">📋 Ver Personal</button>
</div>


        <button class="menu-btn bottom"><i data-lucide="settings"></i> Configuración</button>
    </nav>
</aside>
