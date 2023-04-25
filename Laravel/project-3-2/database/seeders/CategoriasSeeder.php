<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'mochila',
            'descripcion' => 'mochilas de senderismo'
        ]);

        Categoria::create([
            'nombre' => 'ropa',
            'descripcion' => 'ropa de senderismo'
        ]);
    }
}
