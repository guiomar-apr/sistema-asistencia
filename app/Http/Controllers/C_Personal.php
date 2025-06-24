<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Area;
use App\Models\Cargo;
use App\Models\Profesion;
use Illuminate\Http\Request;

class C_Personal extends Controller
{
    public function create()
    {
        $areas = Area::all();
        $cargos = Cargo::all();
        $profesiones = Profesion::all();
        return view('Personal.agregar_personal', compact('areas', 'cargos', 'profesiones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8|unique:personal,dni',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'sexo' => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',
            'celular' => 'required',
            'correo' => 'nullable|email',
            'area_id' => 'required|exists:areas,id',
            'cargo_id' => 'required|exists:cargos,id',
            'profesion_id' => 'required|exists:profesiones,id',
        ]);

        Personal::create($request->all());

        return redirect()->back()->with('success', 'Personal registrado correctamente.');
    }

    public function index()
    {
        $personal = Personal::with(['area', 'cargo', 'profesion'])->get();
        return view('Personal.ver_personal', compact('personal'));
    }
}
