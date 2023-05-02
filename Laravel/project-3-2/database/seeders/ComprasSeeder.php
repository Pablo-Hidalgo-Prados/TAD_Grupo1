<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compra;
use Illuminate\Support\Carbon;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $depends = [UsersSeeder::class];

    public function run()
    {
        Compra::create([
            'fecha' => Carbon::now(),
            'subtotal' => '20',
            'direccion' => 'Ciudad: Castilleja de la Cuesta, Código postal: 41950, Calle: 25, Número: 25, Planta: 2, Puerta: b',
            'Estado' => 'En preparación',
            'user_id' => '3',
            'direccion_id' => '3'
        ]);

        Compra::create([
            'fecha' => Carbon::now(),
            'subtotal' => '15',
            'direccion' => 'Ciudad: Sevilla, Código postal: 41011, Calle: 20, Número: 20',
            'Estado' => 'En preparación',
            'user_id' => '2',
            'direccion_id' => '1'
        ]);
    }
}
