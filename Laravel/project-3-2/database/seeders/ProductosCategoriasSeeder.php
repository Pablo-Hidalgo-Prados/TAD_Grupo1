<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductoCategoria;
use App\Models\Categoria;

class ProductosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $depends = [Categoria::class];
    
    public function run()
    {
        ProductoCategoria::create([
            'producto_id' => '1',
            'categoria_id' => '1'
        ]);

        ProductoCategoria::create([
            'producto_id' => '2',
            'categoria_id' => '1'
        ]);

        ProductoCategoria::create([
            'producto_id' => '3',
            'categoria_id' => '2'
        ]);

        ProductoCategoria::create([
            'producto_id' => '4',
            'categoria_id' => '2'
        ]);

        ProductoCategoria::create([
            'producto_id' => '5',
            'categoria_id' => '4'
        ]);

        ProductoCategoria::create([
            'producto_id' => '5',
            'categoria_id' => '2'
        ]);

        ProductoCategoria::create([
            'producto_id' => '6',
            'categoria_id' => '2'
        ]);

        ProductoCategoria::create([
            'producto_id' => '6',
            'categoria_id' => '3'
        ]);

        ProductoCategoria::create([
            'producto_id' => '7',
            'categoria_id' => '3'
        ]);

        ProductoCategoria::create([
            'producto_id' => '8',
            'categoria_id' => '3'
        ]);

        ProductoCategoria::create([
            'producto_id' => '9',
            'categoria_id' => '3'
        ]);

        ProductoCategoria::create([
            'producto_id' => '10',
            'categoria_id' => '3'
        ]);
    }
}
