<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'nombre' => 'Excavadora Volqueta',
            'descripcion' => 'Excavadora volqueta de alta capacidad y rendimiento.',
            'precio' => 1500000,
            'stock' => 5,
            'imagen' => 'images/excavadoraVolqueta.png'
        ]);

        Product::create([
            'nombre' => 'Cargador Frontal',
            'descripcion' => 'Cargador frontal de alta potencia.',
            'precio' => 900000,
            'stock' => 3,
            'imagen' => 'images/cargadorFrontal.png'
        ]);

        Product::create([
            'nombre' => 'Retroexcavadora',
            'descripcion' => 'Retroexcavadora versátil para diversos trabajos.',
            'precio' => 1200000,
            'stock' => 4,
            'imagen' => 'images/retroexcavadora.png'
        ]);
    }
}
