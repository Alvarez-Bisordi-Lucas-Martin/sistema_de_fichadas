<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Variables desde .env o valores por defecto
        $name = env('USER_NAME', 'admin');
        $email = env('USER_EMAIL', 'admin@example.com');
        $password = env('USER_PASSWORD', 'admin');

        // Crear o actualizar usuario superadmin
        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password)
            ]
        );
    }
}
