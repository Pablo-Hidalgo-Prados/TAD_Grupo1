<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $fillable = ['telefonos', 'persona_id', 'precioPorHora', 'horasTrabajadas'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function gerente()
    {
        return $this->hasOne(Gerente::class);
    }

    public function calcularSueldo()
    {
        $precioPorHora = $this->precioPorHora ?? 0;
        $horasTrabajadas = $this->horasTrabajadas ?? 0;

        return $precioPorHora * $horasTrabajadas;
    }
}
