<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pablo',
            'apellidos' => 'Pablo Pablo',
            'email' => 'pablo@pablo.com',
            'password' => bcrypt('12345678'),
            'rol' => 'admin',
            'telefono' => '652154785'
        ]);
    }
}
