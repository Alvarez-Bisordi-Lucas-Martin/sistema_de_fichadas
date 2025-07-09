<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;

class PermisosSeeder extends Seeder
{
    public function run()
    {
        // Modelos y acciones para permisos
        $modelos = ['Permiso', 'Grupo', 'Entidad', 'Producto', 'Fichada', 'User'];
        $acciones = ['create', 'read', 'update', 'delete'];

        // Crear o actualizar permisos por cada modelo y accion
        foreach ($modelos as $modelo) {
            foreach ($acciones as $accion) {
                Permiso::updateOrCreate(
                    ['modelo' => $modelo, 'accion' => $accion],
                    []
                );
            }
        }
    }
}
