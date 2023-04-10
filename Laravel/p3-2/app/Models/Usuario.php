<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function carrito(){
        return $this->hasOne(Carrito::class);
    }

    public function direcciones(){
        return $this->hasMany(Direccion::class);
    }

    public function compras(){
        return $this->hasMany(Compras::class);
    }

    public function listaCompra()
    {
        return $this->hasOne(Listacompra::class);
    }
}
