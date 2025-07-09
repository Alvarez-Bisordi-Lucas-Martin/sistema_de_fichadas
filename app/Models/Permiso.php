<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;

class Permiso extends Model
{
    protected $table = 'permisos';

    protected $fillable = ['modelo', 'accion'];

    // Relacion permisos a muchos grupos
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_permiso');
    }
}
