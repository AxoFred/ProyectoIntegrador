<?php

use Illuminate\Support\Facades\Route;

// ================================
// CONTROLADORES
// ================================
use App\Http\Controllers\AutentificacionController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TiendaController;


// ================================
// RUTAS GENERALES
// ================================
Route::get('/', function () {
    return view('welcome.bienvenida');
});

// Login
Route::get('/login', function () {
    return view('AuthViews.login');
});

Route::post('/autentificacion', [AutentificacionController::class, 'Autentificacion']);
Route::get('/inicio', [AutentificacionController::class, 'Inicio']);


// ================================
// MENU HEADER
// ================================
Route::controller(HeaderController::class)->group(function () {
    Route::get('/inicio', 'inicio')->name('inicio');
    Route::get('/explorar', 'explorar')->name('explorar');
    Route::get('/carrito', 'carrito')->name('carrito');
    Route::get('/pedidos', 'pedidos')->name('pedidos');
    Route::get('/vendedor', 'vendedor')->name('vendedor');
    Route::get('/administrador', 'administrador')->name('administrador');
    Route::get('/perfil', 'perfil')->name('perfil');
});


// ================================
// CRUD USUARIOS
// ================================
Route::get('/usuarios/vista', [UsuariosController::class, 'UsuariosVista'])->name('usuarios.vista');
Route::get('/usuarios/mostrar', [UsuariosController::class, 'MostrarUsuarios'])->name('usuarios.mostrar');
Route::post('/usuarios/registrar', [UsuariosController::class, 'RegistrarUsuarios'])->name('usuarios.registrar');
Route::post('/usuarios/actualizar/{id}', [UsuariosController::class, 'ActualizarUsuarios'])->name('usuarios.actualizar');
Route::delete('/usuarios/eliminar/{id}', [UsuariosController::class, 'EliminarUsuarios'])->name('usuarios.eliminar');


// ================================
// CRUD PRODUCTOS
// ================================
Route::get('/productos/mostrar', [ProductController::class, 'MostrarProductos'])->name('productos.mostrar');
Route::post('/productos/registrar', [ProductController::class, 'RegistrarProductos'])->name('productos.registrar');
Route::post('/productos/actualizar/{id}', [ProductController::class, 'ActualizarProductos'])->name('productos.actualizar');
Route::delete('/productos/eliminar/{id}', [ProductController::class, 'EliminarProductos'])->name('productos.eliminar');


// ================================
//tiendas
Route::get('/tiendas', [TiendaController::class, 'TiendasVista'])->name('tiendas.vista');
Route::get('/tiendas/mostrar', [TiendaController::class, 'MostrarTiendas'])->name('tiendas.mostrar');
Route::post('/tiendas/registrar', [TiendaController::class, 'RegistrarTienda'])->name('tiendas.registrar');
Route::post('/tiendas/actualizar/{id}', [TiendaController::class, 'ActualizarTienda'])->name('tiendas.actualizar');
Route::delete('/tiendas/eliminar/{id}', [TiendaController::class, 'EliminarTienda'])->name('tiendas.eliminar');

Route::get('/tiendas/obtener-horarios', [TiendaController::class, 'ObtenerHorarios']);
Route::get('/tiendas/obtener-metodos', [TiendaController::class, 'ObtenerMetodosPago']);
Route::get('/tiendas/obtener-vendedores', [TiendaController::class, 'ObtenerVendedores']);

