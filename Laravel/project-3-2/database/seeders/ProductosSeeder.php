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
            'nombre' => 'Mochila adidas',
            'descripcion' => 'Mochila pequeña',
            'precio' => '10',
            'stock' => '10',
            'imagen' => 'images/Mochila_1682433462.jpg'
        ]);

        Producto::create([
            'nombre' => 'Bastones',
            'descripcion' => 'Bastones de trekking muy PROs',
            'precio' => '15',
            'stock' => '20',
            'imagen' => 'images/Bastones_1682433462.jpg'
        ]);

        Producto::create([
            'nombre' => 'Cuerda',
            'descripcion' => 'Cuerda 20m',
            'precio' => '30',
            'stock' => '15',
            'imagen' => 'images/Cuerda_1682433463.jpg'
        ]);

        Producto::create([
            'nombre' => 'Camiseta trekking',
            'descripcion' => 'Camiseta para senderismo',
            'precio' => '15',
            'stock' => '10',
            'imagen' => 'images/Camiseta_1682433464.jpg'
        ]);

        Producto::create([
            'nombre' => 'Cantimplora',
            'descripcion' => 'Cantimplora para senderismo',
            'precio' => '20',
            'stock' => '10',
            'imagen' => 'images/Cantimplora_1682433465.jpg'
        ]);

        Producto::create([
            'nombre' => 'Pedernal',
            'descripcion' => 'Pedernal supervivencia',
            'precio' => '20',
            'stock' => '10',
            'imagen' => 'images/Pedernal_1682433466.jpg'
        ]);

        Producto::create([
            'nombre' => 'Botiquín',
            'descripcion' => 'Botiquín emergencia',
            'precio' => '50',
            'stock' => '10',
            'imagen' => 'images/Botiquín_1682433467.jpg'
        ]);

        Producto::create([
            'nombre' => 'Botas',
            'descripcion' => 'Botas senderismo nieve',
            'precio' => '100',
            'stock' => '10',
            'imagen' => 'images/Botas_1682433468.jpg'
        ]);

        Producto::create([
            'nombre' => 'Guantes',
            'descripcion' => 'Guantes nieve',
            'precio' => '40',
            'stock' => '5',
            'imagen' => 'images/Guantes_1682433469.jpg'
        ]);
    }
}