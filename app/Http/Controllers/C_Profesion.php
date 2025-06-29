<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesion;

class C_Profesion extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:profesiones,nombre' // corregido
        ]);

        Profesion::create(['nombre' => $request->nombre]);

        return back()->with('success', 'Profesión registrada correctamente.');
    }
}
