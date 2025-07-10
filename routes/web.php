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
Route::get('/usuarios/crear', [UserController::class, 'crear'])->name('usuarios.crear');
Route::post('/usuarios', [UserController::class, 'guardar'])->name('usuarios.guardar');
Route::get('/usuarios/{id}/editar', [UserController::class, 'editar'])->name('usuarios.editar');
Route::put('/usuarios/{id}', [UserController::class, 'actualizar'])->name('usuarios.actualizar');
Route::delete('/usuarios/{id}', [UserController::class, 'eliminar'])->name('usuarios.eliminar');

Route::get('/grupos/listar', [GrupoController::class, 'listar'])->name('grupos.listar');
Route::get('/grupos/crear', [GrupoController::class, 'crear'])->name('grupos.crear');
Route::post('/grupos', [GrupoController::class, 'guardar'])->name('grupos.guardar');
Route::get('/grupos/{id}/editar', [GrupoController::class, 'editar'])->name('grupos.editar');
Route::put('/grupos/{id}', [GrupoController::class, 'actualizar'])->name('grupos.actualizar');
Route::delete('/grupos/{id}', [GrupoController::class, 'eliminar'])->name('grupos.eliminar');

Route::get('/entidades/listar', [EntidadController::class, 'listar'])->name('entidades.listar');
Route::get('/entidades/crear', [EntidadController::class, 'crear'])->name('entidades.crear');
Route::post('/entidades', [EntidadController::class, 'guardar'])->name('entidades.guardar');
Route::get('/entidades/{id}/editar', [EntidadController::class, 'editar'])->name('entidades.editar');
Route::put('/entidades/{id}', [EntidadController::class, 'actualizar'])->name('entidades.actualizar');
Route::delete('/entidades/{id}', [EntidadController::class, 'eliminar'])->name('entidades.eliminar');

Route::get('/productos/listar', [ProductoController::class, 'listar'])->name('productos.listar');
Route::get('/productos/crear', [ProductoController::class, 'crear'])->name('productos.crear');
Route::post('/productos', [ProductoController::class, 'guardar'])->name('productos.guardar');
Route::get('/productos/{id}/editar', [ProductoController::class, 'editar'])->name('productos.editar');
Route::put('/productos/{id}', [ProductoController::class, 'actualizar'])->name('productos.actualizar');
Route::delete('/productos/{id}', [ProductoController::class, 'eliminar'])->name('productos.eliminar');

Route::get('/fichadas/listar', [FichadaController::class, 'listar'])->name('fichadas.listar');
Route::get('/fichadas/exportar', [FichadaController::class, 'exportar'])->name('fichadas.exportar');
Route::get('/fichadas/crear', [FichadaController::class, 'crear'])->name('fichadas.crear');
Route::post('/fichadas', [FichadaController::class, 'guardar'])->name('fichadas.guardar');
Route::get('/fichadas/{id}/editar', [FichadaController::class, 'editar'])->name('fichadas.editar');
Route::put('/fichadas/{id}', [FichadaController::class, 'actualizar'])->name('fichadas.actualizar');
Route::delete('/fichadas/{id}', [FichadaController::class, 'eliminar'])->name('fichadas.eliminar');
