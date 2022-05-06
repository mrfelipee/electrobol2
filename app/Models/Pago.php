<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    public function reparacion()
    {
        return $this->belongsTo(Reparacion::class);
    }
    
}
