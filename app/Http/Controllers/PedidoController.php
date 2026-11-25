<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre_cliente' => 'required|string|max:150',
            'telefono' => 'required|string|max:30',
            'tipo_pedido' => 'required|in:Entrega a domicilio,Recojo en restaurante',
            'direccion' => 'nullable|string|max:500',
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|integer|distinct|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1|max:100',
            'observaciones' => 'nullable|string|max:1000',
        ]);

        if ($datos['tipo_pedido'] === 'Entrega a domicilio') {
            $request->validate([
                'direccion' => 'required|string|max:500',
            ]);
        }

        $productosPedido = [];
        $total = 0;

        foreach ($datos['productos'] as $item) {
            $producto = Producto::findOrFail($item['producto_id']);

            if (!$producto->estado || $producto->stock < $item['cantidad']) {
                return response()->json([
                    'message' => 'El producto ' . $producto->nombre . ' no tiene stock suficiente.',
                ], 422);
            }

            $precio = (float) $producto->precio;
            $cantidad = (int) $item['cantidad'];
            $subtotal = round($precio * $cantidad, 2);

            $total += $subtotal;

            $productosPedido[] = [
                'producto_id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $precio,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal,
            ];
        }

        $pedido = Pedido::create([
            'nombre_cliente' => $datos['nombre_cliente'],
            'telefono' => $datos['telefono'],
            'tipo_pedido' => $datos['tipo_pedido'],
            'direccion' => $datos['tipo_pedido'] === 'Entrega a domicilio'
                ? $datos['direccion']
                : null,
            'productos' => $productosPedido,
            'total' => round($total, 2),
            'estado' => 'pendiente',
            'observaciones' => $datos['observaciones'] ?? null,
        ]);

        return response()->json([
            'message' => 'Pedido registrado correctamente.',
            'pedido_id' => $pedido->id,
            'productos' => $productosPedido,
            'total' => round($total, 2),
        ], 201);
    }

    public function index()
    {
        $pedidos = Pedido::latest()->get();

        return view('admin.pedidos', compact('pedidos'));
    }
}
