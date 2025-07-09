<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Entidad extends Model
{
    protected $table = 'entidades';

    protected $fillable = ['nombre', 'descripcion', 'imagen'];

    protected $hidden = ['imagen']; // Oculta imagen en respuestas

    // Relacion entidad tiene muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
