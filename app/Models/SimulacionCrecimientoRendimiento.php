<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimulacionCrecimientoRendimiento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_simulacion','formulacion_id', 'crecimiento_predicho', 'rendimiento_predicho']; // Asegúrate de incluir todos los campos que deseas poder asignar masivamente

    // Relación inversa "uno a uno" con FormulacionNutricional
    public function formulacion()
    {
        return $this->belongsTo(FormulacionNutricional::class, 'formulacion_id');
    }

    // Relación "uno a muchos" con ReportesMonitoreo
    public function reportes()
    {
        return $this->hasMany(ReportesMonitoreo::class, 'simulacion_id');
    }
}

