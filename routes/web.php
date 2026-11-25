<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ReservacionAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReservacionController;

// PÁGINAS PRINCIPALES
Route::get('/', function () {
    return view('restaurante.inicio');
})->name('inicio');

Route::get('/menu', function () {
    $productos = \App\Models\Producto::where('estado', true)
        ->where('stock', '>', 0)
        ->orderBy('categoria')
        ->orderBy('nombre')
        ->get();

    return view('restaurante.menu', compact('productos'));
})->name('menu');

Route::get('/nosotros', function () {
    return view('restaurante.nosotros');
})->name('nosotros');

Route::get('/reservaciones', [ReservacionController::class, 'mapa'])
    ->name('reservaciones');

Route::get('/reservaciones/disponibilidad', [
    ReservacionController::class,
    'disponibilidad'
])->name('reservaciones.disponibilidad');

Route::get('/contacto', function () {
    return view('restaurante.contacto');
})->name('contacto');

// ACCESO DE USUARIOS
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/registro', function () {
    return view('auth.registro');
})->name('registro');

Route::post('/registro', [RegistroController::class, 'store'])
    ->name('registro.store');

Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

// REGISTRO DE PEDIDOS DE CLIENTES
Route::post('/pedidos', [PedidoController::class, 'store'])
    ->name('pedidos.store');

Route::post('/reservaciones', [ReservacionController::class, 'store'])
    ->name('reservaciones.store');

// PANEL ADMINISTRATIVO
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('productos', ProductoController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/admin/categorias', [AdminController::class, 'categorias'])
        ->name('admin.categorias');

    Route::get('/pedidos', [PedidoController::class, 'index'])
        ->name('pedidos.index');

    Route::get('/admin/pedidos', [PedidoController::class, 'index'])
        ->name('admin.pedidos');

    Route::get('/admin/clientes', [AdminController::class, 'clientes'])
        ->name('admin.clientes');

    // GESTIÓN DE RESERVACIONES
    Route::get('/admin/reservaciones', [ReservacionAdminController::class, 'index'])
        ->name('admin.reservaciones');

    Route::patch('/admin/reservaciones/{reservacion}/estado', [
        ReservacionAdminController::class,
        'actualizarEstado'
    ])->name('admin.reservaciones.estado');

    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])
        ->name('admin.usuarios');

    Route::get('/admin/configuracion', [AdminController::class, 'configuracion'])
        ->name('admin.configuracion');
});
