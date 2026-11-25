<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservacion extends Model
{
    protected $table = 'reservacions';

    protected $fillable = [
        'mesa_id',
        'nombre',
        'telefono',
        'fecha',
        'hora',
        'personas',
        'solicitudes',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
            'personas' => 'integer',
        ];
    }

    public function mesa(): BelongsTo
    {
        return $this->belongsTo(Mesa::class, 'mesa_id');
    }
}
