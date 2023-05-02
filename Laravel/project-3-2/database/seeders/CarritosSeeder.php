<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carrito;

class CarritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $depends = [UsersSeeder::class];

    public function run()
    {
        Carrito::create([
            'user_id' => '2',
            'total' => '0'
        ]);

        Carrito::create([
            'user_id' => '3',
            'total' => '0'
        ]);
    }
}
