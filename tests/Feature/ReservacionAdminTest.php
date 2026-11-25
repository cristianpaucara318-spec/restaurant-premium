<?php

namespace Tests\Feature;

use App\Models\Reservacion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservacionAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_reservations(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        Reservacion::create([
            'nombre' => 'Ana Prueba',
            'telefono' => '70000000',
            'fecha' => now()->addDay()->toDateString(),
            'hora' => '19:00',
            'personas' => 2,
            'estado' => 'pendiente',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.reservaciones'))
            ->assertOk()
            ->assertSee('Ana Prueba')
            ->assertSee('href="https://wa.me/59170000000"', false)
            ->assertSee('Sin solicitudes especiales')
            ->assertSee('Confirmar');
    }

    public function test_admin_can_update_reservation_status(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $reservacion = Reservacion::create([
            'nombre' => 'Ana Prueba',
            'telefono' => '70000000',
            'fecha' => now()->addDay()->toDateString(),
            'hora' => '19:00',
            'personas' => 2,
            'estado' => 'pendiente',
        ]);

        $this->actingAs($admin)
            ->patch(route('admin.reservaciones.estado', $reservacion), [
                'estado' => 'confirmada',
            ])
            ->assertRedirect(route('admin.reservaciones'));

        $this->assertDatabaseHas('reservacions', [
            'id' => $reservacion->id,
            'estado' => 'confirmada',
        ]);
    }
}
