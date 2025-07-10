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
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'email_verified_at' => 'nullable|date'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => $request->email_verified_at ?? null
        ]);

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

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'nullable|min:6',
            'email_verified_at' => 'nullable|date'
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->email_verified_at = $request->email_verified_at ?? null;

        $usuario->save();

        return redirect()->route('usuarios.listar')->with('success', 'Usuario actualizado.');
    }

    public function eliminar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.listar')->with('success', 'Usuario eliminado.');
    }
}
