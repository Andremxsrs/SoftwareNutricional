<?php

namespace App\Filament\Resources\FormulacionNutricionalResource\Pages;

use App\Filament\Resources\FormulacionNutricionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormulacionNutricional extends EditRecord
{
    protected static string $resource = FormulacionNutricionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
