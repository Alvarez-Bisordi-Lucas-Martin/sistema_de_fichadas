<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\User;
use App\Models\Permiso;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function listar()
    {
        $grupos = Grupo::all();
        
        return view('grupos.listar', [
            'grupos' => $grupos,
            'sidebar_active' => 'grupos'
        ]);
    }

    public function crear()
    {
        $usuarios = User::all();
        $permisos = Permiso::all();

        return view('grupos.crear', [
            'usuarios' => $usuarios,
            'permisos' => $permisos,
            'sidebar_active' => 'grupos'
        ]);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:grupos,nombre',
            'usuarios' => 'nullable|array',
            'usuarios.*' => 'exists:users,id',
            'permisos' => 'nullable|array',
            'permisos.*' => 'exists:permisos,id'
        ]);

        $grupo = Grupo::create([
            'nombre' => $request->nombre
        ]);

        if ($request->has('usuarios')) {
            $grupo->usuarios()->sync($request->usuarios);
        }

        if ($request->has('permisos')) {
            $grupo->permisos()->sync($request->permisos);
        }

        return redirect()->route('grupos.listar')->with('success', 'Grupo creado correctamente.');
    }

    public function editar($id)
    {
        $grupo = Grupo::findOrFail($id);
        $usuarios = User::all();
        $permisos = Permiso::all();

        return view('grupos.editar', [
            'grupo' => $grupo,
            'usuarios' => $usuarios,
            'permisos' => $permisos,
            'sidebar_active' => 'grupos'
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $grupo = Grupo::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|unique:grupos,nombre,' . $grupo->id,
            'usuarios' => 'nullable|array',
            'usuarios.*' => 'exists:users,id',
            'permisos' => 'nullable|array',
            'permisos.*' => 'exists:permisos,id'
        ]);

        $grupo->update([
            'nombre' => $request->nombre
        ]);
        
        $grupo->usuarios()->sync($request->usuarios ?? []);
        $grupo->permisos()->sync($request->permisos ?? []);

        return redirect()->route('grupos.listar')->with('success', 'Grupo actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->delete();

        return redirect()->route('grupos.listar')->with('success', 'Grupo eliminado correctamente.');
    }
}
