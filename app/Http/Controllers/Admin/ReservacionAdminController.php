<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionAdminController extends Controller
{
    public function index(Request $request)
    {
        $consulta = Reservacion::with('mesa');

        // Buscar por nombre o teléfono
        if ($request->filled('buscar')) {
            $buscar = $request->buscar;

            $consulta->where(function ($query) use ($buscar) {
                $query->where('nombre', 'LIKE', "%{$buscar}%")
                    ->orWhere('telefono', 'LIKE', "%{$buscar}%");
            });
        }

        // Filtrar por fecha
        if ($request->filled('fecha')) {
            $consulta->whereDate('fecha', $request->fecha);
        }

        // Filtrar por estado
        if ($request->filled('estado')) {
            $consulta->where('estado', $request->estado);
        }

        $reservaciones = $consulta
            ->orderByDesc('fecha')
            ->orderBy('hora')
            ->paginate(12)
            ->withQueryString();

        return view('admin.reservaciones.index', compact('reservaciones'));
    }

    public function actualizarEstado(Request $request, Reservacion $reservacion)
    {
        $request->validate([
            'estado' => 'required|in:confirmada,cancelada',
        ]);

        $reservacion->update([
            'estado' => $request->estado,
        ]);

        return redirect()
            ->route('admin.reservaciones')
            ->with('success', 'Estado de la reservación actualizado correctamente.');
    }
}
