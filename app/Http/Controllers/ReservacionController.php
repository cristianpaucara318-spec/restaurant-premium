<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use App\Models\Mesa;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    // Mostrar mapa y mesas disponibles
    public function mapa(Request $request)
    {
        $mesas = Mesa::where('activa', true)
            ->orderBy('numero')
            ->get();

        return view('restaurante.reservaciones', compact('mesas'));
    }

    public function disponibilidad(Request $request)
    {
        $datos = $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
        ]);

        $reservaciones = Reservacion::whereDate('fecha', $datos['fecha'])
            ->whereIn('estado', ['pendiente', 'confirmada'])
            ->get(['mesa_id', 'hora']);

        $inicioSolicitado = \Carbon\Carbon::parse(
            $datos['fecha'] . ' ' . $datos['hora']
        );

        $finSolicitado = $inicioSolicitado->copy()->addHours(2);

        $mesasOcupadas = $reservaciones->filter(function ($reserva) use (
            $inicioSolicitado,
            $finSolicitado,
            $datos
        ) {
            $inicioExistente = \Carbon\Carbon::parse(
                $datos['fecha'] . ' ' . $reserva->hora
            );

            $finExistente = $inicioExistente->copy()->addHours(2);

            return $inicioExistente->lt($finSolicitado)
                && $finExistente->gt($inicioSolicitado);
        })->pluck('mesa_id')->unique()->values();

        return response()->json([
            'mesas_ocupadas' => $mesasOcupadas,
        ]);
    }

    // Registrar reservación
    public function store(Request $request)
    {
        $datos = $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'personas' => 'required|integer|min:1|max:8',
            'solicitudes' => 'nullable|string|max:1000',
        ]);

        $mesa = Mesa::where('activa', true)
            ->findOrFail($datos['mesa_id']);

        if ($datos['personas'] > $mesa->capacidad) {
            return response()->json([
                'success' => false,
                'mensaje' => 'La mesa seleccionada no tiene capacidad suficiente.',
            ], 422);
        }

        $reservacionesExistentes = Reservacion::where('mesa_id', $mesa->id)
            ->whereDate('fecha', $datos['fecha'])
            ->whereIn('estado', ['pendiente', 'confirmada'])
            ->get(['hora']);

        $inicioNuevo = \Carbon\Carbon::parse(
            $datos['fecha'] . ' ' . $datos['hora']
        );

        $finNuevo = $inicioNuevo->copy()->addHours(2);

        $ocupada = $reservacionesExistentes->contains(function ($reserva) use (
            $datos,
            $inicioNuevo,
            $finNuevo
        ) {
            $inicioExistente = \Carbon\Carbon::parse(
                $datos['fecha'] . ' ' . $reserva->hora
            );

            $finExistente = $inicioExistente->copy()->addHours(2);

            return $inicioExistente->lt($finNuevo)
                && $finExistente->gt($inicioNuevo);
        });

        if ($ocupada) {
            return response()->json([
                'success' => false,
                'mensaje' => 'Esta mesa ya está ocupada en ese horario. Selecciona otra.',
            ], 422);
        }

        $datos['estado'] = 'pendiente';

        $reservacion = Reservacion::create($datos);

        $mensaje = "Hola, quiero confirmar una reservación.%0A"
            . "Nombre: " . urlencode($reservacion->nombre) . "%0A"
            . "Teléfono: " . urlencode($reservacion->telefono) . "%0A"
            . "Mesa: " . urlencode($mesa->numero) . "%0A"
            . "Fecha: " . urlencode($reservacion->fecha->format('d/m/Y')) . "%0A"
            . "Hora: " . urlencode($reservacion->hora) . "%0A"
            . "Personas: " . $reservacion->personas . "%0A"
            . "Solicitudes: " . urlencode($reservacion->solicitudes ?? 'Ninguna');

        return response()->json([
            'success' => true,
            'mensaje' => 'Reservación guardada correctamente.',
            'whatsapp' => 'https://wa.me/59169688471?text=' . $mensaje,
        ]);
    }
}
