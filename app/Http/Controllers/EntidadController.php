<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    public function listar()
    {
        $entidades = Entidad::all();

        return view('entidades.listar', [
            'entidades' => $entidades,
            'sidebar_active' => 'entidades'
        ]);
    }

    public function crear()
    {
        return view('entidades.crear', [
            'sidebar_active' => 'entidades'
        ]);
    }

    public function guardar(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:4096000'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = file_get_contents($request->file('imagen')->getRealPath());
        }

        Entidad::create($data);

        return redirect()->route('entidades.listar')->with('success', 'Entidad creada correctamente.');
    }

    public function editar($id)
    {
        $entidad = Entidad::findOrFail($id);

        return view('entidades.editar', [
            'entidad' => $entidad,
            'sidebar_active' => 'entidades'
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $entidad = Entidad::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:4096000'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = file_get_contents($request->file('imagen')->getRealPath());
        }
        else {
            unset($data['imagen']);
        }

        $entidad->update($data);

        return redirect()->route('entidades.listar')->with('success', 'Entidad actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $entidad = Entidad::findOrFail($id);

        $entidad->delete();

        return redirect()->route('entidades.listar')->with('success', 'Entidad eliminada correctamente.');
    }
}
