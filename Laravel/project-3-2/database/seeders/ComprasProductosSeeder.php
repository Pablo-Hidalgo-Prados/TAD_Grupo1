<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompraProducto;
use App\Models\Categoria;

class ComprasProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $depends = [Producto::class];
    
    public function run()
    {
        CompraProducto::create([
            'compra_id' => '1',
            'producto_id' => '1'
        ]);

        CompraProducto::create([
            'compra_id' => '2',
            'producto_id' => '3'
        ]);
    }
}
