<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Usuario;
use App\Http\Controllers\C_Rol;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\C_Personal;
use App\Http\Controllers\C_Area;
use App\Http\Controllers\C_Cargo;
use App\Http\Controllers\C_Profesion;
use App\Models\Area;
use App\Models\Cargo;
use App\Models\Profesion;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Route::get('/login', [C_Login::class, 'showLoginForm'])->name('login');
Route::post('/login', [C_Login::class, 'login']);
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');

Route::view('/huella', 'auth.huella')->name('huella');
Route::view('/qr', 'qr')->name('qr');
Route::view('/manual', 'manual')->name('manual');

Route::middleware('auth')->group(function () {

    Route::get('/principal', fn() => view('principal'))->name('principal');

    // ✅ SOLUCIONADO: asegúrate que la vista panel.blade.php existe
    Route::get('/panel', function () {
        return view('panel'); // Debes tener resources/views/panel.blade.php
    })->name('panel');

    Route::view('/home', 'HOME.home');
    Route::view('/asistencias', 'ASISTENCIAS.asistencias');
    Route::view('/cronograma', 'CRONOGRAMA.cronograma');
    Route::view('/reportes', 'REPORTES.reportes');
    Route::view('/papeletas', 'PAPELETAS.papeletas');

    // Vista principal para agregar datos
    Route::get('/agregar_datos', function () {
        $areas = Area::all();
        $cargos = Cargo::all();
        $profesiones = Profesion::all();
        return view('PERSONAL.agregar_datos', compact('areas', 'cargos', 'profesiones'));
    });

    // Formularios si se cargan por separado (opcional)
    Route::get('/formularios/personal', function () {
        $areas = Area::all();
        $cargos = Cargo::all();
        $profesiones = Profesion::all();
        return view('FORMULARIOS.form_personal', compact('areas', 'cargos', 'profesiones'));
    });

    Route::get('/formularios/area', fn() => view('FORMULARIOS.form_area'));
    Route::get('/formularios/cargo', fn() => view('FORMULARIOS.form_cargo'));
    Route::get('/formularios/profesion', fn() => view('FORMULARIOS.form_profesion'));

    // Procesamiento de formularios
    Route::post('/guardar-area', [C_Area::class, 'store'])->name('guardar.area');
    Route::post('/guardar-cargo', [C_Cargo::class, 'store'])->name('guardar.cargo');
    Route::post('/guardar-profesion', [C_Profesion::class, 'store'])->name('guardar.profesion');
    Route::post('/guardar-personal', [C_Personal::class, 'store'])->name('guardar.personal');

    // CRUDs
    Route::get('/personal', [C_Personal::class, 'index']);
    Route::get('/personal/crear', [C_Personal::class, 'crear']);
    Route::resource('usuarios', C_Usuario::class);
    Route::post('/roles', [C_Rol::class, 'store'])->name('roles.store');

    Route::get('/crud', fn() => view('CRUD.index_crud'))->name('crud.panel');
    Route::get('/crud/usuarios', function () {
        $usuarios = \App\Models\Usuario::with('rol')->get();
        return response()->view('CRUD.seccion_usuarios', compact('usuarios'));
    });
    Route::get('/crud/roles', fn() => response()->view('CRUD.seccion_roles', ['roles' => \App\Models\Rol::all()]));
    Route::get('/crud/crear-usuario', fn() => response()->view('CRUD.crear_usuario', ['roles' => \App\Models\Rol::all()]));
    Route::get('/crud/editar-usuario/{id}', function ($id) {
        $usuario = \App\Models\Usuario::findOrFail($id);
        $roles = \App\Models\Rol::all();
        return response()->view('CRUD.editar_usuario', compact('usuario', 'roles'));
    });

    

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
