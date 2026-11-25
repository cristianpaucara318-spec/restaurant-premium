
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            // Datos del cliente
            $table->string('nombre_cliente');
            $table->string('telefono');
            $table->string('tipo_pedido');
            $table->text('direccion')->nullable();

            // Productos y cantidades del pedido
            $table->longText('productos');

            // Información económica
            $table->decimal('total', 10, 2);

            // Estado del pedido
            $table->string('estado')->default('pendiente');

            // Observaciones
            $table->text('observaciones')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
