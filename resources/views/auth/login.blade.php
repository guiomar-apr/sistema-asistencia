<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Contenedor principal -->
    <div class="login-wrapper">
        <div class="login-left">
            <div class="form-box split-box">

                <!-- FORMULARIO A LA DERECHA -->
                <div class="form-right">
                    <div class="form-inner">
                        <h2>INICIAR SESIÓN</h2>

                        @if (session('status'))
                            <div style="color: red; margin-bottom: 10px;">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group">
                                <input id="nombre_usuario" type="text" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required>
                                <label for="nombre_usuario">Usuario</label>
                                @error('nombre_usuario')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="input-group">
                                <input id="contraseña" type="password" name="contraseña" required>
                                <label for="contraseña">Contraseña</label>
                                @error('contraseña')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn-primary">Entrar</button>
                        </form>

                        <a href="{{ url('/') }}" class="btn-secondary">← Regresar</a>
                    </div>
                </div>

                <!-- IMAGEN A LA IZQUIERDA -->
                <div class="form-left">
                    <div class="image-slider">
                        <img src="{{ asset('img/img_login1.jpg') }}" class="active" alt="Imagen 1">
                        <img src="{{ asset('img/img_login2.jpeg') }}" alt="Imagen 2">
                        <img src="{{ asset('img/img_login3.jpeg') }}" alt="Imagen 3">
                    </div>
                </div>

                <span class="glow-orb"></span>
            </div>
        </div>
    </div>

    <!-- ECG decorativo -->
    <div class="ecg-line-outside">
        <svg viewBox="0 0 1000 100" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur"/>
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>

                <path id="ecg-path" d="M0,50 
                    L100,50 
                    L120,20 
                    L140,80 
                    L160,35 
                    L180,50 
                    L250,50 
                    L270,40 
                    L290,50 
                    L320,50 
                    L340,20 
                    L360,80 
                    L380,50 
                    L1000,50" />
            </defs>

            <use href="#ecg-path" class="animated-ecg" />
            <ellipse rx="10" ry="4" fill="white" opacity="0.7" filter="url(#glow)">
                <animateMotion dur="4s" repeatCount="indefinite">
                    <mpath href="#ecg-path" />
                </animateMotion>
            </ellipse>
        </svg>
    </div>

    <!-- Modal de contraseña -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <p>Por favor, comuníquese con el Administrador de Recursos Humanos.</p>
        </div>
    </div>

    <script>
        function mostrarModal(e) {
            e.preventDefault();
            document.getElementById("modal").style.display = "block";
        }

        function cerrarModal() {
            document.getElementById("modal").style.display = "none";
        }

        // Animación del slider
        let currentIndex = 0;
        const images = document.querySelectorAll('.image-slider img');
        const total = images.length;

        setInterval(() => {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % total;
            images[currentIndex].classList.add('active');
        }, 5000);
    </script>
</body>
</html>
