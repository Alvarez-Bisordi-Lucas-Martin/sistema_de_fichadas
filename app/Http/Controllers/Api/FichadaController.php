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
        $data = $request->validate([
            'fecha_hora' => 'required|date',
            'tipo' => 'required|in:entrada,salida',
            'imagen' => 'nullable|image|max:4096000',
            'producto_id' => 'required|exists:productos,id'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = file_get_contents($request->file('imagen')->getRealPath());
        }

        $fichada = Fichada::create($data);

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
        $data = $request->validate([
            'fecha_hora' => 'nullable|date',
            'tipo' => 'nullable|in:entrada,salida',
            'imagen' => 'nullable|image|max:4096000',
            'producto_id' => 'nullable|exists:productos,id'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = file_get_contents($request->file('imagen')->getRealPath());
        }

        $fichada->update($data);

        return response()->json($fichada);
    }

    // Elimina fichada
    public function destroy(Fichada $fichada)
    {
        $fichada->delete();

        return response()->json(null, 204);
    }
}
