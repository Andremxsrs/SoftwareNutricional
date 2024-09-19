<?php

namespace App\Filament\Resources\ReportesMonitoreoResource\Pages;

use App\Filament\Resources\ReportesMonitoreoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportesMonitoreos extends ListRecords
{
    protected static string $resource = ReportesMonitoreoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
