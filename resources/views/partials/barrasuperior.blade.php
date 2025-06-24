<header class="top-bar">
    <div class="top-left">
        <span class="title-box">ESTABLECIMIENTO DE SALUD TACALÁ I-3</span>
    </div>

    <div class="top-center">
        <div class="clock-box-horizontal" onclick="abrirModalHorario()" style="cursor: pointer;">
            <div id="icono-hora" class="emoji-icon-horizontal">☀️</div>
            <div class="clock-text">
                <div id="hora-actual" class="clock-time">--:--:--</div>
                <div id="date" class="clock-date">--/--/----</div>
            </div>
        </div>
    </div>

    <div class="top-right">
        <div class="icon-btn"><i data-lucide="message-circle"></i></div>
        <div class="icon-btn"><i data-lucide="bell"></i></div>
        <div class="user-info">
            <i data-lucide="user" class="user-icon"></i>
            <div class="user-text">
                <strong>{{ Auth::user()->nombre_usuario }}</strong>
                <small>{{ Auth::user()->rol->nombre }}</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="logout-btn" title="Cerrar sesión">
            <i data-lucide="log-out"></i>
        </a>
    </div>
</header>
