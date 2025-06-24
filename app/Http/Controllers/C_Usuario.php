<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class C_Usuario extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        $roles = Rol::all();
        return view('CRUD.crud', compact('usuarios', 'roles'));
    }

    public function create()
    {
        $roles = Rol::all();
        return view('CRUD.crear_usuario', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios',
            'contraseña' => 'required|min:6',
            'rol_id' => 'required|exists:roles,id',
        ]);

        Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'contraseña' => Hash::make($request->contraseña),
            'rol_id' => $request->rol_id,
            'activo' => 1,
        ]);

        return redirect()->back()->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $roles = Rol::all();
        return view('CRUD.editar_usuario', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario,' . $usuario->id,
            'rol_id' => 'required|exists:roles,id',
        ]);

        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->rol_id = $request->rol_id;

        if ($request->filled('contraseña')) {
            $usuario->contraseña = Hash::make($request->contraseña);
        }

        $usuario->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
}
