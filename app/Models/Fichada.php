<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Fichada extends Model
{
    protected $table = 'fichadas';

    protected $fillable = ['fecha_hora', 'tipo', 'imagen', 'producto_id'];

    // Relacion fichada pertenece a producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
