<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportesMonitoreo extends Model
{
    use HasFactory;

    protected $table = 'reportes_monitoreos'; // Asegúrate de que el nombre de la tabla esté correcto

    // Agregar todos los campos relevantes a la propiedad fillable
    protected $fillable = [
        'nombre_reporte',
        'simulacion_id',
        'crecimiento_predicho',
        'rendimiento_predicho',
        'formulacion_nombre',
        'formulacion_descripcion',
        'ingredientes_evaluados', // Asegúrate de que coincida con la migración y tus necesidades
        'costo_total',
        'sugerencias_optimizacion',
        'cumple_estandares',      // Asegúrate de que se guarde correctamente como boolean
        'resultado_control',
        'observaciones'
    ];

    // Convertir automáticamente ciertos campos a tipos de datos específicos
    protected $casts = [
        'ingredientes_evaluados' => 'array', // Esto convierte ingredientes_evaluados a y desde JSON
        'cumple_estandares' => 'boolean',    // Asegura que se maneje como booleano
        'crecimiento_predicho' => 'decimal:2',
        'rendimiento_predicho' => 'decimal:2',
        'costo_total' => 'decimal:2'
    ];

    // Relación inversa "uno a muchos" con SimulacionCrecimientoRendimiento
    public function simulacion()
    {
        return $this->belongsTo(SimulacionCrecimientoRendimiento::class, 'simulacion_id');
    }
}
