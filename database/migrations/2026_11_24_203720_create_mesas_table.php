<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();

            $table->string('numero')->unique();
            $table->unsignedTinyInteger('capacidad');

            $table->string('ambiente')->default('interior');

            $table->unsignedTinyInteger('posicion_x')->default(50);
            $table->unsignedTinyInteger('posicion_y')->default(50);

            $table->boolean('activa')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
