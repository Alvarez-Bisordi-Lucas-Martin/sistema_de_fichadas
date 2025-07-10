<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        $usuarios = User::count();
        $usuarios_verified = User::whereNotNull('email_verified_at')->count();

        return view('home', [
            'sidebar_active' => 'home',
            'usuarios' => $usuarios,
            'usuarios_verified' => $usuarios_verified
        ]);
    }
}
