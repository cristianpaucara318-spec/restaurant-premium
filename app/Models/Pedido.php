<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'nombre_cliente',
        'telefono',
        'tipo_pedido',
        'direccion',
        'productos',
        'total',
        'estado',
        'observaciones',
    ];

    protected function casts(): array
    {
        return [
            'productos' => 'array',
            'total' => 'decimal:2',
        ];
    }
}
