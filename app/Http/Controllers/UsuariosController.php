<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    // Mostrar la vista del panel de usuarios
    public function UsuariosVista()
    {
        return view('RegisterViews.usuarios'); // Cambia por tu vista si es diferente
    }

    // Mostrar todos los usuarios en JSON
    public function MostrarUsuarios()
    {
        try {
            // Mostrar solo usuarios visibles
            $usuarios = DB::connection('mysql')->table('usuarios')->where('visible', 1)->get();
            return response()->json($usuarios);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'No se pudieron obtener los usuarios']);
        }
    }

    // Registrar nuevo usuario
    public function RegistrarUsuarios(Request $request)
    {
        try {
            DB::connection('mysql')->table('usuarios')->insert([
                'nombre' => $request->nombre,
                'Apaterno' => $request->Apaterno,
                'Amaterno' => $request->Amaterno,
                'correo' => $request->correo,
                'password' => bcrypt($request->password),
                'telefono' => $request->telefono,
                'estado' => $request->estado,
                'ID_rol' => $request->ID_rol,
                'visible' => 1 // agregar visible sin modificar nada más
            ]);

            

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }


    }

    // Actualizar usuario
    public function ActualizarUsuarios(Request $request, $id)
    {
        try {
            $data = [
                'nombre' => $request->nombre,
                'Apaterno' => $request->Apaterno,
                'Amaterno' => $request->Amaterno,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'estado' => $request->estado,
                'ID_rol' => $request->ID_rol
            ];

            // Solo actualizar contraseña si se envía
            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }

            DB::connection('mysql')->table('usuarios')->where('ID_usuario', $id)->update($data);

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    // Eliminar usuario (soft delete: solo ocultar)
    public function EliminarUsuarios($id)
    {
        try {
            if ($id == 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se puede eliminar al Administrador General'
                ]);
            }

            DB::connection('mysql')->table('usuarios')->where('ID_usuario', $id)->update(['visible' => 0]);

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

}
