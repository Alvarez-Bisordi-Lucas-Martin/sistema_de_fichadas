<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\FichadaController;
use App\Http\Controllers\Api\EntidadController;
use App\Http\Controllers\Api\ProductoController;

// Generar token
Route::post('/token', [TokenController::class, 'generate_token']);

Route::middleware('check.custom.token')->group(function () {
    // Rutas para fichadas protegidas por middleware
    Route::apiResource('fichadas', FichadaController::class);
});

// Crear entidad
Route::post('/entidades', [EntidadController::class, 'store']);

// Crear producto
Route::post('/productos', [ProductoController::class, 'store']);
