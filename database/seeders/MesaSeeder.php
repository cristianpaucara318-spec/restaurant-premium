<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mesa;

class MesaSeeder extends Seeder
{
    public function run(): void
    {
        $mesas = [
            ['numero' => 'Mesa 1', 'capacidad' => 2, 'ambiente' => 'interior', 'posicion_x' => 20, 'posicion_y' => 20],
            ['numero' => 'Mesa 2', 'capacidad' => 2, 'ambiente' => 'interior', 'posicion_x' => 50, 'posicion_y' => 20],

            ['numero' => 'Mesa 3', 'capacidad' => 4, 'ambiente' => 'interior', 'posicion_x' => 80, 'posicion_y' => 20],
            ['numero' => 'Mesa 4', 'capacidad' => 4, 'ambiente' => 'interior', 'posicion_x' => 20, 'posicion_y' => 45],
            ['numero' => 'Mesa 5', 'capacidad' => 4, 'ambiente' => 'interior', 'posicion_x' => 50, 'posicion_y' => 45],
            ['numero' => 'Mesa 6', 'capacidad' => 4, 'ambiente' => 'interior', 'posicion_x' => 80, 'posicion_y' => 45],

            ['numero' => 'Mesa 7', 'capacidad' => 6, 'ambiente' => 'terraza', 'posicion_x' => 20, 'posicion_y' => 75],
            ['numero' => 'Mesa 8', 'capacidad' => 6, 'ambiente' => 'terraza', 'posicion_x' => 50, 'posicion_y' => 75],
            ['numero' => 'Mesa 9', 'capacidad' => 6, 'ambiente' => 'terraza', 'posicion_x' => 80, 'posicion_y' => 75],

            ['numero' => 'Mesa 10', 'capacidad' => 8, 'ambiente' => 'privado', 'posicion_x' => 20, 'posicion_y' => 90],
            ['numero' => 'Mesa 11', 'capacidad' => 8, 'ambiente' => 'privado', 'posicion_x' => 50, 'posicion_y' => 90],
            ['numero' => 'Mesa 12', 'capacidad' => 8, 'ambiente' => 'privado', 'posicion_x' => 80, 'posicion_y' => 90],
        ];

        foreach ($mesas as $mesa) {
            Mesa::updateOrCreate(
                ['numero' => $mesa['numero']],
                $mesa
            );
        }
    }
}
