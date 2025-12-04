<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    // ============================================================
    // VISTA PRINCIPAL
    // ============================================================
    public function TiendasVista()
    {
        return view('RegisterViews.tiendas');
    }

    // ============================================================
    // MOSTRAR TIENDAS (JSON)
    // ============================================================
    public function MostrarTiendas()
    {
        try {
            $tiendas = DB::connection('mysql')->table('tiendas')->get();
            return response()->json($tiendas);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'No se pudieron obtener las tiendas'
            ]);
        }
    }

    // ============================================================
    // REGISTRAR TIENDA
    // ============================================================
    public function RegistrarTienda(Request $request)
    {
        try {
            $logoNombre = null;

            if ($request->hasFile('logo')) {
                $img = $request->file('logo');
                $logoNombre = time() . "_" . $img->getClientOriginalName();
                $img->storeAs('public', $logoNombre);
            }

            DB::connection('mysql')->table('tiendas')->insert([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'redes' => $request->redes,
                'logo' => $logoNombre,
                'estado' => $request->estado,
                'ID_horario' => $request->ID_horario,
                'ID_metodo_pago' => $request->ID_metodo_pago,
                'ID_usuario_vendedor' => $request->ID_usuario_vendedor,
            ]);

            return response()->json(['success' => true]);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    // ============================================================
    // ACTUALIZAR TIENDA
    // ============================================================
    public function ActualizarTienda(Request $request, $id)
    {
        try {
            $data = [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'redes' => $request->redes,
                'estado' => $request->estado,
                'ID_horario' => $request->ID_horario,
                'ID_metodo_pago' => $request->ID_metodo_pago,
                'ID_usuario_vendedor' => $request->ID_usuario_vendedor,
            ];

            // Si viene un nuevo logo
            if ($request->hasFile('logo')) {
                $img = $request->file('logo');
                $logoNombre = time() . "_" . $img->getClientOriginalName();
                $img->storeAs('public', $logoNombre);

                $data['logo'] = $logoNombre;
            }

            DB::connection('mysql')->table('tiendas')
                ->where('ID_tienda', $id)
                ->update($data);

            return response()->json(['success' => true]);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    // ============================================================
    // ELIMINAR TIENDA
    // ============================================================
    public function EliminarTienda($id)
    {
        try {
            DB::connection('mysql')->table('tiendas')
                ->where('ID_tienda', $id)
                ->delete();

            return response()->json(['success' => true]);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    // ============================================================
    // SELECT: HORARIOS
    // ============================================================
    public function ObtenerHorarios()
    {
        try {
            $horarios = DB::connection('mysql')->table('horarios')->get();
            return response()->json($horarios);

        } catch (Exception $e) {
            return response()->json(['success' => false]);
        }
    }

    // ============================================================
    // SELECT: MÉTODOS DE PAGO
    // ============================================================
    public function ObtenerMetodosPago()
    {
        try {
            $metodos = DB::connection('mysql')->table('metodos_pago')->get();
            return response()->json($metodos);

        } catch (Exception $e) {
            return response()->json(['success' => false]);
        }
    }

    // ============================================================
    // SELECT: VENDEDORES
    // ============================================================
    public function ObtenerVendedores()
    {
        try {
            $vendedores = DB::connection('mysql')->table('usuarios')
                ->where('ID_rol', 2) // Rol vendedor
                ->get();

            return response()->json($vendedores);

        } catch (Exception $e) {
            return response()->json(['success' => false]);
        }
    }
}
