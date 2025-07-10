<?php

namespace App\Http\Controllers;

use App\Models\Fichada;
use App\Models\Producto;
use Illuminate\Http\Request;

class FichadaController extends Controller
{
    public function listar()
    {
        $fichadas = Fichada::all();
        
        return view('fichadas.listar', [
            'fichadas' => $fichadas,
            'sidebar_active' => 'fichadas'
        ]);
    }

    public function crear()
    {
        $productos = Producto::all();

        return view('fichadas.crear', [
            'productos' => $productos,
            'sidebar_active' => 'fichadas'
        ]);
    }

    public function guardar(Request $request)
    {
        $data = $request->validate([
            'fecha_hora' => 'required|date',
            'tipo' => 'required|in:entrada,salida',
            'imagen' => 'nullable|image|max:4096000',
            'producto_id' => 'required|exists:productos,id'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = file_get_contents($request->file('imagen')->getRealPath());
        }

        Fichada::create($data);

        return redirect()->route('fichadas.listar')->with('success', 'Fichada creada correctamente.');
    }

    public function editar($id)
    {
        $fichada = Fichada::findOrFail($id);
        $productos = Producto::all();

        return view('fichadas.editar', [
            'fichada' => $fichada,
            'productos' => $productos,
            'sidebar_active' => 'fichadas'
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $fichada = Fichada::findOrFail($id);

        $data = $request->validate([
            'fecha_hora' => 'required|date',
            'tipo' => 'required|in:entrada,salida',
            'imagen' => 'nullable|image|max:4096000',
            'producto_id' => 'required|exists:productos,id'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = file_get_contents($request->file('imagen')->getRealPath());
        }
        else {
            unset($data['imagen']);
        }

        $fichada->update($data);

        return redirect()->route('fichadas.listar')->with('success', 'Fichada actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $fichada = Fichada::findOrFail($id);
        $fichada->delete();

        return redirect()->route('fichadas.listar')->with('success', 'Fichada eliminada correctamente.');
    }
}
