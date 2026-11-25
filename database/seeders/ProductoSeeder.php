<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $platos = [
            [
                'nombre_anterior' => 'Lomo saltado',
                'nombre' => 'Hamburguesa con papas',
                'categoria' => 'Platos principales',
                'descripcion' => 'Hamburguesa de carne a la parrilla con vegetales frescos y papas fritas.',
                'precio' => 52.00,
                'imagen' => 'https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Pasta Alfredo',
                'nombre' => 'Espagueti con vegetales',
                'categoria' => 'Platos principales',
                'descripcion' => 'Espagueti con tomates cherry, vegetales frescos y hierbas.',
                'precio' => 42.00,
                'imagen' => 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Pizza Margarita',
                'nombre' => 'Pizza con aceitunas',
                'categoria' => 'Platos principales',
                'descripcion' => 'Pizza artesanal con queso, aceitunas y hierbas frescas.',
                'precio' => 40.00,
                'imagen' => 'https://images.pexels.com/photos/315755/pexels-photo-315755.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Hamburguesa Premium',
                'nombre' => 'Hamburguesa con queso',
                'categoria' => 'Platos principales',
                'descripcion' => 'Hamburguesa de carne a la parrilla con queso y vegetales frescos.',
                'precio' => 38.00,
                'imagen' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Costillas BBQ',
                'nombre' => 'Penne con salsa roja',
                'categoria' => 'Platos principales',
                'descripcion' => 'Pasta penne con salsa de tomate y hierbas frescas.',
                'precio' => 58.00,
                'imagen' => 'https://images.pexels.com/photos/1437267/pexels-photo-1437267.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Salmón a la plancha',
                'nombre' => 'Salmón a la plancha',
                'categoria' => 'Platos principales',
                'descripcion' => 'Filete de salmón a la plancha acompañado de vegetales frescos.',
                'precio' => 65.00,
                'imagen' => 'https://images.pexels.com/photos/262959/pexels-photo-262959.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Ensalada César',
                'nombre' => 'Ensalada de vegetales',
                'categoria' => 'Platos principales',
                'descripcion' => 'Ensalada fresca de vegetales y granos con aderezo ligero.',
                'precio' => 32.00,
                'imagen' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Sushi mixto',
                'nombre' => 'Sushi mixto',
                'categoria' => 'Platos principales',
                'descripcion' => 'Selección de sushi preparado con arroz, pescado y vegetales.',
                'precio' => 55.00,
                'imagen' => 'https://images.pexels.com/photos/2323398/pexels-photo-2323398.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Pollo teriyaki',
                'nombre' => 'Bife a la parrilla',
                'categoria' => 'Platos principales',
                'descripcion' => 'Bife a la parrilla acompañado de vegetales frescos.',
                'precio' => 48.00,
                'imagen' => 'https://images.pexels.com/photos/769289/pexels-photo-769289.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Lasaña boloñesa',
                'nombre' => 'Espagueti boloñesa',
                'categoria' => 'Platos principales',
                'descripcion' => 'Espagueti cubierto con salsa boloñesa y hierbas frescas.',
                'precio' => 45.00,
                'imagen' => 'https://images.pexels.com/photos/6287525/pexels-photo-6287525.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre' => 'Tacos de carne',
                'categoria' => 'Platos principales',
                'descripcion' => 'Tortillas rellenas de carne sazonada, vegetales frescos y salsa.',
                'precio' => 35.00,
                'imagen' => 'https://images.pexels.com/photos/4958792/pexels-photo-4958792.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre' => 'Burrito de carne',
                'categoria' => 'Platos principales',
                'descripcion' => 'Tortilla de trigo rellena de carne, vegetales y salsa.',
                'precio' => 40.00,
                'imagen' => 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre' => 'Ramen japonés',
                'categoria' => 'Platos principales',
                'descripcion' => 'Sopa japonesa con fideos, cerdo, huevo y cebollín.',
                'precio' => 48.00,
                'imagen' => 'https://images.pexels.com/photos/8472897/pexels-photo-8472897.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre' => 'Maki de vegetales',
                'categoria' => 'Entradas',
                'descripcion' => 'Rollos de arroz y alga nori rellenos de vegetales frescos.',
                'precio' => 38.00,
                'imagen' => 'https://images.pexels.com/photos/357756/pexels-photo-357756.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
            [
                'nombre_anterior' => 'Pastel de chocolate',
                'nombre' => 'Pastel de chocolate',
                'categoria' => 'Postres',
                'descripcion' => 'Bizcocho de chocolate con cobertura cremosa.',
                'precio' => 25.00,
                'imagen' => 'https://images.pexels.com/photos/291528/pexels-photo-291528.jpeg?auto=compress&cs=tinysrgb&w=800',
                'stock' => 20,
                'estado' => true,
            ],
        ];

        foreach ($platos as $plato) {
            $nombreAnterior = $plato['nombre_anterior'] ?? null;
            unset($plato['nombre_anterior']);

            $productoAnterior = $nombreAnterior
                ? Producto::where('nombre', $nombreAnterior)->first()
                : null;

            if ($productoAnterior) {
                $productoAnterior->update([
                    'nombre' => $plato['nombre'],
                    'categoria' => $plato['categoria'],
                    'descripcion' => $plato['descripcion'],
                    'imagen' => $plato['imagen'],
                ]);

                continue;
            }

            Producto::firstOrCreate(
                ['nombre' => $plato['nombre']],
                $plato
            );
        }
    }
}
