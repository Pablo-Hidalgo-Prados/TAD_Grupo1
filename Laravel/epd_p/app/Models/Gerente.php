<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerente extends Model
{
    protected $fillable = ['salario', 'trabajador_id'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }

    public function calcularSueldo()
    {
        return $this->salario;
    }

    public function debePagarImpuestos()
    {
        return $this->calcularSueldo() > 1000;
    }
}
