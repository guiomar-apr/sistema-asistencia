<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class C_Area extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:areas,nombre'
        ]);

        Area::create(['nombre' => $request->nombre]);

        return back()->with('success', 'Área registrada correctamente.');
    }
}
