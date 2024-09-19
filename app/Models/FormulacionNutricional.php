<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulacionNutricional extends Model
{
    use HasFactory;

    protected $table = 'formulacion_nutricional';
    protected $fillable = ['nombre', 'descripcion'];

    public function evaluacionesIngredientes()
    {
        return $this->hasMany(EvaluacionIngrediente::class, 'formulacion_id');
    }

    public function formulacion()
    {
        return $this->belongsTo(FormulacionNutricional::class, 'formulacion_id');
    }

    public function simulacionCrecimientoRendimiento()
    {
        return $this->hasOne(SimulacionCrecimientoRendimiento::class, 'formulacion_id');
    }

    public function controlesCalidad()
    {
        return $this->hasMany(ControlCalidadNutricional::class, 'formulacion_id');
    }

    public function optimizacionCostos()
    {
        return $this->hasOne(OptimizacionCostos::class, 'formulacion_id');
    }

    public function ingredientes()
    {
        return $this->belongsToMany(EvaluacionIngrediente::class, 'formulacion_ingredientes', 'formulacion_id', 'ingrediente_id')
                    ->withPivot('cantidad');
    }

    public function datosProduccion()
    {
        return $this->hasMany(IntegracionDatosProduccion::class, 'formulacion_id');
    }
}
