<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Ejecuta seeders principales
    public function run()
    {
        $this->call([
            PermisosSeeder::class,
            SuperUserSeeder::class,
        ]);
    }
}
