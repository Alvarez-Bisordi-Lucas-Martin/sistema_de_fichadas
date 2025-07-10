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
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:4096000'
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = file_get_contents($request->file('imagen')->getRealPath());
        }

        $entidad = Entidad::create($data);

        return response()->json($entidad, 201);
    }
}
