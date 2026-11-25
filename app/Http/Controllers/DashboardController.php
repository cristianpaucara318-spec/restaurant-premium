<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Producto::count();

        $totalPedidos = Pedido::count();

        $totalClientes = User::where('rol', 'cliente')->count();

        $unidadesDisponibles = Producto::sum('stock');

        $productosAgotados = Producto::where('stock', 0)->count();

        $ventasHoy = Pedido::whereDate('created_at', today())
            ->where('estado', 'completado')
            ->sum('total');

        return view('admin.dashboard', compact(
            'totalProductos',
            'totalPedidos',
            'totalClientes',
            'unidadesDisponibles',
            'productosAgotados',
            'ventasHoy'
        ));
    }
}
