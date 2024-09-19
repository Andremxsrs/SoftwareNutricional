<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegracionDatosProduccion extends Model
{
    use HasFactory;

    // Relación inversa "uno a muchos" con FormulacionNutricional
    public function formulacion()
    {
        return $this->belongsTo(FormulacionNutricional::class, 'formulacion_id');
    }
}
