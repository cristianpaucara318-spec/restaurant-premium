<?php

namespace Tests\Feature;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_an_order_using_the_product_database_price(): void
    {
        $producto = Producto::create([
            'nombre' => 'Pollo a la parrilla',
            'categoria' => 'Platos principales',
            'precio' => 45,
            'stock' => 5,
            'estado' => true,
        ]);

        $response = $this->postJson(route('pedidos.store'), [
            'nombre_cliente' => 'Ana Prueba',
            'telefono' => '70000000',
            'tipo_pedido' => 'Recojo en restaurante',
            'productos' => [
                [
                    'producto_id' => $producto->id,
                    'cantidad' => 2,
                    'precio' => 0.01,
                ],
            ],
            'total' => 0.02,
        ]);

        $response->assertCreated()
            ->assertJsonPath('productos.0.producto_id', $producto->id)
            ->assertJsonPath('productos.0.precio', 45)
            ->assertJsonPath('total', 90);

        $this->assertDatabaseHas('pedidos', [
            'nombre_cliente' => 'Ana Prueba',
            'telefono' => '70000000',
            'estado' => 'pendiente',
        ]);
    }

    public function test_it_rejects_an_order_when_stock_is_insufficient(): void
    {
        $producto = Producto::create([
            'nombre' => 'Pollo a la parrilla',
            'categoria' => 'Platos principales',
            'precio' => 45,
            'stock' => 1,
            'estado' => true,
        ]);

        $response = $this->postJson(route('pedidos.store'), [
            'nombre_cliente' => 'Ana Prueba',
            'telefono' => '70000000',
            'tipo_pedido' => 'Recojo en restaurante',
            'productos' => [
                [
                    'producto_id' => $producto->id,
                    'cantidad' => 2,
                ],
            ],
        ]);

        $response->assertUnprocessable()
            ->assertJsonPath('message', 'El producto Pollo a la parrilla no tiene stock suficiente.');

        $this->assertDatabaseCount('pedidos', 0);
    }
}
