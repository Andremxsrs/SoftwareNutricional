<?php

namespace App\Filament\Resources\SimulacionCrecimientoRendimientoResource\Pages;

use App\Filament\Resources\SimulacionCrecimientoRendimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSimulacionCrecimientoRendimientos extends ListRecords
{
    protected static string $resource = SimulacionCrecimientoRendimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
