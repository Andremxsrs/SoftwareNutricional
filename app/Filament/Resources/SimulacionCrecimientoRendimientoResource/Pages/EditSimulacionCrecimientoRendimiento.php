<?php

namespace App\Filament\Resources\SimulacionCrecimientoRendimientoResource\Pages;

use App\Filament\Resources\SimulacionCrecimientoRendimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSimulacionCrecimientoRendimiento extends EditRecord
{
    protected static string $resource = SimulacionCrecimientoRendimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
