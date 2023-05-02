<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;

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
            'telefono' => '652154785',
            'email_verified_at' => Carbon::now()
        ]);

        User::create([
            'name' => 'Pepe',
            'apellidos' => 'Pepe Pepe',
            'email' => 'pepe@pepe.com',
            'password' => bcrypt('12345678'),
            'rol' => 'cliente',
            'telefono' => '639854752',
            'email_verified_at' => Carbon::now()
        ]);

        User::create([
            'name' => 'Pepa',
            'apellidos' => 'Pepa Pepa',
            'email' => 'pepa@pepa.com',
            'password' => bcrypt('12345678'),
            'rol' => 'cliente',
            'telefono' => '636985214',
            'email_verified_at' => Carbon::now()
        ]);
    }
}
