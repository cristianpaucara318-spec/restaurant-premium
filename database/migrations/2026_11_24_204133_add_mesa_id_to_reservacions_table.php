<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservacions', function (Blueprint $table) {
            $table->foreignId('mesa_id')
                ->nullable()
                ->after('id')
                ->constrained('mesas')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('reservacions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('mesa_id');
        });
    }
};
