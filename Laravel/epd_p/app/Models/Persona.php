<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'edad'];

    public function trabajador()
    {
        return $this->hasOne(Trabajador::class);
    }
}
