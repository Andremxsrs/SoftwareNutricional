<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionIngrediente extends Model
{
    use HasFactory;

    // Permitir asignación masiva para estos campos
    protected $fillable = ['nombre_ingrediente', 'calidad_nutricional', 'cantidad', 'formulacion_id'];

    // Relación inversa "uno a muchos" con FormulacionNutricional
    public function formulacion()
    {
        return $this->belongsTo(FormulacionNutricional::class, 'formulacion_id');
    }

}
