<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Area;
use App\Models\Cargo;
use App\Models\Profesion;

class C_Personal extends Controller
{
    public function index(Request $request)
    {
        $query = Personal::with(['area', 'cargo', 'profesion']);

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where(function ($q) use ($buscar) {
                $q->where('dni', 'like', "%$buscar%")
                ->orWhere('nombres', 'like', "%$buscar%")
                ->orWhere('apellidos', 'like', "%$buscar%");
            });
        }

        if ($request->filled('area_id')) {
            $query->where('area_id', $request->area_id);
        }

        if ($request->filled('profesion_id')) {
            $query->where('profesion_id', $request->profesion_id);
        }

        $personal = $query->get();
        $areas = Area::all();
        $profesiones = Profesion::all();

$conteoAreas = Area::withCount('personal')->get();

$conteoProfesiones = Profesion::withCount('personal')->get();


        return view('PERSONAL.ver_personal', compact('personal', 'areas', 'profesiones', 'conteoAreas', 'conteoProfesiones'));
    }

    public function destroy($id)
    {
        Personal::destroy($id);
        return redirect()->back()->with('success', 'Personal eliminado correctamente.');
    }

    public function edit($id)
    {
        $personal = Personal::findOrFail($id);
        $areas = Area::all();
        $cargos = Cargo::all();
        $profesiones = Profesion::all();
        return view('PERSONAL.editar_personal', compact('personal', 'areas', 'cargos', 'profesiones'));
    }

    public function update(Request $request, $id)
    {
        $personal = Personal::findOrFail($id);

        $request->validate([
            'dni' => "required|size:8|unique:personal,dni,$id",
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

        $personal->update($request->all());

        return redirect('/ver_personal')->with('success', 'Datos actualizados correctamente.');
    }
}
