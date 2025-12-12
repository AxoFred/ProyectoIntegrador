<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    // Formulario para ingresar correo
    public function showEmailForm()
    {
        return view('ResetViews.forgot-password');
    }

    // Enviar email con link
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Usar el proveedor de usuarios y broker correcto
        $status = Password::broker('usuarios')->sendResetLink([
            'correo' => $request->email
        ]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Se envió el enlace a tu correo.')
            : back()->withErrors(['email' => 'No se pudo enviar el enlace.']);
    }

    // Formulario para restablecer con token
    public function showResetForm($token)
    {
        return view('ResetViews.reset-password', ['token' => $token]);
    }

    // Guardar nueva contraseña
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $status = Password::broker('usuarios')->reset(
            [
                'correo'   => $request->email,
                'password' => $request->password,
                'token'    => $request->token
            ],
            function ($user) use ($request) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('success', 'Contraseña restablecida.')
            : back()->withErrors(['email' => 'Error al restablecer la contraseña.']);
    }
}
