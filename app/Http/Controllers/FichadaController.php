<?php

namespace App\Http\Controllers;

use App\Models\Fichada;

class FichadaController extends Controller
{
    public function listar()
    {
        $fichadas = Fichada::all();
        return view('fichadas.listar', [
            'fichadas' => $fichadas,
            'sidebar_active' => 'fichadas'
        ]);
    }
}
