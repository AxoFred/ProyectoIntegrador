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
    // MOSTRAR TIENDAS (JSON) SOLO VISIBLES
    // ============================================================
    public function MostrarTiendas()
    {
        try {
            $tiendas = DB::table('tiendas')
                ->where('visible', 1)     // Mostrar únicamente las tiendas activas
                ->get();

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
            $request->validate([
                'nombre' => 'required|string|max:100',
                'metodo_pago' => 'required|integer|in:1,2,3',
                'ID_usuario_vendedor' => 'required|integer|exists:usuarios,ID_usuario',
                'logo' => 'nullable|image|max:2048',
            ]);

            $logoNombre = null;
            if ($request->hasFile('logo')) {
                $img = $request->file('logo');
                $logoNombre = time() . "_" . $img->getClientOriginalName();
                $img->storeAs('public/logos', $logoNombre);
            }

            DB::table('tiendas')->insert([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'redes' => $request->redes,
                'logo' => $logoNombre,
                'estado' => $request->estado ?? 'activo',
                'metodo_pago' => $request->metodo_pago,
                'ID_usuario_vendedor' => $request->ID_usuario_vendedor,
                'visible' => 1  // Siempre visible al registrarse
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
            $request->validate([
                'nombre' => 'required|string|max:100',
                'metodo_pago' => 'required|integer|in:1,2,3',
                'ID_usuario_vendedor' => 'required|integer|exists:usuarios,ID_usuario',
                'logo' => 'nullable|image|max:2048',
            ]);

            $data = [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'redes' => $request->redes,
                'estado' => $request->estado ?? 'activo',
                'metodo_pago' => $request->metodo_pago,
                'ID_usuario_vendedor' => $request->ID_usuario_vendedor
            ];

            if ($request->hasFile('logo')) {
                $img = $request->file('logo');
                $logoNombre = time() . "_" . $img->getClientOriginalName();
                $img->storeAs('public/logos', $logoNombre);
                $data['logo'] = $logoNombre;
            }

            DB::table('tiendas')
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
    // ELIMINAR TIENDA (SOFT DELETE)
    // ============================================================
    public function EliminarTienda($id)
    {
        try {
            DB::table('tiendas')
                ->where('ID_tienda', $id)
                ->update(['visible' => 0]);   // Ocultar en vez de eliminar

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    // ============================================================
    // SELECT: MÉTODOS DE PAGO
    // ============================================================
    public function ObtenerMetodosPago()
    {
        try {
            $metodos = [
                ['id'=>1,'nombre'=>'Efectivo'],
                ['id'=>2,'nombre'=>'Transferencia'],
                ['id'=>3,'nombre'=>'Efectivo y Transferencia']
            ];
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
            $vendedores = DB::table('usuarios')
                ->where('ID_rol', 2)
                ->select('ID_usuario', 'nombre')
                ->get();

            return response()->json($vendedores);

        } catch (Exception $e) {
            return response()->json(['success' => false]);
        }
    }
}
