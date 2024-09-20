<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\FormulacionNutricional;
use App\Models\OptimizacionCostos;
use App\Models\EvaluacionIngrediente;
use Carbon\Carbon;

class PerformanceMetricsWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $activeFormulationsCount = FormulacionNutricional::where('created_at', '>=', Carbon::now()->subYear())->count();
        $totalCost = OptimizacionCostos::sum('costo_total'); // Suma todos los costos totales
        $evaluatedIngredientsCount = EvaluacionIngrediente::count(); // Cuenta todos los ingredientes evaluados

        return [
            Card::make('Formulaciones Activas', number_format($activeFormulationsCount))
                ->description('Número total de formulaciones activas en el último año.')
                ->color('success'),
            Card::make('Costo Total de Formulaciones', number_format($totalCost, 2))
                ->description('Suma total de los costos de todas las formulaciones.')
                ->color('primary'),
            Card::make('Ingredientes Evaluados', $evaluatedIngredientsCount)
                ->description('Total de ingredientes evaluados en todas las formulaciones.')
                ->color('info')
        ];
    }
}
