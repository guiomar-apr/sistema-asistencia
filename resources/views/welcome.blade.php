<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="welcome-wrapper">
        <div class="login-button">
            <a href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i>
                <span>INICIAR SESIÓN</span>
            </a>
        </div>

        <div class="main-panel">
            <div class="welcome-message">
                <div class="welcome-title">
                    <i class="fas fa-hospital-alt"></i>
                    <h1>ESTABLECIMIENTO DE SALUD TACALÁ I-3</h1>
                </div>
                <p class="subtitle">Bienvenido personal del establecimiento</p> 
                <p class="subtitle">por favor registre su asistencia.</p>
            </div>
        <div class="auth-options">
            <a href="{{ route('huella') }}" class="auth-box">
                <i class="fas fa-fingerprint fa-2x"></i>
                <p>AUTENTICACIÓN<br>POR HUELLA</p>
            </a>
            <a href="{{ route('qr') }}" class="auth-box">
                <i class="fas fa-qrcode fa-2x"></i>
                <p>AUTENTICACIÓN<br>POR QR</p>
            </a>
            <a href="{{ route('manual') }}" class="auth-box">
                <i class="fas fa-keyboard fa-2x"></i>
                <p>AUTENTICACIÓN<br>MANUAL</p>
            </a>
        </div>

        </div>
    </div>
</body>
</html>
