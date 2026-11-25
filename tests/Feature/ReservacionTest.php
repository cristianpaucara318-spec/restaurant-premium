<?php

namespace Tests\Feature;

use App\Models\Mesa;
use App\Models\Reservacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservacionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_renders_the_initial_environment_and_reservation_card(): void
    {
        $this->get(route('reservaciones'))
            ->assertOk()
            ->assertSee('id="sala" data-ambiente="interior"', false)
            ->assertSee('id="vistaNumero"', false)
            ->assertSee('id="nombreMesa"', false)
            ->assertSee('id="capacidadMesa"', false)
            ->assertSee('id="ambienteMesa"', false)
            ->assertSee('id="estadoMesa"', false);
    }

    public function test_it_reports_mesas_with_overlapping_reservations(): void
    {
        $mesa = Mesa::create([
            'numero' => 'Mesa 1',
            'capacidad' => 4,
        ]);
        $fecha = now()->addDay()->toDateString();

        Reservacion::create([
            'mesa_id' => $mesa->id,
            'nombre' => 'Ana Prueba',
            'telefono' => '70000000',
            'fecha' => $fecha,
            'hora' => '18:00',
            'personas' => 2,
            'estado' => 'pendiente',
        ]);

        $this->getJson(route('reservaciones.disponibilidad', [
            'fecha' => $fecha,
            'hora' => '19:00',
        ]))
            ->assertOk()
            ->assertExactJson(['mesas_ocupadas' => [$mesa->id]]);

        $this->getJson(route('reservaciones.disponibilidad', [
            'fecha' => $fecha,
            'hora' => '20:00',
        ]))
            ->assertOk()
            ->assertExactJson(['mesas_ocupadas' => []]);
    }

    public function test_it_rejects_overlapping_reservations_and_accepts_back_to_back_times(): void
    {
        $mesa = Mesa::create([
            'numero' => 'Mesa 1',
            'capacidad' => 4,
        ]);
        $fecha = now()->addDay()->toDateString();

        Reservacion::create([
            'mesa_id' => $mesa->id,
            'nombre' => 'Ana Prueba',
            'telefono' => '70000000',
            'fecha' => $fecha,
            'hora' => '18:00',
            'personas' => 2,
            'estado' => 'pendiente',
        ]);

        $datos = [
            'mesa_id' => $mesa->id,
            'nombre' => 'Luis Prueba',
            'telefono' => '71111111',
            'fecha' => $fecha,
            'hora' => '19:30',
            'personas' => 2,
        ];

        $this->postJson(route('reservaciones.store'), $datos)
            ->assertUnprocessable()
            ->assertJsonPath('mensaje', 'Esta mesa ya está ocupada en ese horario. Selecciona otra.');

        $datos['hora'] = '20:00';

        $this->postJson(route('reservaciones.store'), $datos)
            ->assertOk()
            ->assertJsonPath('success', true);

        $this->assertDatabaseCount('reservacions', 2);
        $this->assertDatabaseHas('reservacions', [
            'mesa_id' => $mesa->id,
            'nombre' => 'Luis Prueba',
            'hora' => '20:00',
        ]);
    }
}
