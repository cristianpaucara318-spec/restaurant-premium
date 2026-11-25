<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;

class AdminController extends Controller
{
    public function categorias()
    {
        $categorias = Producto::select('categoria')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('categoria')
            ->orderBy('categoria')
            ->get();

        $rows = $categorias->map(fn ($categoria) => [
            $categoria->categoria,
            $categoria->total,
        ])->all();

        return view('admin.seccion', [
            'titulo' => 'Categorías',
            'descripcion' => 'Categorías usadas por los productos registrados.',
            'encabezados' => ['Categoría', 'Productos'],
            'filas' => $rows,
        ]);
    }

    public function clientes()
    {
        $clientes = User::where('rol', 'cliente')
            ->latest()
            ->get();

        $rows = $clientes->map(fn ($cliente) => [
            $cliente->name,
            $cliente->email,
            $cliente->created_at?->format('d/m/Y'),
        ])->all();

        return view('admin.seccion', [
            'titulo' => 'Clientes',
            'descripcion' => 'Usuarios registrados con rol de cliente.',
            'encabezados' => ['Nombre', 'Correo', 'Registro'],
            'filas' => $rows,
        ]);
    }

    public function reservaciones()
    {
        return view('admin.seccion', [
            'titulo' => 'Reservaciones',
            'descripcion' => 'Aún no existe un módulo de almacenamiento para las reservaciones.',
            'encabezados' => [],
            'filas' => [],
        ]);
    }

    public function usuarios()
    {
        $usuarios = User::latest()->get();

        $rows = $usuarios->map(fn ($usuario) => [
            $usuario->name,
            $usuario->email,
            ucfirst($usuario->rol),
        ])->all();

        return view('admin.seccion', [
            'titulo' => 'Usuarios',
            'descripcion' => 'Usuarios registrados y sus roles de acceso.',
            'encabezados' => ['Nombre', 'Correo', 'Rol'],
            'filas' => $rows,
        ]);
    }

    public function configuracion()
    {
        return view('admin.seccion', [
            'titulo' => 'Configuración',
            'descripcion' => 'Información general del panel administrativo.',
            'encabezados' => ['Configuración', 'Valor'],
            'filas' => [
                ['Pedidos registrados', Pedido::count()],
                ['Productos registrados', Producto::count()],
                ['Usuarios registrados', User::count()],
            ],
        ]);
    }
}
