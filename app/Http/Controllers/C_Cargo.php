<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class C_Cargo extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:cargos,nombre'
        ]);

        Cargo::create([
            'nombre' => $request->nombre
        ]);

        return back()->with('success', 'Cargo registrado correctamente.');
    }
}
