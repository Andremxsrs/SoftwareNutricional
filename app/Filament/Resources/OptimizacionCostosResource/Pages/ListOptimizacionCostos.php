<?php

namespace App\Filament\Resources\OptimizacionCostosResource\Pages;

use App\Filament\Resources\OptimizacionCostosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOptimizacionCostos extends ListRecords
{
    protected static string $resource = OptimizacionCostosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
