<?php

namespace App\Http\Controllers;

use App\Models\Grupo;

class GrupoController extends Controller
{
    public function listar()
    {
        $grupos = Grupo::all();
        return view('grupos.listar', [
            'grupos' => $grupos,
            'sidebar_active' => 'grupos'
        ]);
    }
}
