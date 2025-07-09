<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CheckCustomToken
{
    // Valida token personalizado en header Authorization
    public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return response()->json(['message' => 'Token no proporcionado'], 401);
        }

        $token = $matches[1];
        $hashedToken = hash('sha256', $token);

        // Busca token en BD
        $record = DB::table('tokens')
            ->where('token', $hashedToken)
            ->first();

        if (!$record) {
            return response()->json(['message' => 'Token invalido'], 401);
        }

        // Valida expiracion
        if (Carbon::now()->gt(Carbon::parse($record->expires_at))) {
            return response()->json(['message' => 'Token expirado'], 401);
        }

        // Agrega producto_id al request
        $request->merge(['producto_id' => $record->producto_id]);

        return $next($request);
    }
}
