<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Crea nuevo producto validado
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'entidad_id' => 'required|exists:entidades,id'
        ]);

        $producto = Producto::create($validated);

        return response()->json($producto, 201);
    }
}
