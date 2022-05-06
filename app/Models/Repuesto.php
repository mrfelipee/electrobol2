<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
    public function reparaciones() {
        return $this->belongsToMany(Reparacion::class);
    }
}
