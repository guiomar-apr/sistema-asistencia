<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Area;
use App\Models\Cargo;
use App\Models\Profesion;

class C_Personal extends Controller
{
    public function index()
    {
        $personal = Personal::with('area', 'cargo', 'profesion')->get();
        return view('PERSONAL.ver_personal', compact('personal'));
    }

    public function crear(Request $request)
    {
        $areas = Area::all();
        $cargos = Cargo::all();
        $profesiones = Profesion::all();

        // Si es una petición AJAX, no se incluye el layout
        if ($request->ajax()) {
            return view('PERSONAL.agregar_personal', compact('areas', 'cargos', 'profesiones'));
        }

        // Si no es AJAX, retorna la vista completa con layout
        return view('PERSONAL.agregar_personal', compact('areas', 'cargos', 'profesiones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|size:8|unique:personal,dni',
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required|in:masculino,femenino,otro',
            'fecha_nacimiento' => 'required|date',
            'celular' => 'required',
            'correo' => 'nullable|email',
            'area_id' => 'required|exists:areas,id',
            'cargo_id' => 'required|exists:cargos,id',
            'profesion_id' => 'required|exists:profesiones,id',
        ]);

        $request['estado_personal'] = 'activo'; // por defecto
        Personal::create($request->all());

        return redirect('/personal')->with('success', 'Personal registrado correctamente');
    }
}
