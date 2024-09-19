<?php

namespace App\Filament\Resources\IntegracionDatosProduccionResource\Pages;

use App\Filament\Resources\IntegracionDatosProduccionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIntegracionDatosProduccions extends ListRecords
{
    protected static string $resource = IntegracionDatosProduccionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
