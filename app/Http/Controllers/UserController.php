<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}
