<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    // VISTAS DE NAVEGACIÓN
    public function inicio() {
        return view('NavegationViews.inicio');
    }

    public function explorar() {
        return view('NavegationViews.explorar');
    }

    public function carrito() {
        return view('NavegationViews.carrito');
    }

    public function pedidos() {
        return view('NavegationViews.pedidos');
    }

    // VISTAS DE REGISTRO (ADMIN, VENDEDOR)
    public function vendedor() {
        return view('RegisterViews.vendedor');
    }

    public function administrador() {
        return view('RegisterViews.administrador');
    }

    // PERFIL
    public function perfil() {
        return view('ProfileViews.perfil');
    }
}
