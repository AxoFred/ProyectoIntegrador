<?php 

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AutentificacionController extends Controller
{
    public function Autentificacion(Request $request)
    {
        try {
            $correo = $request->correo;
            $password = $request->password;

            // Buscar usuario por correo
            $usuario = DB::connection('mysql')
                ->table('usuarios')
                ->where('correo', $correo)
                ->first();

            // Usuario no encontrado
            if (!$usuario) {
                return redirect('/login')
                    ->with('sessionLogin', 'false')
                    ->with('Message', "Correo no encontrado");
            }

            // Validar contraseña encriptada
            if (!Hash::check($password, $usuario->password)) {
                return redirect('/login')
                    ->with('sessionLogin', 'false')
                    ->with('Message', "Contraseña incorrecta");
            }

            // Validar estado
            if (strtolower($usuario->estado) !== 'activo') {
                return redirect('/login')
                    ->with('sessionLogin', 'false')
                    ->with('Message', "Tu cuenta está inactiva");
            }

            // Crear sesión
            session([
                'ID_usuario' => $usuario->ID_usuario,
                'nombre' => $usuario->nombre,
                'rol' => $usuario->ID_rol,
                'loggeado' => true
            ]);
            
        } catch (Exception $e) {
            return redirect('/login')
                ->with('sessionLogin', 'false')
                ->with('Message', "Error inesperado: " . $e->getMessage());
        }

        // Inicio correcto
        return redirect('/inicio')
            ->with('sessionLogin', 'true')
            ->with('Message', "Bienvenido " . $usuario->nombre);
    }


    public function Inicio()
    {
        return view('NavegationViews.inicio');
    }
}
