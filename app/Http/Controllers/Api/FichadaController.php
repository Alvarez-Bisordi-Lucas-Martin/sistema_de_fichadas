<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fichada;
use Illuminate\Http\Request;

class FichadaController extends Controller
{
    // Lista todas las fichadas
    public function index()
    {
        return Fichada::all();
    }

    // Crea fichada con producto_id del token validado, manejando imagen como archivo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_hora' => 'required|date',
            'tipo' => 'required|in:entrada,salida',
            'imagen' => 'nullable|file|mimes:jpg,jpeg,png,gif'
        ]);

        $fichada = new Fichada();
        $fichada->fecha_hora = $validated['fecha_hora'];
        $fichada->tipo = $validated['tipo'];
        $fichada->producto_id = $request->producto_id;

        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $fichada->imagen = file_get_contents($request->file('imagen')->getRealPath());
        }

        $fichada->save();

        return response()->json($fichada, 201);
    }

    // Muestra fichada especifica
    public function show(Fichada $fichada)
    {
        return $fichada;
    }

    // Actualiza fichada con datos validados y manejo de imagen como archivo
    public function update(Request $request, Fichada $fichada)
    {
        $validated = $request->validate([
            'fecha_hora' => 'sometimes|date',
            'tipo' => 'sometimes|in:entrada,salida',
            'imagen' => 'nullable|file|mimes:jpg,jpeg,png,gif'
        ]);

        if (isset($validated['fecha_hora'])) {
            $fichada->fecha_hora = $validated['fecha_hora'];
        }
        if (isset($validated['tipo'])) {
            $fichada->tipo = $validated['tipo'];
        }
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $fichada->imagen = file_get_contents($request->file('imagen')->getRealPath());
        }

        $fichada->save();

        return response()->json($fichada);
    }

    // Elimina fichada
    public function destroy(Fichada $fichada)
    {
        $fichada->delete();

        return response()->json(null, 204);
    }
}
