<?php

namespace App\Filament\Resources\IntegracionDatosProduccionResource\Pages;

use App\Filament\Resources\IntegracionDatosProduccionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntegracionDatosProduccion extends EditRecord
{
    protected static string $resource = IntegracionDatosProduccionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
