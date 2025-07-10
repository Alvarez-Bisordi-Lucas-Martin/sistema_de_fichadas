<?php

namespace App\Http\Controllers;

use App\Models\Entidad;

class EntidadController extends Controller
{
    public function listar()
    {
        $entidades = Entidad::all();
        return view('entidades.listar', [
            'entidades' => $entidades,
            'sidebar_active' => 'entidades'
        ]);
    }
}
