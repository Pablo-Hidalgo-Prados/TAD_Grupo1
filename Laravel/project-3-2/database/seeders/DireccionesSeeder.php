<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DireccionEnvio;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $depends = [UsersSeeder::class];

    public function run()
    {
        DireccionEnvio::create([
            'calle' => 'Calle Infierno',
            'numero' => '20',
            'ciudad' => 'Sevilla',
            'codigo_postal' => '41011',
            'user_id' => '2'
        ]);

        DireccionEnvio::create([
            'calle' => 'Estacada del Pozo',
            'numero' => '20',
            'ciudad' => 'Tomares',
            'codigo_postal' => '41940',
            'user_id' => '2'
        ]);

        DireccionEnvio::create([
            'calle' => 'Calle Real',
            'numero' => '25',
            'planta' => '2',
            'puerta' => 'b',
            'ciudad' => 'Castilleja de la Cuesta',
            'codigo_postal' => '41950',
            'user_id' => '3'
        ]);
    }
}
