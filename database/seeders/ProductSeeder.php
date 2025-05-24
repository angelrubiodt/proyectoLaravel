<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Producto::create([
            'placa' => 'CFR475',
            'tipo_material' => 'Asfalto natural',
            'cantidad' => 13,
            'precio' => 585000
        ]);
    }
}
