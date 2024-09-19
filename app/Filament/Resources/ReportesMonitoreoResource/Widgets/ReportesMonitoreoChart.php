<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ReportesMonitoreoChart extends ApexChartWidget
{
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 350,
            ],
            'series' => [
                [
                    'name' => 'Crecimiento Predicho',
                    'data' => static::getCrecimientoPredicho(),
                ],
                [
                    'name' => 'Rendimiento Predicho',
                    'data' => static::getRendimientoPredicho(),
                ],
            ],
            'xaxis' => [
                'categories' => static::getCategories(),
            ],
        ];
    }

    protected static function getCategories(): array
    {
        return ['Dieta 1', 'Dieta 2', 'Dieta 3'];
    }

    protected static function getCrecimientoPredicho(): array
    {
        // Aquí deberías implementar la lógica para obtener los datos reales
        return [10, 15, 20]; // Ejemplo de datos
    }

    protected static function getRendimientoPredicho(): array
    {
        // Aquí deberías implementar la lógica para obtener los datos reales
        return [12, 18, 24]; // Ejemplo de datos
    }
}
