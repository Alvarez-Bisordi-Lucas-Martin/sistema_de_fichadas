<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listar()
    {
        $usuarios = User::all();

        return view('usuarios.listar', [
            'usuarios' => $usuarios,
            'sidebar_active' => 'usuarios'
        ]);
    }

    public function crear()
    {
        return view('usuarios.crear', [
            'sidebar_active' => 'usuarios'
        ]);
    }

    public function guardar(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'email_verified_at' => 'nullable|date'
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('usuarios.listar')->with('success', 'Usuario creado correctamente.');
    }

    public function editar($id)
    {
        $usuario = User::findOrFail($id);
        
        return view('usuarios.editar', [
            'usuario' => $usuario,
            'sidebar_active' => 'usuarios'
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'nullable|min:6',
            'email_verified_at' => 'nullable|date'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }
        else {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.listar')->with('success', 'Usuario actualizado.');
    }

    public function eliminar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.listar')->with('success', 'Usuario eliminado.');
    }
}
