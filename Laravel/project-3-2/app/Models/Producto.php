<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function carritos(){
        return $this->belongsToMany(Carrito::class)->withPivot('cantidad');
    }

    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }

    public function compras(){
        return $this->belongsToMany(Compras::class);
    }
}
