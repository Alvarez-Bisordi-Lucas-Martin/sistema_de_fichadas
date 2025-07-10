<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    // Genera token para producto valido
    public function generateToken(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|integer|exists:productos,id',
            'producto_nombre' => 'required|string'
        ]);

        $producto = Producto::where('id', $request->producto_id)
            ->where('nombre', $request->producto_nombre)
            ->first();

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Token aleatorio y fecha expiracion (1 dia)
        $token = Str::random(60);
        $expires_at = Carbon::now()->addDay();

        // Guarda token con hash y expiracion
        DB::table('tokens')->updateOrInsert(
            ['producto_id' => $producto->id],
            ['token' => hash('sha256', $token), 'expires_at' => $expires_at, 'created_at' => now()]
        );

        return response()->json([
            'token' => $token,
            'expires_at' => $expires_at->toDateTimeString()
        ]);
    }
}
