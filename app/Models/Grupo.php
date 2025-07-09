<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permiso;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $fillable = ['nombre'];

    // Relacion grupo a muchos usuarios
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'grupo_usuario', 'grupo_id', 'usuario_id');
    }

    // Relacion grupo a muchos permisos
    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'grupo_permiso');
    }
}
