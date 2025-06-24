<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class C_Login extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar el login con validación de contraseña
    public function login(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string',
            'contraseña' => 'required|string',
        ]);

        // Buscar el usuario por nombre
        $usuario = Usuario::where('nombre_usuario', $request->nombre_usuario)->first();

        // Verifica si existe y la contraseña coincide
        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {
            Auth::login($usuario);
            $request->session()->regenerate();

            return redirect()->route('panel');
        }

        return back()->with('status', 'Credenciales incorrectas');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Sesión cerrada correctamente.');
    }
}
