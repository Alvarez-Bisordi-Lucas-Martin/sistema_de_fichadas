<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Entidad;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function listar()
    {
        $productos = Producto::all();

        return view('productos.listar', [
            'productos' => $productos,
            'sidebar_active' => 'productos'
        ]);
    }

    public function crear()
    {
        $entidades = Entidad::all();

        return view('productos.crear', [
            'entidades' => $entidades,
            'sidebar_active' => 'productos'
        ]);
    }

    public function guardar(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'entidad_id' => 'required|exists:entidades,id'
        ]);

        Producto::create($data);

        return redirect()->route('productos.listar')->with('success', 'Producto creado correctamente.');
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $entidades = Entidad::all();

        return view('productos.editar', [
            'producto' => $producto,
            'entidades' => $entidades,
            'sidebar_active' => 'productos'
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'entidad_id' => 'required|exists:entidades,id'
        ]);

        $producto->update($data);

        return redirect()->route('productos.listar')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect()->route('productos.listar')->with('success', 'Producto eliminado correctamente.');
    }
}
