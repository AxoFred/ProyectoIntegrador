<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome.bienvenida');
});

Route::get('/login', function () {
    return view('AuthViews.login');
});

Route::get('/inicio', function () {
    return view('NavegationViews.inicio');
});

Route::get('/explorar', function () {
    return view('NavegationViews.explorar');
});

Route::get('/carrito', function () {
    return view('NavegationViews.carrito');
});

Route::get('/pedidos', function () {
    return view('NavegationViews.pedidos');
});

Route::get('/vendedor', function () {
    return view('RegisterViews.vendedor');
});

Route::get('/administrador', function () {
    return view('RegisterViews.administrador');
});

Route::get('/perfil', function () {
    return view('profileViews.perfil');
});
