<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $depends = [Producto::class];
    
    public function run()
    {
        Categoria::create([
            'nombre' => 'Mochila',
            'descripcion' => 'mochilas de senderismo'
        ]);

        Categoria::create([
            'nombre' => 'Herramientas',
            'descripcion' => 'herramientas de senderismo'
        ]);
    }
}
