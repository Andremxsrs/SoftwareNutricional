<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlCalidadNutricional extends Model
{
    use HasFactory;

    protected $fillable = ['formulacion_id', 'resultado_control', 'cumple_estandares', 'observaciones'];

    // Relación inversa "uno a muchos" con FormulacionNutricional
    public function formulacion()
    {
        return $this->belongsTo(FormulacionNutricional::class, 'formulacion_id');
    }
}
