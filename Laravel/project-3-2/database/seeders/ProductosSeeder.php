<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Mochila',
            'descripcion' => 'Mochila grande',
            'precio' => '20',
            'stock' => '10',
            'imagen' => 'images/Mochila_1682433461.jpg'
        ]);

        Producto::create([
            'nombre' => 'Bastones',
            'descripcion' => 'Bastones de trekking muy PROs',
            'precio' => '15',
            'stock' => '20',
            'imagen' => 'images/Bastones_1682433462.jpg'
        ]);
    }
}
