<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptimizacionCostos extends Model
{
    use SoftDeletes;

    // Atributos que pueden ser asignados en masa
    protected $fillable = ['formulacion_id', 'costo_total', 'sugerencias'];

    // Relación con la tabla `formulacion_nutricional`
    public function formulacion()
    {
        return $this->belongsTo(FormulacionNutricional::class, 'formulacion_id');
    }
}
