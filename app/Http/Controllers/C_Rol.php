<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class C_Rol extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:roles,nombre',
            'descripcion' => 'required|string',
        ]);

        Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->back()->with('success', 'Rol creado exitosamente.');
    }
}
