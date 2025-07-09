<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entidad;
use App\Models\Fichada;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre', 'descripcion', 'entidad_id'];

    // Relacion producto pertenece a entidad
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }

    // Relacion producto tiene muchas fichadas
    public function fichadas()
    {
        return $this->hasMany(Fichada::class);
    }
}
