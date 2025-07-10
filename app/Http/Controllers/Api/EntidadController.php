<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    // Crea nueva entidad validando entrada
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|file|mimes:jpg,jpeg,png,gif'
        ]);

        $entidad = new Entidad();
        $entidad->nombre = $validated['nombre'];
        $entidad->descripcion = $validated['descripcion'] ?? null;

        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $entidad->imagen = file_get_contents($request->file('imagen')->getRealPath());
        }

        $entidad->save();

        return response()->json($entidad, 201);
    }
}
