<?php

namespace App\Filament\Resources\EvaluacionIngredienteResource\Pages;

use App\Filament\Resources\EvaluacionIngredienteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvaluacionIngrediente extends EditRecord
{
    protected static string $resource = EvaluacionIngredienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
