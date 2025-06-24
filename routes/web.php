<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Usuario;
use App\Http\Controllers\C_Rol;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\C_Personal;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Página principal del sistema
Route::get('/principal', function () {
    return view('principal');
})->middleware('auth')->name('principal');

Route::get('/panel', function () {
    return view('panel');
})->middleware('auth')->name('panel');

// Autenticación personalizada
Route::get('/login', [C_Login::class, 'showLoginForm'])->name('login');
Route::post('/login', [C_Login::class, 'login']);
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');

// CRUD de usuarios
Route::resource('usuarios', C_Usuario::class)->middleware('auth');

// Crear roles desde modal
Route::post('/roles', [C_Rol::class, 'store'])->name('roles.store')->middleware('auth');

// Autenticación alternativa
Route::view('/huella', 'auth.huella')->name('huella');
Route::view('/qr', 'qr')->name('qr');
Route::view('/manual', 'manual')->name('manual');

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



Route::get('/personal/agregar', [C_Personal::class, 'create']);
Route::post('/personal', [C_Personal::class, 'store']);
Route::get('/personal/ver', [C_Personal::class, 'index']);

});

// CRUD dinámico por AJAX/fetch
Route::middleware('auth')->group(function () {

    Route::get('/crud', function () {
        $usuarios = \App\Models\Usuario::with('rol')->get();
        $roles = \App\Models\Rol::all();
        return view('CRUD.crud', compact('usuarios', 'roles'));
    })->name('crud.panel');

    Route::get('/crud/usuarios', function () {
        $usuarios = \App\Models\Usuario::with('rol')->get();
        return response()->view('CRUD.seccion_usuarios', compact('usuarios'));
    });

    Route::get('/crud/roles', function () {
        $roles = \App\Models\Rol::all();
        return response()->view('CRUD.seccion_roles', compact('roles'));
    });

    Route::get('/crud/crear-usuario', function () {
        $roles = \App\Models\Rol::all();
        return response()->view('CRUD.crear_usuario', compact('roles'));
    });

    Route::get('/crud/editar-usuario/{id}', function ($id) {
        $usuario = \App\Models\Usuario::findOrFail($id);
        $roles = \App\Models\Rol::all();
        return response()->view('CRUD.editar_usuario', compact('usuario', 'roles'));
    });


    
});

