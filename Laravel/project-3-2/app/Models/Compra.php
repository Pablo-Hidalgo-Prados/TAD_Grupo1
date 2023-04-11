<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }

    public function descuento(){
        return $this->belongsTo(Descuento::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
