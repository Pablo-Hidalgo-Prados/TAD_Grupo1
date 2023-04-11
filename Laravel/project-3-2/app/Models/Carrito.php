<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    
    public function productos(){
        return $this->belongsToMany(Producto::class)->withPivot('cantidad');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
