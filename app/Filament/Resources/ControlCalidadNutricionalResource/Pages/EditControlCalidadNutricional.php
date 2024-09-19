<?php

namespace App\Filament\Resources\ControlCalidadNutricionalResource\Pages;

use App\Filament\Resources\ControlCalidadNutricionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditControlCalidadNutricional extends EditRecord
{
    protected static string $resource = ControlCalidadNutricionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
