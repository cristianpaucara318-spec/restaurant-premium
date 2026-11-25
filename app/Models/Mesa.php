<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mesa extends Model
{
    protected $table = 'mesas';

    protected $fillable = [
        'numero',
        'capacidad',
        'ambiente',
        'posicion_x',
        'posicion_y',
        'activa',
    ];

    protected function casts(): array
    {
        return [
            'capacidad' => 'integer',
            'posicion_x' => 'integer',
            'posicion_y' => 'integer',
            'activa' => 'boolean',
        ];
    }

    public function reservaciones(): HasMany
    {
        return $this->hasMany(Reservacion::class, 'mesa_id');
    }
}
