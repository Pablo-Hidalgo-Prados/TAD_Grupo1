<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Trabajador
{
    // Los campos adicionales de la tabla "Empleado"
    protected $fillable = ['telefonos', 'persona_id', 'precioPorHora', 'horasTrabajadas'];

    public function calcularSueldo()
    {
        $sueldo = $this->precioPorHora*$this->horasTrabajadas;

        return $sueldo;
    }

    public function debePagarImpuestos()
    {
        return $this->calcularSueldo() > 1000;
    }
}
