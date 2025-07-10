<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\EntidadController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FichadaController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/usuarios/listar', [UserController::class, 'listar'])->name('usuarios.listar');

Route::get('/grupos/listar', [GrupoController::class, 'listar'])->name('grupos.listar');

Route::get('/entidades/listar', [EntidadController::class, 'listar'])->name('entidades.listar');

Route::get('/productos/listar', [ProductoController::class, 'listar'])->name('productos.listar');

Route::get('/fichadas/listar', [FichadaController::class, 'listar'])->name('fichadas.listar');
