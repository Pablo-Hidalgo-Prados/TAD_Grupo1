<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Descuento;

class DescuentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Descuento::create([
            'codigo' => '',
            'porcentaje' => '0'
        ]);

        Descuento::create([
            'codigo' => 'PRIMAVERA_2023',
            'porcentaje' => '15'
        ]);
    }
}
