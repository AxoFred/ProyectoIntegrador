<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Mostrar la vista del panel de vendedor
    public function VendedorVista()
    {
        return view('vendedor'); // Tu vista principal
    }

    // Mostrar todos los productos en JSON
    public function MostrarProductos()
    {
        try {
            $productos = DB::connection('mysql')->table('productos')->get();
            return response()->json($productos);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'No se pudieron obtener los productos']);
        }
    }

    // Registrar nuevo producto
    public function RegistrarProductos(Request $request)
    {
        try {
            $data = [
                'nombre' => $request->nombre,
                'marca' => $request->marca,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'estado' => $request->estado,
                'ID_categoria' => $request->ID_categoria,
                'ID_tienda' => $request->ID_tienda
            ];

            // Manejo de imagen
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('productos', 'public');
                $data['imagen'] = $path;
            }

            DB::connection('mysql')->table('productos')->insert($data);

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    // Actualizar producto
    public function ActualizarProductos(Request $request, $id)
    {
        try {
            $producto = DB::connection('mysql')->table('productos')->where('ID_producto', $id)->first();

            if (!$producto) {
                return response()->json(['success' => false, 'error' => 'Producto no encontrado']);
            }

            $data = [
                'nombre' => $request->nombre,
                'marca' => $request->marca,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'estado' => $request->estado,
                'ID_categoria' => $request->ID_categoria,
                'ID_tienda' => $request->ID_tienda
            ];

            // Reemplazar imagen si se envía nueva
            if ($request->hasFile('imagen')) {
                if ($producto->imagen) {
                    Storage::disk('public')->delete($producto->imagen);
                }
                $path = $request->file('imagen')->store('productos', 'public');
                $data['imagen'] = $path;
            }

            DB::connection('mysql')->table('productos')->where('ID_producto', $id)->update($data);

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    // Eliminar producto
    public function EliminarProductos($id)
    {
        try {
            $producto = DB::connection('mysql')->table('productos')->where('ID_producto', $id)->first();

            if (!$producto) {
                return response()->json(['success' => false, 'error' => 'Producto no encontrado']);
            }

            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }

            DB::connection('mysql')->table('productos')->where('ID_producto', $id)->delete();

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
