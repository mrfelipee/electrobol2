<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }
    public function repuestos() {
        return $this->belongsToMany(Repuesto::class);
    }
}
