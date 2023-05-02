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
            'codigo' => 'PRIMAVERA_2023',
            'porcentaje' => '15'
        ]);

        Descuento::create([
            'codigo' => 'AHORRA_MAS',
            'porcentaje' => '10'
        ]);

        Descuento::create([
            'codigo' => 'EL_DESCUENTAZO',
            'porcentaje' => '20'
        ]);
    }
}
